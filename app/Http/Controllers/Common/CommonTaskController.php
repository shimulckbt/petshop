<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonTaskController extends Controller
{
    public function changeProfilePhotoView()
    {
        $profilePhoto = Auth::user()->profile_photo;
        // dd($profilePhoto);
        return view('panel.profile.change-photo.index', compact('profilePhoto'));
    }

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
        // dd($profilePhoto);
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
}
