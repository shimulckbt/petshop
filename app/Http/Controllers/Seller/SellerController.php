<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\SellerDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    // public function index()
    // {
    //     return view('seller.index');
    // }

    public function getSellerDetails()
    {
    }

    public function storeSellerDetails(Request $request)
    {
        $id = Auth::user()->id;
        $seller = new SellerDetail();

        $seller->user_id = $id;
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
