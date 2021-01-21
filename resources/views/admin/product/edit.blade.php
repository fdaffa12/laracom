@extends('admin.layouts.master')
@section('product') active show-sub @endsection
@section('manage-product') active @endsection
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
    	<nav class="breadcrumb s1-breadcrumb">
    		<a class="breadcrumb-item" href="{{url('admin/home')}}">Admin Dashboar</a>
    		<span class="breadcrumb-item active">Add Product</span>
    	</nav>
      <div class="sl-pagebody">
        <div class="row row-sm">

        	<div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Products</h6>
    		<form action="{{route('update-products')}}" method="POST" enctype="multipart/form-data">
    			@csrf
          <input type="hidden" name="id" value="{{$product->id}}">
          <div class="form-layout">
          			@if(session('success'))
          			<div class="alert alert-success alert-dismissible fade show" role="alert">
          			<strong>{{session('success')}}</strong>
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
          			</button>
          			</div>
          			@endif
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{$product->product_name}}" placeholder="Enter Product Name">
                  @error('product_name')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{$product->product_code}}" placeholder="Product Code">
                  @error('product_code')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price" value="{{$product->price}}" placeholder="Product Price">
                  @error('price')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="product_quantity" value="{{$product->product_quantity}}" placeholder="Product Quantity">
                  @error('product_quantity')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id" data-placeholder="Choose Category">
                    <option label="Choose Category"></option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $product->category_id ? "selected":""}}>{{$category->category_name}}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="brand_id" data-placeholder="Choose country">
                    <option label="Choose Brand"></option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? "selected":""}}>{{$brand->brand_name}}</option>
                    @endforeach
                  </select>
                  @error('brand_id')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                  <textarea name="short_description" id="summernote">{{$product->short_description}}</textarea>
                  @error('short_description')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-12 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                  <textarea name="long_description" id="summernote2">{{$product->long_description}}</textarea>
                  @error('long_description')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>

                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Update Data</button>
                </div><!-- form-layout-footer -->

        </form>

        <form action="{{route('update-image')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$product->id}}">
              <input type="hidden" name="img_one" value="{{$product->image_one}}">
              <input type="hidden" name="img_two" value="{{$product->image_two}}">
              <input type="hidden" name="img_three" value="{{$product->image_three}}">
              </div><!-- col-12 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main thambnail: <span class="tx-danger">*</span></label>
                  <img src="{{asset($product->image_one)}}" alt="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                  <img src="{{asset($product->image_two)}}" alt="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                  <img src="{{asset($product->image_three)}}" alt="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main thambnail: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_one">
                  @error('image_one')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_two">
                  @error('image_two')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_three">
                  @error('image_three')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Update Image</button>
            </div><!-- form-layout-footer -->
        </form>
          </div><!-- form-layout -->
        </div><!-- card -->
        </div><!-- sl-page-title -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection