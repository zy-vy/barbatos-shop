<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cartPage(){
        $user= Auth::user();
        $carts = Cart::whereBelongsTo($user)->get();


        return view('cart',compact('carts'));

    }
    //
    public function purchase(Request $req,$id){
        // $product = Product::find($id);
        $cart = new Cart();
        $cart->quantity = $req->quantity;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;     
        $cart->save();
        return redirect()->back()->with('message','success add to cart');                                                   
    }

    public function delete($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message','success delete item');
    }
}
