<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function store(Request $request, $product_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'product_id' => $product_id,
            'id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Cảm ơn bạn đã đánh giá sản phẩm!');
    }


    public function destroy($review_id)
    {
        $review = Review::findOrFail($review_id);

        if (Auth::id() === $review->id) {
            $review->delete();
            return redirect()->back()->with('success', 'Đã xóa đánh giá.');
        }

        return redirect()->back()->with('error', 'Bạn không có quyền xóa đánh giá này.');
    }
}
