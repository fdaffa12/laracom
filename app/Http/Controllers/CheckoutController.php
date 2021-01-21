<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Coupon;

class CheckoutController extends Controller
{
    public function index(Request $request){
    	if (Auth::check()){
    		$carts = Cart::where('user_ip', request()->ip())->latest()->get();
    		$check = Coupon::where('coupon_name',$request->coupon_name)->first();
    		$subtotal = Cart::all()->where('user_ip', request()->ip())->sum
		        (function($t){
		            return $t->price * $t->qty;
		        });
			if ($check){
				Session::put('coupon',[
					'coupon_name' => $check->coupon_name,
					'coupon_discount' => $check->discount,
					'discount_amount' => $subtotal * ($check->discount/100),
				]);
			}
    		return view('pages.checkout', compact('carts', 'subtotal'));
    	}
    	return redirect()->route('login');
    }
}
