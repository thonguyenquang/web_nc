<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();
        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }
        if ($request->ajax()) {
            $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
            return response()->json([
                'status' => 'success',
                'cart_count' => $cartCount
            ]);
        }
        if ($request->has('buy_now')) {
            return redirect()->route('checkout');
        }
        return redirect()->route('cart.index');
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();
        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
            return response()->json([
                'status' => 'success',
                'cart_count' => $cartCount
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Item not found in cart'
        ], 404);
    }

    public function remove($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();
        if ($cartItem) {
            $cartItem->delete();
        }
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
        if($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng đang trống.');
        }
        return view('cart.checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^\d{9,11}$/',
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'address' => 'required|string',
     
        ]);

        $cart = Cart::with('product')->where('user_id', Auth::id())->get();
        if($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng đang trống.');
        }

        $total = 0;
        foreach($cart as $item) {
            $total += $item->product->price * $item->quantity;
        }
    
        $order = \App\Models\Order::create([
            'user_id' => Auth::id(),
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'province' => $request->province,
            'district' => $request->district,
            'ward' => $request->ward,
            'address' => $request->address,
            'note' => $request->note,
            'total_price' => $total,
            'status' => 'pending',
        
        ]);
        

        foreach($cart as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Xóa giỏ hàng sau khi đặt thành công
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.show', $order->id)->with('success', 'Đặt hàng thành công!');
    }

}
