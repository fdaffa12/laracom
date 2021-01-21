@extends('layouts.frontend_master')
@section ('tittle')
<title>Oreder Compolete</title>
@stop
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
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
    <!-- Hero Section End -->

    <section class="checkout spad">
        <div class="container">
            <h3>
                @if(session('orderComplete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('orderComplete')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
            </h3>
        </div>
    </section>

@endsection