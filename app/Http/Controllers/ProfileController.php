<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function edit()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        //dd($user);
        return view('dashboard.pages.Profile.edit')->with('user', $user);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required',
        ]);

        $id = auth()->user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = Hash::make($user->password);

//dd($user);

        $user->save();
        session()->flash('success', 'Profile Updated Successfully');
        return redirect('home');
    }

    public function editPassword()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        //dd($user);
        return view('dashboard.pages.Profile.editPassword')->with('user', $user);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password'          => 'required|min:6',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
       // dd($rules);


        if (!(Hash::check($request->get('old_password'), auth()->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }


        $user = auth()->user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully !");


    }
}
