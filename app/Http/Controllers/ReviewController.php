<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();

        // Kiểm tra đã mua và đơn đã hoàn thành
        $hasCompletedOrder = OrderItem::where('product_id', $product->id)
            ->whereHas('order', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->where('status', 'completed');
            })
            ->exists();

        if (!$hasCompletedOrder) {
            return response()->json(['message' => 'Bạn chỉ có thể đánh giá sau khi hoàn tất đơn hàng.'], 403);
        }

        // Tạo hoặc cập nhật đánh giá
        Review::updateOrCreate(
            ['user_id' => $user->id, 'product_id' => $product->id],
            ['rating' => $request->rating, 'comment' => $request->comment]
        );

        return response()->json(['message' => 'Đánh giá đã được lưu.']);
    }
}
