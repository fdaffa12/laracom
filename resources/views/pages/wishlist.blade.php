@extends('layouts.frontend_master')
@section ('tittle')
<title>Wishlist</title>
@stop
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        @php
                            $categoriess = App\Category::where('status',1)->latest()->get();
                        @endphp
                        <ul>
                            @foreach($categoriess as $row)
                            <li><a href="#">{{$row->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                	@if(session('cart_delete'))
          			<div class="alert alert-danger alert-dismissible fade show" role="alert">
          			<strong>{{session('cart_delete')}}</strong>
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
          			</button>
          			</div>
          			@endif

          			@if(session('cart_update'))
          			<div class="alert alert-success alert-dismissible fade show" role="alert">
          			<strong>{{session('cart_update')}}</strong>
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
          			</button>
          			</div>
          			@endif
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Cart</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($wishlist as $row)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset($row->product->image_one)}}" alt="" style="height: 70px; width: 70px;">
                                        <h5>{{$row->product->product_name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rp. {{$row->product->price}}
                                    </td>
                                    <td class="shoping__cart__price">
                                    	<form action="{{url('add/to-cart/'.$row->product_id)}}" method="POST">
                                		@csrf
                                		<input type="hidden" name="price" value="{{$row->product->price}}">
                                        <button href="" class="btn btn-sm btn-danger">Add To Cart</button>
                                    	</form>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{url('wishlist/destroy/'.$row->id)}}">
                                        	<span class="icon_close"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection