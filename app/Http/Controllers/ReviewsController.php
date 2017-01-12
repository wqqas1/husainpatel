<?php

namespace App\Http\Controllers;
use App\Hotel;
use App\Review;
use Auth;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store(Request $request, Hotel $hotel) {


    //  $review = new Review;
    //  $review->comment = $request->comment;
    //  $hotel->reviews()->save($review);
    $this->validate($request, [
      'comment' => 'required|min:4'
    ]);
    $review = new Review($request->all());
    $review->user_id = Auth::id();

      $hotel->addReview($review);

      return back();
       }

       public function edit(Review $review) {

         return view('reviews.edit', compact('review'));


         }

         public function update(Request $request, Review $review) {
           $this->validate($request, [
             'comment' => 'required|min:4'
           ]);
           $review->update($request->all());
           return back();

            }

            public function destroy(Request $request, Review $review) {
          //    $review =  $review->id;
          //    $review->delete();
              $id = $review->id;
              $review = $review->find($id);
              $review->delete();

            //  return $review;
            //  $review = $review->find($id);
              return back();

                }
}