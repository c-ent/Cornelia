<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
    return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        // if (Auth::attempt($credentials)) { 
        //     // Authentication successful
        //     $request->session()->regenerate();
        //     return redirect()->intended('dashboard');
        // }

        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            
            switch ($user->type) {
                case 'admin':
                    dd('yourea dmin');
                    // return redirect()->route('admin.home');
                case 'user':
                    dd('yourea user');
                    // return redirect()->route('manager.home');
                default:
                    return redirect()->route('home');
                }
        }

        $errorField = User::where('email', $credentials['email'])->exists() ? 'password' : 'email';

        return back()->withErrors([
            $errorField => $errorField === 'password' ? 'The password is incorrect.' : 'The provided credentials do not match our records.',
    
        ])->onlyInput('email');
        
    }
       

}


