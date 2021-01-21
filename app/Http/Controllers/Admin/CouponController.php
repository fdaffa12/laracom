<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){
		$coupons = Coupon::latest()->get();
		return view ('admin.coupon.index',compact('coupons'));
	}

	public function Store(Request $request){
		Coupon::insert([
			'coupon_name' => strtoupper($request->coupon_name),
			'discount' => strtoupper($request->discount),
			'created_at' => Carbon::now(),
		]);

		return redirect()->back()->with('success', 'Coupon added');
	}

	public function couponEdit($coupon_id){
		$coupon = Coupon::findOrFail($coupon_id);
		return view('admin.coupon.edit',compact('coupon'));
	}

	public function update(Request $request){
		$coupon_id = $request->id;
		Coupon::findOrFail($coupon_id)->update([
			'coupon_name' => strtoupper($request->coupon_name),
			'discount' => strtoupper($request->discount),
			'created_at' => Carbon::now(),
		]);

		return redirect()->route('admin.coupon')->with('update', 'Coupon Updated');
	}

	public function couponDelete($coupon_id){
		Coupon::findOrFail($coupon_id)->delete();
		return redirect()->back()->with('delete','Coupon Deleted');
	}

	public function Inactive($coupon_id){
		Coupon::find($coupon_id)->update(['status' => 0]);
		return redirect()->back()->with('Catupdated','Coupon Inactive');	
	}

	public function Active($coupon_id){
		Coupon::find($coupon_id)->update(['status' => 1]);
		return redirect()->back()->with('Catupdated','Coupon Active');
	}
}
