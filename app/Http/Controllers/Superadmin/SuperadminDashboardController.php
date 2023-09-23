<?php


namespace App\Http\Controllers\Superadmin;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException; //for valdiation? //!

use App\Http\Controllers\Controller;
use App\Models\User;




class SuperAdminDashboardController extends Controller
{

    public function index(){
        $admin = User::where('role_id', 2)->get();
        return view('superadmin.dashboard')->with('admins', $admin);
    }

    //Admin details
    public function details(User $id){
        return view('superadmin.adminview')->with('admin', $id);
    }


    
    //To Create and Store the Todo
    public function create(){
        return view('create');
    }

    public function store(){
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

        $todo = new Todo();
        //On the left is the field name in DB and on the right is field name in Form/view
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo created succesfully');

        return redirect('/');
    }


    
    //To show the Edit form with corresponding todo name and descript
    public function edit(Todo $todo){
        return view('edit')->with('todos', $todo);;
    
    }
    public function update(Todo $todo){ //To editupdate the data in the database
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');

    }

    //Deletee Todo item
    public function delete(Todo $todo){
        $todo->delete();
        return redirect('/');
    }
};