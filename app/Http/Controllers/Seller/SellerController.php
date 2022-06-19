<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\SellerDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{
    public function storeSellerDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'skill_type' => 'required',
            'ownership_type' => 'required',
            'working_experience' => 'required',
            'phone_number' => 'required',
            'nid_number' => 'required',
            'adsress' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' => $validator->errors()->toArray(),
            ]);
        } else {
            $seller = new SellerDetail();
            $seller->user_id = Auth::user()->id;
            $seller->skill_type = $request->skill_type;
            $seller->ownership_type = $request->ownership_type;
            $seller->working_experience = $request->working_experience;
            $seller->phone_number = $request->phone_number;
            $seller->nid_number = $request->nid_number;
            $seller->adsress = $request->adsress;

            $seller->save();

            return response()->json([
                'status' => 200,
                'message' => "Successfully added!"
            ]);
        }
    }

    public function showAllSellers()
    {
        $sellers = User::with('sellerDetail')->where('role_id', 2)->latest()->get();
        return view('panel.seller.all.index', compact('sellers'));
    }

    public function verifySeller($id)
    {
        $seller = SellerDetail::where('user_id', $id)->first();
        $seller->is_verified = 1;
        $seller->save();
        return redirect()->back();
    }

    public function cancelVerificationOfSeller($id)
    {
        $seller = SellerDetail::where('user_id', $id)->first();
        $seller->is_verified = 0;
        $seller->save();
        return redirect()->back();
    }

    public function showChangeDetailsView()
    {
        $seller = User::with('sellerDetail')->findOrFail(auth()->user()->id);
        // dd($seller->sellerDetail->skill_type);
        return view('panel.seller.details.index', compact('seller'));
    }

    public function updateSellerDetails(Request $request)
    {
        $request->validate([
            'skill_type' => 'required',
            'ownership_type' => 'required',
            'working_experience' => 'required',
            'phone_number' => 'required',
            'nid_number' => 'required',
            'adsress' => 'required',
        ]);

        $seller = User::with('sellerDetail')->findOrFail(auth()->user()->id);
        // dd($seller->sellerDetail->skill_type);

        $seller->sellerDetail()->update(
            [
                'skill_type' => $request->skill_type,
                'ownership_type' => $request->ownership_type,
                'working_experience' => $request->working_experience,
                'phone_number' => $request->phone_number,
                'nid_number' => $request->nid_number,
                'adsress' => $request->adsress,
                'is_verified' => 0,
            ]
        );
        return back()->with('success', "Updated Successfully!");
    }

    public function sellerDelete($sellerID)
    {
        // dd($sellerID);
        $profile_photo = User::findOrFail($sellerID)->profile_photo;
        // dd(public_path($profile_photo));
        if (isset($profile_photo)) {
            unlink(public_path($profile_photo));
        }
        User::findOrFail($sellerID)->delete();
        return back();
    }
}
