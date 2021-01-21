@extends('layouts.frontend_master')
@section ('tittle')
<title>{{$category->category_name}}</title>
@stop
@section('content')

    <!-- Header Section Begin -->
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
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                @foreach($latest->take(4) as $last)
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
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>{{$category->category_name}}</h2>
                        </div>
                        <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset($product->image_one)}}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="{{url('add/to-wishlist/'.$product->id)}}"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <form action="{{url('add/to-cart/'.$product->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="price" value="{{$product->price}}">
                                        <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                        </form>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{url('product/details/'.$product->product_slug)}}">{{$product->product_name}}</a></h6>
                                    <h5>Rp {{$product->price}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection