<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index',compact('users'));
    }



    public function create()
    {
        return view('dashboard.users.create');
    }//end of create



    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);

        $request_date = $request->except(['password']);
        $request_date['password'] = bcrypt($request->password);

        $user = User::create($request_date);

        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.users.index');

    }//end of store



    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}//end of controller
