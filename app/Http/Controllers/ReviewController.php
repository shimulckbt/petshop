<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reviewStore(Request $request)
    {
        // dd($request->all());
        if (!isset($request->rating)) {
            return redirect()->back()->with('error', 'Rating can not be empty, please rate this product..');
        }

        if (!isset($request->summary)) {
            return redirect()->back()->with('error', 'Summary can not be empty, please rate this product..');
        }

        if (!isset($request->summary)) {
            return redirect()->back()->with('error', 'Comment can not be empty, please rate this product..');
        }

        $productId = $request->product_id;

        Review::insert([
            'product_id' => $productId,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'rating' => $request->rating,
            'created_at' => Carbon::now(),

        ]);

        return redirect()->back()->with('success', 'Review placed successfully');
    }

    public function pendingReview()
    {
        $reviews = Review::with('user', 'product')->where('status', 0)->orderBy('id', 'DESC')->get();
        return view('panel.review.pending', compact('reviews'));
    }

    public function reviewApprove($id)
    {

        Review::where('id', $id)->update(['status' => 1]);

        return redirect()->back()->with('success', 'Review Approved Successfully');
    }

    public function reviewInApprove($id)
    {

        Review::where('id', $id)->update(['status' => 0]);

        return redirect()->back()->with('success', 'Review Inpproved Successfully');
    }

    public function publishReview()
    {
        $reviews = Review::with('user', 'product')->where('status', 1)->orderBy('id', 'DESC')->get();
        return view('panel.review.publish', compact('reviews'));
    }

    public function deleteReview($id)
    {
        Review::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Review Deleted Successfully');
    }

    public function allReview()
    {
        $reviews = Review::orderBy('id', 'DESC')->get();
        return view('panel.review.all', compact('reviews'));
    }
}
