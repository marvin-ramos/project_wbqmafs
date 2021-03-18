<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\View;

use App\Log;
use App\Employee;
use App\Gender;
use App\Status;
use App\User;
use App\Role;
use App\Temperature;
use App\Turbidity;
use App\Water;
use App\PhLevel;
use App\Chart;

use File;
use Hash;
use Session;
use DB;
use Auth;
use Validator;
use Carbon\Carbon;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');   
  }

  public function dashboard() {
  	$count = Log::count(); 
  	$user = auth()->user();
    $user->employee;

    $recentActivities = Log::join('users', 'users.id', '=', 'logs.user_id')
                   ->join('employees', 'employees.id', '=', 'users.employee_id')
                   ->join('roles', 'roles.id', '=', 'users.role_id')
                   ->select('logs.id','employees.firstname','employees.middlename','employees.lastname','employees.profile','roles.role_name','logs.remarks','logs.created_at')
                   ->orderBy('created_at', 'desc')
                   ->simplePaginate(4); 

  	return view('admin.dashboard', compact('recentActivities','user'))
  	     ->with('history', $count);
  }

  //for Employee
  public function employeeTable() {
  	$count = Log::count(); 
  	$user = auth()->user();
      $user->employee;
  	$employeeTable = Employee::get();

  	return view('employee.table', compact('employeeTable','user'))
  	     ->with('history', $count);;
  }
  public function employeeAdd() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;
    $genderData = Gender::select('id','gender')->get();
    $statusData = Status::select('id','status')->get();
    return view('employee.add', compact('user','genderData','statusData'))
         ->with('history', $count);
  }
  public function employeeStore(Request $request) {

    $request->validate([
        'firstname'         => 'required|min:3|max:20|alpha',
        'middlename'        => 'required|alpha',
        'lastname'          => 'required|min:3|max:20|alpha',
        'gender_id'         => 'required',
        'age'               => 'required|numeric',
        'birthday'          => 'required',
        'contact_number'    => 'required|numeric', 
        'status_id'         => 'required',
        'address'           => 'required|alpha_dash',
        'profile'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $employee = Employee::where([
            ['firstname', '=', $request->get('firstname')],
            ['middlename', '=', $request->get('middlename')],
            ['lastname', '=', $request->get('lastname')],
            ])->first();

    if ($employee == null) {

      $data = array();
      $data['firstname']      = $request->firstname;
      $data['middlename']     = $request->middlename;
      $data['lastname']       = $request->lastname;
      $data['gender_id']      = $request->gender_id;
      $data['age']            = $request->age;
      $data['birthday']       = $request->birthday;
      $data['contact_number'] = $request->contact_number;
      $data['status_id']      = $request->status_id;
      $data['address']        = $request->address;

      $image = $request->file('profile');
      if($image) {
          $image_name = date('dmy_H_s_i');
          $text = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name. '.' .$text;
          $upload_path = 'images/employee/';
          $image_url = $upload_path.$image_full_name;
          $success = $image->move($upload_path,$image_full_name);
          $data['profile'] = $image_url;
      }
      
      $employeeRecords = Employee::insert($data);

      Session::flash('alertTitle', 'Success');
      Session::flash('alertIcon', 'success');

      return Redirect()
             ->route('table.employee')
             ->with('success','Greate! Employee created successfully.');
    } else {

      Session::flash('alertTitle', 'Alert');
      Session::flash('alertIcon', 'error');

      return Redirect()
             ->route('employee.add')
             ->with('success', 'Opps Employee Already Exist');
    }
  }
  public function employeeEdit($id) {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;
    $genderData = Gender::select('id','gender')->get();
    $statusData = Status::select('id','status')->get();
    $employeeData = Employee::find($id)
               ->join('genders', 'genders.id', '=', 'employees.gender_id')
               ->join('statuses', 'statuses.id', '=', 'employees.status_id')
               ->select('employees.id','employees.firstname','employees.middlename','employees.lastname','genders.gender','employees.gender_id','employees.age','employees.birthday','employees.contact_number','statuses.status','employees.status_id','employees.address','employees.profile')
               ->where('employees.id', '=', $id)
               ->first();
    return view('employee/edit', compact('user','genderData','statusData','employeeData'))
         ->with('history', $count);
  }
  public function employeeUpdate(Request $request, $id) {
    $data = array();
    $data['firstname']      = $request->firstname;
    $data['middlename']     = $request->middlename;
    $data['lastname']       = $request->lastname;
    $data['gender_id']      = $request->gender_id;
    $data['age']            = $request->age;
    $data['birthday']       = $request->birthday;
    $data['contact_number'] = $request->contact_number;
    $data['status_id']      = $request->status_id;
    $data['address']        = $request->address;

    $old_picture = $request->old_profile;

    if($request->hasFile('profile')) {
        $destinationpath = 'images/employee/';
        $image = $request->file('profile');
        $image_name = date('dmy_H_s_i');
        $text = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name. '.' .$text;
        $upload_path = 'images/employee/';
        $image_url = $upload_path.$image_full_name;
        $success = $image->move($upload_path,$image_full_name);
        $data['profile'] = $image_url;
    }

    $employeeRecords = Employee::where('id', $id)
                      ->update($data);

    Session::flash('alertTitle', 'Success');
    Session::flash('alertIcon', 'success');

    return Redirect()
           ->route('table.employee')
           ->with('success','Greate! Employee updated successfully.');
  }
  public function employeeView($id) {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;
    $genderData = Gender::select('id','gender')->get();
    $statusData = Status::select('id','status')->get();
    $employeeData = Employee::find($id)
               ->join('genders', 'genders.id', '=', 'employees.gender_id')
               ->join('statuses', 'statuses.id', '=', 'employees.status_id')
               ->select('employees.id','employees.firstname','employees.middlename','employees.lastname','genders.gender','employees.gender_id','employees.age','employees.birthday','employees.contact_number','statuses.status','employees.status_id','employees.address','employees.profile')
               ->where('employees.id', '=', $id)
               ->first();

    return view('employee/view', compact('user','genderData','statusData','employeeData'))
         ->with('history', $count);
  }
  public function employeeDelete($id) {
    $data = Employee::find($id)
            ->where('id', $id)
            ->firstorfail();
    
    $image = $data->profile;
    
    File::delete($image);

    $deleteRecords = Employee::where('id', $id)->delete();

    Session::flash('alertTitle', 'Success');
    Session::flash('alertIcon', 'success');

    return Redirect()
        ->route('table.employee')
        ->with('success','Greate! Employee deleted successfully.');
  }

  //for account 
  public function accountTable() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;
    $employeeTable = Employee::get();

    return view('account.table', compact('employeeTable','user'))
         ->with('history', $count); 
  }
  public function accountAdd(Request $request, $id) {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;
    $roleData = Role::select('id','role_name')->get();
    $employeeData = Employee::find($id)
                  ->join('genders', 'genders.id', '=', 'employees.gender_id')
                  ->join('statuses', 'statuses.id', '=', 'employees.status_id')
                  ->select('employees.id','employees.firstname','employees.middlename','employees.lastname','genders.gender','employees.gender_id','employees.age','employees.birthday','employees.contact_number','statuses.status','employees.status_id','employees.address','employees.profile')
                  ->where('employees.id', '=', $id)
                  ->first();
    return view('account.add', compact('user','employeeData', 'roleData'))
         ->with('history', $count);
  }
  public function accountStore(Request $request) {
    $request->validate([
        'email'                 => 'required|string|email|max:255|unique:users',
        'password'              => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required',
    ]);

    User::create([
        'employee_id'  => $request->employee_id,
        'email'        => $request->email,
        'password'     => Hash::make($request->password),
        'role_id'      => $request->role_id,
    ]);

    Session::flash('alertTitle', 'Success');
    Session::flash('alertIcon', 'success');

    return redirect()
           ->route('table.account')
           ->with('success', 'Account has created Successfully');
  }
  public function accountRecord() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;
    $accountData = User::join('employees', 'employees.id', '=', 'users.employee_id')
                  ->join('roles', 'roles.id', '=', 'users.role_id')
                  ->join('genders', 'genders.id', '=', 'employees.gender_id')
                  ->join('statuses', 'statuses.id', '=', 'employees.status_id')
                  ->select('users.id','employees.firstname','employees.middlename','employees.lastname','genders.gender','employees.age','employees.birthday','employees.contact_number','statuses.status','employees.address','employees.profile', 'users.email', 'users.password','roles.role_name')
                  ->get();
    return view('account.account_records', compact('accountData','user' ))
         ->with('history', $count);
  }
  public function accountRecordEdit($id) {
      $count = Log::count(); 
      $user = auth()->user();
      $user->employee;
      $roleData = Role::select('id','role_name')->get();
      $accountData = User::join('employees', 'employees.id', '=', 'users.employee_id')
                    ->join('roles', 'roles.id', '=', 'users.role_id')
                    ->join('genders', 'genders.id', '=', 'employees.gender_id')
                    ->join('statuses', 'statuses.id', '=', 'employees.status_id')
                    ->select('employees.id','employees.firstname','employees.middlename','employees.lastname','genders.gender','employees.age','employees.birthday','employees.contact_number','statuses.status','employees.address','employees.profile', 'users.email', 'users.password','users.role_id','roles.role_name')
                    ->where('users.id', '=', $id)
                    ->first();
      return view('account.account_record_edit', compact('accountData','user', 'roleData'))
           ->with('history', $count);
  }
  public function accountRecordUpdate(Request $request, $id) {

    if(Auth::Check())
    {
        $requestData = $request->all();

        $validator = $this->validatePasswords($requestData);
        if($validator->fails())
        {
          echo 'error';
          return back()
          ->withErrors($validator->getMessageBag());
        }
        else
        {
          $currentPassword = Auth::User()->password;

          if(Hash::check($requestData['password'], $currentPassword))
          {
            $user = User::find($id);
            $user->password = Hash::make($requestData['new-password']);
            dd($user);
            
            $user->save();
            return back()
                 ->with('message', 'Your password has been updated successfully.');
          }
          else
          {
            return back()
                 ->withErrors(['Sorry, your current password was not recognised. Please try again.']);
          }
        }
    }
    else
    {
        // Auth check failed - redirect to domain root
        return redirect()->to('/');
    }
  }
  public function validatePasswords(array $data)
  {
    $messages = [
      'password.required'                => 'Please enter your current password',
      'new-password.required'            => 'Please enter a new password',
      'new-password-confirmation.not_in' => 'Sorry, common passwords are not allowed. Please try a different new password.'
    ];

    $validator = Validator::make($data, [
      'password'                  => 'required',
      'new-password'              => 'required', 'same:new-password', 'min:8',
      'new-password-confirmation' => 'required|same:new-password',
    ], $messages);

    return $validator;
  }
  public function bannedPasswords() {
    return [
      'password', 
      '12345678', 
      '123456789', 
      'baseball', 
      'football', 
      'jennifer', 
      'iloveyou', 
      '11111111', 
      '222222222', 
      '33333333', 
      'qwerty123'
    ];
  } 
  public function accountRecordView($id) {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;
    $roleData = Role::select('id','role_name')->get();
    $accountData = User::join('employees', 'employees.id', '=', 'users.employee_id')
                  ->join('roles', 'roles.id', '=', 'users.role_id')
                  ->join('genders', 'genders.id', '=', 'employees.gender_id')
                  ->join('statuses', 'statuses.id', '=', 'employees.status_id')
                  ->select('users.id','employees.firstname','employees.middlename','employees.lastname','genders.gender','employees.age','employees.birthday','employees.contact_number','statuses.status','employees.address','employees.profile', 'users.email', 'users.password','roles.role_name')
                  ->where('users.id', '=', $id)
                  ->first();
    return view('account.account_record_view', compact('accountData','user', 'roleData'))
         ->with('history', $count);
  }

  //for system history
  public function history() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;
    $activityData = Log::join('users', 'users.id', '=', 'logs.user_id')
                  ->join('roles', 'roles.id', '=', 'users.role_id')
                  ->join('employees', 'employees.id', '=', 'users.employee_id')
                  ->select('logs.id','employees.firstname','employees.middlename','employees.lastname','roles.role_name', 'logs.remarks', 'logs.created_at')
                  ->get();
    return view('history.history', compact('activityData','user'))
         ->with('history', $count);
  }

  //for parameters
  public function parameterWater() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;

    $waterData = DB::table('waters')
            ->select('water_level')
            ->groupBy('water_level')
            ->pluck('water_level')
            ->all();

    for ($i=0; $i<=count($waterData); $i++) {
      $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
    }

    $chart = new Chart;
    $chart->labels = (array_keys($waterData));
    $chart->dataset = (array_values($waterData));
    $chart->colours = $colours;

    return view('parameters.water', compact('chart','user'))
         ->with('history', $count);
  }
  public function parameterTemperature() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;

    $temperatureData = DB::table('temperatures')
            ->select('temperature_level')
            ->groupBy('temperature_level')
            ->pluck('temperature_level')
            ->all();

    for ($i=0; $i<=count($temperatureData); $i++) {
      $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
    }

    $chart = new Chart;
    $chart->labels = (array_keys($temperatureData));
    $chart->dataset = (array_values($temperatureData));
    $chart->colours = $colours;

    return view('parameters.temperature', compact('chart','user'))
         ->with('history', $count);
  }
  public function parameterPh() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;

    $phData = DB::table('ph_levels')
            ->select('ph_level')
            ->groupBy('ph_level')
            ->pluck('ph_level')
            ->all();

    for ($i=0; $i<=count($phData); $i++) {
      $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
    }

    $chart = new Chart;
    $chart->labels = (array_keys($phData));
    $chart->dataset = (array_values($phData));
    $chart->colours = $colours;

    return view('parameters.ph', compact('chart','user'))
         ->with('history', $count);
  }
  public function parameterTurbidity() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;

    $turbidityData = DB::table('turbidities')
            ->select('turbidity_level')
            ->groupBy('turbidity_level')
            ->pluck('turbidity_level')
            ->all();

    for ($i=0; $i<=count($turbidityData); $i++) {
      $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
    }

    $chart = new Chart;
    $chart->labels = (array_keys($turbidityData));
    $chart->dataset = (array_values($turbidityData));
    $chart->colours = $colours;

    return view('parameters.turbidity', compact('chart','user'))
         ->with('history', $count);
  }

  //admin profile
  public function profile() {
    $count = Log::count(); 
    $user = auth()->user();
      $user->employee;
    return view('admin.profile', compact('user'))
         ->with('history', $count);
  }

  public function logout (Request $request) {
    Auth::logout();
    return redirect()
         ->route('view.login');
  }
}
