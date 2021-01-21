<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$brands = Brand::latest()->get();
    	return view('admin.brand.index', compact('brands'));
    }

    public function Store(Request $request){
		$request->validate([
			'brand_name' => 'required|unique:brands,brand_name'
		]);

		Brand::insert([
			'brand_name' => $request->brand_name,
			'created_at' => Carbon::now()
		]);

		return redirect()->back()->with('success','Brand added');
	}

	public function Edit($brand_id){
		$brand = Brand::find($brand_id);
		return view('admin.brand.edit', compact('brand'));
	}

	public function Update(Request $request){
		$brand_id = $request->id;

		Brand::find($brand_id)->update([
			'brand_name' => $request->brand_name,
			'created_at' => Carbon::now()
		]);

		return redirect()->route('admin.brand')->with('Catupdated','Brand updated');
	}

	public function Delete($brand_id){
		Brand::find($brand_id)->delete();
		return redirect()->back()->with('delete','Brand delete added');
	}

	public function Inactive($brand_id){
		Brand::find($brand_id)->update(['status' => 0]);
		return redirect()->back()->with('Catupdated','Brand Inactive');	
	}

	public function Active($brand_id){
		Brand::find($brand_id)->update(['status' => 1]);
		return redirect()->back()->with('Catupdated','Brand Active');
	}
}
