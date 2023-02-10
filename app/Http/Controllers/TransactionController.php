<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //

    public function checkout(){
        $user = Auth::user();
        $carts = Cart::whereBelongsTo($user)->get();
        
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $total =0;
        $quantity = 0;

        foreach($carts as $cart){
            $quantity += $cart->quantity;
            $total += $cart->quantity  * $cart->product->price;
        }
        $transaction->total = $total;
        $transaction->quantity = $quantity;
        $transaction->save();

        foreach($carts as $cart){
            $transactionDetail = new TransactionDetail();
            $transactionDetail->transaction_id = $transaction->id;
            $transactionDetail->product_id = $cart->product->id;
            $transactionDetail->sub_quantity= $cart->quantity;
            $transactionDetail->sub_total =  $cart->quantity  * $cart->product->price;
            $transactionDetail->save();
            $cart->delete();
        }

        return redirect()->back()->with('message','success purchase '.$quantity.' items');
    }
}
