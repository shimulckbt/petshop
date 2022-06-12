<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CommonTaskController extends Controller
{
    public function showChangeProfilePhotoView()
    {
        $profilePhoto = Auth::user()->profile_photo;
        return view('panel.profile.change-photo.index', compact('profilePhoto'));
    }

    ///////////           Change Profile Picture              ////////////

    public function profilePhotoChangeRequestSubmit(Request $request)
    {
        $request->validate(
            [
                'profile_photo' => 'required',
            ]
        );
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $profilePhoto = Auth::user()->profile_photo;
        $path = 'images/user_profile';

        if (!empty($profilePhoto)) {
            $file = $request->file('profile_photo');
            @unlink(public_path($profilePhoto));

            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();

            $file->move(public_path($path), $filename);
            $user->profile_photo = $path . '/' . $filename;
            $user->save();
            return redirect()->back()->with('success', 'Profile Picture Changed Successfully');
        } elseif (empty($profilePhoto)) {
            $file = $request->file('profile_photo');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();

            $file->move(public_path($path), $filename);
            $user->profile_photo = $path . '/' . $filename;
            $user->save();
            return redirect()->back()->with('success', 'Profile Picture Uploaded Successfully');
        } else {
            return redirect()->back()->with('success', 'Uploading Failed');
        }
    }


    ///////////            Vhange Password          ////////////

    public function showChangePasswordView()
    {
        return view('panel.profile.change-password.index');
    }

    public function changePasswordRequestSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required'],
            'password' => ['required', Password::min(8)],
            'confirm_password' => ['required', 'same:password'],
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->with("error", "Current Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('success', 'Password changed successfully!');
    }

    /////////////          Change General Information         ////////////

    public function showGeneralInformationView()
    {
        $user = User::findOrFail(auth()->user()->id);
        // dd($user->first_name);
        return view('panel.profile.change-general-information.index', compact('user'));
    }

    public function changeGeneralInfoRequestSubmit(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->update(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email
            ]
        );
        return back()->with('success', 'Updated Successfully!');
    }
}
