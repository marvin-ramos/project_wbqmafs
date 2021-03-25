<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use Carbon\Carbon;
use App\Log;
use DB;
use Session;

class WbqmafsController extends Controller
{
    public function loginView() {
    	return view('login');
    }

    public function customlogin(Request $request) {
    	$input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            session(['check_login' => true ]);

            $remark = 'has Logged In to the system at';
            $id = auth()->user()->id;

            $records = Log::create([
                'user_id' => $id,
                'remarks' => $remark,
                'created_at' => Carbon::now()
            ]);

            if (auth()->user()->role_id === 1) {
                return redirect()
                   ->route('admin.dashboard')
                   ->with('success', 'Welcome Administrator');
            }else{
                return redirect()
                   ->route('user.dashboard')
                   ->with('success', 'Welcome User');
            }
           
        }else{
            Session::flash('alertTitle', 'Oppsss');
            Session::flash('alertIcon', 'warning');

            return redirect()
                 ->route('view.login')
                 ->with('success','Your provided information wrong!');
        }
    }
}
