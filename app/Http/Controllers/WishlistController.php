<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
	public function addToWishlist($product_id){
		if (Auth::check()){
			Wishlist::insert([
				'user_id' => Auth::id(),
				'product_id' => $product_id,
		]);
			return redirect()->back()->with('cart', 'Product added On Wishlist');
		}else{
			return redirect()->route('login')->with('loginError', 'At First Login Your Account');
		}
	}

	public function wishPage(){
		$wishlist = Wishlist::where('user_id', Auth::id())->latest()->get();
		return view('pages.wishlist', compact('wishlist'));
	}

	public function destroy($wishlist_id){
		Wishlist::where('id',$wishlist_id)->where('user_id', Auth::id())->delete();
		return redirect()->back()->with('cart_delete', 'Wishlist Product Removed');
	}
}
