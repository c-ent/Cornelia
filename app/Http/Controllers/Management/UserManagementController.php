<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserAccessRequest;

class UserManagementController extends Controller
{
    public function index()
    {
       
    }

    public function users()
    {
        $currentUser = Auth::user();
        $roleIdsToShow = [];

        if ($currentUser->role_id === 1) {
            $roleIdsToShow = [1, 2, 3];
        } elseif ($currentUser->role_id === 2) {
            $roleIdsToShow = [3];
        }

        $users = User::whereIn('role_id', $roleIdsToShow)->get();
        
        return view('Management.Usermanagement.users', compact('users'));
    }

    public function details(User $id)
    {
        $this->authorize('checkAccess', $id);
        return view('Management.Usermanagement.viewuser', ['user' => $id]);
    }

    public function create()
    {
        return view('Management.Usermanagement.createuser');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'role_id' => 3,
        ]);

        session()->flash('success', 'User created successfully');
        return redirect('/manage/users');
    }

    public function edit(User $id)
    {
        $this->authorize('checkAccess', $id);
        return view('Management.Usermanagement.edituser', ['user' => $id]);
    }

    public function update(Request $request, User $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $id->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        session()->flash('success', 'User updated successfully');
        return redirect('/manage/users');
    }

    public function delete(User $id)
    {
        $this->authorize('checkAccess', $id);
        $id->delete();
        return redirect('/manage/users');
    }
}
