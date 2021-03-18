<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Log;
use App\Employee;

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
    $employeeTable = Employee::get();

    return view('user.dashboard', compact('employeeTable','user'))
         ->with('history', $count);;
    }

    public function logout() {
        auth()->logout();
        return redirect()
        ->route('view.login');
    }
}
