<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Collection;

use App\Log;
use App\Employee;
use App\Gender;
use App\Status;
use App\User;
use App\Role;
use App\Data;
use App\Chart;
use App\Ponds;

use App\Rules\MatchOldPassword;

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
                   ->orderBy('id', 'asc')
                   ->simplePaginate(4); 

    $paramlabels = DB::table('data')
            ->select('created_at')
            ->orderBy('id', 'asc')
            ->pluck('created_at')
            ->all();

    //for water data here
    $waterData = DB::table('data')
            ->select('waterlevel')
            ->orderBy('id', 'asc')
            ->pluck('waterlevel')
            ->all();

    $chart1 = new Chart;
    $chart1->dataset = (array_values($waterData));

    //for temperature data
    $temperatureData = DB::table('data')
            ->select('templevel')
            ->orderBy('id', 'asc')
            ->pluck('templevel')
            ->all();

    $chart2 = new Chart;
    $chart2->dataset = (array_values($temperatureData));

    //for turbidity data
    $turbidityData = DB::table('data')
            ->select('blevel')
            ->orderBy('id', 'asc')
            ->pluck('blevel')
            ->all();

    $chart3 = new Chart;
    $chart3->dataset = (array_values($turbidityData));

    //for PH data
    $phData = DB::table('data')
            ->select('phlevel')
            ->orderBy('id', 'asc')
            ->pluck('phlevel')
            ->all();

    $chart4 = new Chart;
    $chart4->dataset = (array_values($phData));

    $water_value = Data::all();
    $water_avg = $water_value->avg('waterlevel');

    //for jumbo water chart
    $ph_value = Data::all();
    $ph_avg = $ph_value->avg('phlevel');

    //for jumbo temperature chart
    $temp_value = Data::all();
    $temp_avg = $temp_value->avg('templevel');

    //for jumbo turbidity chart
    $turbidity_value = Data::all();
    $turbidity_avg = $turbidity_value->avg('blevel');
   
  	return view('admin.dashboard', compact('chart1','chart2','chart3','chart4','recentActivities','user','paramlabels'))
         ->with('turbidity_avg', $turbidity_avg)
         ->with('water_avg', $water_avg)
         ->with('temp_avg', $temp_avg)
         ->with('ph_avg', $ph_avg);
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

      $firstname = $request->firstname; 
      $middlename = $request->middlename; 
      $lastname = $request->lastname;
      
      $id = auth()->user()->id;
      $remark = 'has added '. $firstname .' '. $middlename .' '. $lastname.' to the system';

      $records = Log::create([
          'user_id' => $id,
          'remarks' => $remark,
          'created_at' => Carbon::now()
      ]);

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

    $firstname = $request->firstname; 
    $middlename = $request->middlename; 
    $lastname = $request->lastname;
    
    $id = auth()->user()->id;
    $remark = 'has updated '. $firstname .' '. $middlename .' '. $lastname.' to the system';

    $records = Log::create([
        'user_id' => $id,
        'remarks' => $remark,
        'created_at' => Carbon::now()
    ]);

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
    $remark = 'has deleted an account in the system at';
    $user_id = auth()->user()->id;

    $records = Log::create([
        'user_id' => $user_id,
        'remarks' => $remark,
        'created_at' => Carbon::now()
    ]);

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
        'employee_id'           => 'required',
        'email'                 => 'required|string|email|max:255|unique:users',
        'password'              => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required',
    ]);

    $employee_account = User::where([
            ['employee_id', '=', $request->get('employee_id')], 
            ])->first();

    if ($employee_account == null ) 
    {
      
      User::create([
        'employee_id'  => $request->employee_id,
        'email'        => $request->email,
        'password'     => Hash::make($request->password),
        'role_id'      => $request->role_id,
      ]);

      $email = $request->email; 
      
      $id = auth()->user()->id;
      $remark = 'has created '. $email .' account to the system';

      $records = Log::create([
          'user_id' => $id,
          'remarks' => $remark,
          'created_at' => Carbon::now()
      ]);

      Session::flash('alertTitle', 'Success');
      Session::flash('alertIcon', 'success');

      return redirect()
             ->route('table.account')
             ->with('success', 'Account has created Successfully');

    } else {
      Session::flash('alertTitle', 'Opps');
      Session::flash('alertIcon', 'warning');

      return back()
             ->with('success', 'Employee has Already have an account');
    }
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
  public function accountRecordUpdate(Request $request) {
    $request->validate([
      'email'                     => 'required',
      'current_password'          => 'required|min:5|max:8',
      'new_password'              => 'required|min:5|max:8',
      'new-password-confirmation' => 'required|min:5|same:new_password',
    ]);

    $data = array();
    $data['id']   = $request->user_id;
    $data['role_id']   = $request->role_id;
    $data['email']     = $request->email;
    $data['password']  = Hash::make($request->new_password);

    $user = auth()->user()->password;
    $user_old = $request->input('old_password');
    $user_id = $request->input('user_id');

    if($user == $user_old) {
      $current_user = User::where('id', $user_id)
                    ->save([$data]);

      return redirect()
      ->back()
      ->with('success', 'Password Success Updated');

    } else {
      
      return redirect()
      ->back()
      ->with('success', 'Old Password Does Not Match.');
    }
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
  public function accountRecordDelete($id) {
    $remark = 'has deleted an account in the system at';
    $user_id = auth()->user()->id;

    $records = Log::create([
        'user_id' => $user_id,
        'remarks' => $remark,
        'created_at' => Carbon::now()
    ]);

    $data = User::find($id)
            ->where('id', $id)
            ->delete();

    Session::flash('alertTitle', 'Success');
    Session::flash('alertIcon', 'success');

    return Redirect()
        ->route('table.employee')
        ->with('success','Greate! Employee deleted successfully.');
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
                  ->orderBy('id', 'asc')
                  ->simplePaginate(15);
    return view('history.history', compact('activityData','user'))
         ->with('history', $count);
  }

  //for parameters
  public function parameterWater() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;

    $paramlabels = DB::table('data')
            ->select('created_at')
            ->orderBy('id', 'desc')
            ->pluck('created_at')
            ->all();

    $waterData = DB::table('data')
            ->select('waterlevel')
            ->orderBy('id', 'desc')
            ->pluck('waterlevel')
            ->all();

    return view('parameters.water', compact('user', 'paramlabels','waterData'))
         ->with('history', $count);
  }
  public function parameterTemperature() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;

    $paramlabels = DB::table('data')
            ->select('created_at')
            ->orderBy('id', 'desc')
            ->pluck('created_at')
            ->all();

    $temperatureData = DB::table('data')
            ->select('templevel')
            ->orderBy('id', 'desc')
            ->pluck('templevel')
            ->all();

    return view('parameters.temperature', compact('user', 'paramlabels', 'temperatureData'))
         ->with('history', $count);
  }
  public function parameterPh() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;

    $paramlabels = DB::table('data')
            ->select('created_at')
            ->orderBy('id', 'desc')
            ->pluck('created_at')
            ->all();

    $phData = DB::table('data')
            ->select('phlevel')
            ->orderBy('id', 'desc')
            ->pluck('phlevel')
            ->all();

    return view('parameters.ph', compact('paramlabels','user','phData'))
         ->with('history', $count);
  }
  public function parameterTurbidity() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;

    $paramlabels = DB::table('data')
            ->select('created_at')
            ->orderBy('id', 'desc')
            ->pluck('created_at')
            ->all();

    $turbidityData = DB::table('data')
            ->select('blevel')
            ->orderBy('id', 'desc')
            ->pluck('blevel')
            ->all();

    return view('parameters.turbidity', compact('paramlabels','user', 'turbidityData'))
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

  //admin logout
  public function logout (Request $request) {
    $remark = 'has Logged out to the system at';
    $id = auth()->user()->id;

    $records = Log::create([
        'user_id' => $id,
        'remarks' => $remark,
        'created_at' => Carbon::now()
    ]);
    Auth::logout();
    return redirect()
         ->route('view.login');
  }

  //admin activities
  public function userActivities() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;

    $user_id = auth()->user()->id;
    $userActivities = Log::join('users', 'users.id', '=', 'logs.user_id')
                    ->join('employees', 'employees.id', '=', 'users.employee_id')
                    ->join('roles', 'roles.id', '=', 'users.role_id')
                    ->select('logs.id','logs.user_id','employees.firstname','employees.middlename','employees.lastname','employees.profile','roles.role_name','logs.remarks','logs.created_at')
                    ->where('user_id', '=', $user_id)
                    ->orderBy('id', 'asc')
                   ->simplePaginate(15); 

    return view('activities.admin-activities', compact('userActivities','user'))
         ->with('history', $count);
  }

  //for change user password
  public function changePassword() {
    $count = Log::count(); 
    $user = auth()->user();
    $user->employee;
    
    return view('change_password.admin-change_password', compact('user'))
         ->with('history', $count);
  }

  public function EditPassword(Request $request) { 

    $request->validate([
      'current_password' => 'required|min:5|max:20',
      'new_password' => 'required|min:5|max:20|alpha_dash',
      'new_confirm_password' => 'same:new_password',
    ]);

    $current_user = auth()->user();

    if(Hash::check($request->current_password, $current_user->password)) {

      $current_user->update([
        'password' => Hash::make($request->new_password)
      ]);

      $remark = 'has updated its password in the system at';
      $id = auth()->user()->id;

      $records = Log::create([
          'user_id' => $id,
          'remarks' => $remark,
          'created_at' => Carbon::now()
      ]);

      Session::flash('alertTitle', 'Success');
      Session::flash('alertIcon', 'success');

      return redirect()
           ->route('admin.change.password')
           ->with('success', 'Password Successfully Updated');
    }else{

      Session::flash('alertTitle', 'Alert');
      Session::flash('alertIcon', 'warning');

      return redirect()
           ->route('admin.change.password')
           ->with('success', 'Current Password Does not Matched');
    }
    
    // dd($current_user);
  }
}