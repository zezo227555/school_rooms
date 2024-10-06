<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.user', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        User::create($request->all());

        return redirect()->back()->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.user_profile', ['user' => $user]);
    }

    public function show_user($user_id)
    {
        $user = User::find($user_id);
        return view('user.user_show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.user_edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        if($request->name != $user->name){
            $user->name = $request->name;
        }
        if($request->email != $user->email){
            $user->email = $request->email;
        }
        if($request->passowrd != ''){
            $request->validate([
                'password' => 'min:8',
            ]);
            $user->password = Hash::make($request->password);
        }
        if(isset($request->role)){
            $user->role = $request->role;
        }

        $user->save();
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
