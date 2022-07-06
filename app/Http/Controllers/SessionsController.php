<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required' 
        ]);

        if(auth('web')->attempt($attributes))
        {
            session()->regenerate();
            return redirect('dashboard');
        }
        else{

            return back()->withErrors(['email'=>'Email or password invalid.']);
        }
    }
    
    public function destroy()
    {

        auth('web')->logout();

        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
