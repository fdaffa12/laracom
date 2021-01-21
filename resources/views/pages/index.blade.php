@extends('layouts.frontend_master')
@section('content')
        <!-- Hero Section Begin -->
    <section class="hero">
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
                            <li><a href="{{url('category/'.$row->id)}}">{{$row->category_name}}</a></li>
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
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Hot Product</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach($banners as $key => $banner)
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{asset($banner->image_one)}}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="{{url('add/to-wishlist/'.$banner->id)}}"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <form action="{{url('add/to-cart/'.$banner->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="price" value="{{$banner->price}}">
                                                <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                                </form>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <h5><a href="{{url('product/details/'.$banner->product_slug)}}">{{$banner->product_name}}</a></h5>
                                            <div class="product__item__price">{{$banner->price}}</div>
                                        </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($products as $product)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset($product->image_one)}}">
                            <h5><a href="{{url('product/details/'.$product->product_slug)}}">{{$product->product_name}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($categories as $cat)
                            <li data-filter=".filter{{$cat->id}}">{{$cat->category_name}}</li>
                            @endforeach
                            <!-- <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            @foreach($categories as $cat)
            @php
                $products = App\Product::where('category_id',$cat->id)->latest()->get();
            @endphp
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix filter{{$cat->id}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset($product->image_one)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{url('add/to-wishlist/'.$product->id)}}"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <form action="{{url('add/to-cart/'.$product->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                </form>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{url('product/details/'.$product->product_slug)}}">{{$product->product_name}}</a></h6>
                            <h5>{{$product->price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        @foreach($products->take(4) as $last)
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="{{url('product/details/'.$last->product_slug)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($last->image_one)}}" alt="" style="width: 100px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$last->product_name}}</h6>
                                        <span>{{$last->price}}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        @foreach($populars->take(3) as $last)
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="{{url('product/details/'.$last->product_slug)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset($last->image_one)}}" alt="" style="width: 100px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$last->product_name}}</h6>
                                        <span>Rp. {{$last->price}}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
@endsection