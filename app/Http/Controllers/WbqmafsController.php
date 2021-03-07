<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;

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
            return redirect()
            ->route('view')
            ->with('error','Your provided information wrong!');
        }
    }
}
