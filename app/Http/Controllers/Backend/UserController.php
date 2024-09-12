<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|max:50',
            'email'     => 'required|max:100|unique:users,email',
            'phone'     => 'required|max:15',
            'password'  => 'required|min:5',
            'gender'    => 'required|in:male,female',
            'birthday'  => 'required|date_format:Y-m-d',
            'role'      => 'required|in:user,admin',
            'address'   => 'required|max:255',
        ]);
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->password),
            'gender'    => $request->gender,
            'birthday'  => $request->birthday,
            'role'      => $request->role,
            'address'   => $request->address,
        ]);
        return redirect()->route('backend.users.index')->with('message', 'Success Add Data!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'      => 'required|max:50',
            'email'     => 'required|max:100|unique:users,email,' . $user->id,
            'phone'     => 'required|max:15',
            'password'  => 'nullable|min:5',
            'gender'    => 'required|in:male,female',
            'birthday'  => 'required|date_format:Y-m-d',
            'role'      => 'required|in:user,admin',
            'address'   => 'required|max:255',
        ]);
        $param = [
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'gender'    => $request->gender,
            'birthday'  => $request->birthday,
            'role'      => $request->role,
            'address'   => $request->address,
        ];
        if ($request->filled('password')) {
            $param['password'] = Hash::make($request->password);
        }
        $user->update($param);
        return redirect()->route('backend.users.index')->with('message', 'Success Edit Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('backend.users.index')->with('message', 'Success Delete Data!');
    }
}
