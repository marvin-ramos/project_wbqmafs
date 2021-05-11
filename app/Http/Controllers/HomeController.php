<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Log;
use App\Employee;
use DB;
use App\Chart;
use Hash;
use Carbon\Carbon;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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

    //for water data here
    $waterData = DB::table('sensor_data')
            ->select('water_level')
            ->groupBy('water_level')
            ->orderBy('id', 'asc')
            ->pluck('water_level')
            ->all();

    $chart1 = new Chart;
    $chart1->labels = (array_keys($waterData));
    $chart1->dataset = (array_values($waterData));

    //for temperature data
    $temperatureData = DB::table('sensor_data')
            ->select('temperature_level')
            ->groupBy('temperature_level')
            ->orderBy('id', 'asc')
            ->pluck('temperature_level')
            ->all();

    $chart2 = new Chart;
    $chart2->labels = (array_keys($temperatureData));
    $chart2->dataset = (array_values($temperatureData));

    //for turbidity data
    $turbidityData = DB::table('sensor_data')
            ->select('turbidity_level')
            ->groupBy('turbidity_level')
            ->orderBy('id', 'asc')
            ->pluck('turbidity_level')
            ->all();

    $chart3 = new Chart;
    $chart3->labels = (array_keys($turbidityData));
    $chart3->dataset = (array_values($turbidityData));

    //for PH data
    $phData = DB::table('sensor_data')
            ->select('ph_level')
            ->groupBy('ph_level')
            ->orderBy('id', 'asc')
            ->pluck('ph_level')
            ->all();

    $chart4 = new Chart;
    $chart4->labels = (array_keys($phData));
    $chart4->dataset = (array_values($phData));

    return view('user.dashboard', compact('chart1','chart2','chart3','chart4','recentActivities','user'))
         ->with('history', $count);;
    }

    public function profile() {
        $count = Log::count(); 
        $user = auth()->user();
        $user->employee;
        
        return view('user.profile', compact('user'))
             ->with('history', $count);
    }

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
                        ->orderBy('created_at', 'desc')
                        ->simplePaginate(10);

        return view('activities.user-activities', compact('userActivities','user'))
             ->with('history', $count);
    }

    public function logout() {
        $remark = 'has Logged out to the system at';
        $id = auth()->user()->id;

        $records = Log::create([
            'user_id' => $id,
            'remarks' => $remark,
            'created_at' => Carbon::now()
        ]);

        auth()->logout();
        return redirect()
             ->route('view.login');
    }

    public function changePassword() {
        $count = Log::count(); 
        $user = auth()->user();
        $user->employee;
        
        return view('change_password.user-change_password', compact('user'))
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
           ->route('user.change.password')
           ->with('success', 'Password Successfully Updated');
    }else{

      Session::flash('alertTitle', 'Alert');
      Session::flash('alertIcon', 'warning');

      return redirect()
           ->route('user.change.password')
           ->with('success', 'Current Password Does not Matched');
    }
    // dd($current_user);
  }
}
