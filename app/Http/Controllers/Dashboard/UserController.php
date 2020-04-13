<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //هذا الكونستراكتور لمنع الدخول من خلال الراوابط
    public function __construct(){
        $this->middleware(['permission:read_users'])->only(['index']); //طبقتها على فانكشن ال index
        $this->middleware(['permission:create_users'])->only(['create']);
        $this->middleware(['permission:update_users'])->only(['edit']);
        $this->middleware(['permission:delete_users'])->only(['destroy']);
    }


    public function index()
    {
        $users = User::whereRoleIs('admin')->get(); //هيك راح يظهر اليوزر ال admin فقط من دون ال super
        return view('dashboard.users.index',compact('users'));
    }



    public function create()
    {
        return view('dashboard.users.create');
    }//end of create



    public function store(Request $request)
    {

//        dd($request->all());

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);

        $request_date = $request->except(['password','password_confirmation','permissions']);
        $request_date['password'] = bcrypt($request->password);

        $user = User::create($request_date);

        $user->attachRole('admin'); //هذه عبارة عن رول اسمها admin
        $user->syncPermissions($request->permissions);
        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.users.index');

    }//end of store



    public function edit(User $user)
    {
        return view('dashboard.users.edit',compact('user'));

    }//end of edit

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
         ]);

        $request_date = $request->except(['permissions']);
        $user->update($request_date);

        $user->syncPermissions($request->permissions);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.users.index');

    }//end of update

    public function destroy(User $user)
    {
        //
    }
}//end of controller
