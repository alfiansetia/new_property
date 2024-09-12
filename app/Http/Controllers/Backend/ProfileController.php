<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        return view('backend.profile.index');
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|max:50',
            'gender'    => 'required|in:male,female',
            'phone'     => 'required|max_digits:15',
            'birthday'  => 'required|date_format:Y-m-d',
            'avatar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'address'   => 'required|max:200',
        ]);
        $user = auth()->user();
        $destinationPath = public_path('uploads/images/');
        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, 755, true);
        }
        $img = $user->getRawOriginal('avatar');
        if ($files = $request->file('avatar')) {
            if (!empty($img) && file_exists($destinationPath . $img)) {
                File::delete($destinationPath . $img);
            }
            $img = 'avatar_' . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $img);
        }
        $user->update([
            'name'      => $request->name,
            'gender'    => $request->gender,
            'phone'     => $request->phone,
            'birthday'  => $request->birthday,
            'address'   => $request->address,
            'avatar'    => $img,
        ]);
        return redirect()->route('backend.profile.index')->with('message', 'Success Update Profile');
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = auth()->user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('backend.profile.index')->with('message', 'Success Update Password');
    }
}
