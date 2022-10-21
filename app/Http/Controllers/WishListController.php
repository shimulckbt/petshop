<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function addToWishList($id){
        
        if(WishList::where('product_id', $id)
            ->where('user_id', auth()->id())->first()
        ){
            return back()->with('wish-exist', $id);
        }
        WishList::create([
            'product_id' => $id,
            'user_id' => auth()->id()
        ]);

        return back()->with(['wish-list' => 'Added to wish list']);
    }

    public function removeFromWishList($id){
        $wish = WishList::findOrFail($id);
        $wish->delete();

        return back();
    }

    public function checkWishList(){
        $wishes = WishList::where('user_id', auth()->id())
                ->with(['product'])->get();

        return view('panel.wishes.wish-list', compact('wishes'));
    }
}
