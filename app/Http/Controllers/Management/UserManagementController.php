<?php
namespace App\Http\Controllers\Management;
use Illuminate\Validation\ValidationException; 

use App\Http\Controllers\Controller;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index(){
        $user = User::where('role_id', 3)->get();
        return view('management.usermanagement.manageusers')->with('users', $user);
    }

    //View
    public function details(User $id){
        return view('superadmin.adminview')->with('user', $id);
    }

    //Create and Store
    public function create(){
        return view('superadmin.admincreate');
    }

    public function store(){
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'email' => ['required'],
                'password' => ['required'],

            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->role_id = 2;
        $user->save();

        session()->flash('success', 'User created succesfully');

        return redirect('/superadmin');
    }

    public function edit(User $id){
        return view('superadmin.adminedit')->with('admin', $id);;
    
    }

    public function update(User $id){ 
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'email' => ['required'],
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

        $id->name = $data['name'];
        $id->email = $data['email'];
        $id->save();

        session()->flash('success', 'Admin updated successfully');
        return redirect('/superadmin');

    }

    //Deletee Admin
    public function delete(User $id){
        $id->delete();
        return redirect('/superadmin');
    }
};