<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Room;

class CartController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('carts.index', compact('rooms'));
    }

    public function addToCart(Request $request)
    {
        $room = Room::find($request->id);
        Cart::add($room->id, $room->name, $request->price, 1, [
            'image' => $room->image,
            'original_price' => $request->original_price,
        ]);
        return redirect()->back();
    }
    
    public function removeFromCart(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->back();
    }
    
    public function updateCart(Request $request)
    {
        Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity,
            ],
        ]);
        return redirect()->back();
    }
    
    public function checkout()
    {
        Cart::clear();
        return redirect()->back()->with('success', '預訂成功');
    }
}