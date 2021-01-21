<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
	public function __construct(){
		$categories = Category::where('status','1')->get();
		view()->share(['categories' => $categories]);
	}

	public function index(){
		$products = Product::where('status',1)->latest()->get();
		$banners = Product::where('category_id','LIKE','%5%')->orderby('id','DESC')->get();
		$categories = Category::where('status',1)->latest()->get();
		$populars = Product::orderby('views','DESC')->get();
		return view('pages.index',compact('products','categories','populars','banners'));
	}

	public function productDetail($product_slug){
		$product = Product::where('product_slug', $product_slug)->first();
		$views = $product->views;
        Product::where('product_slug',$product_slug)->update(['views'=>$views + 1]);
        $populars = Product::orderby('views','DESC')->get();
		$category_id = $product->category_id;
		$related_p = Product::where('category_id', $category_id)->where('id','!=', $product_slug)->latest()->get();
		return view('pages.product-details', compact('product','related_p','populars'));
	}

	public function category($cat_id){
		$category = Category::findOrFail($cat_id);
		$products = Product::where('category_id','LIKE','%'.$category->id.'%')->orderby('id','DESC')->paginate(9);
		$populars = Product::orderby('views','DESC')->get();
		$latest = Product::where('status',1)->orderby('id', 'DESC')->get();
		return view('pages.category', compact('category','products','latest'));
	}

	// public function productDetail($product_id){
	// 	$product = Product::findOrFail($product_id);
	// 	return view('pages.product-details', compact('product'));
	// }
}
