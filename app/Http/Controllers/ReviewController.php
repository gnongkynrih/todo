<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::paginate(10);
        return view('reviews.index', compact( 'reviews'));
    }
    public function create(){
        return view('reviews.create');
    }
    public function store(Request $request){
        $review = new Review();
        if($request->hasFile('profile')){
            $filename = time() . '.' . $request->profile->extension();
            $request->profile->storeAs('public/images', $filename);
            $review->profile = $filename;
        }
        $review->name = $request->name;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();
        return redirect()->route('reviews.index')->with('success', 'Review Created Successfully');
    }
    public function destroy(Review $review){
        $image_path = asset('storage/images/' . $review->profile);
        
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review Deleted Successfully');
    }
}
