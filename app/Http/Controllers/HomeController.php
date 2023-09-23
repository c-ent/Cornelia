<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; //!added

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth']);
    }
//!added below all
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {

        if (auth()->check()) {
            $user = auth()->user();
            $role = $user->role->name;
            return view('welcome')->with('role', $role);
        } else {
            // Handle the case when the user is not authenticated
            return view('welcome'); // You can return a different view or message for unauthenticated users
        }

    } 

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function superadminHome(): View
     {
         return view('superadmin.dashboard');
     }

    public function adminHome(): View
    {
        return view('admin.dashboard');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome(): View
    {
        return view('user.dashboard');
    }


 
  
}
