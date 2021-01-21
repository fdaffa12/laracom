<!DOCTYPE html>

<html lang="zxx">



<head>

    <meta charset="UTF-8">

    <meta name="description" content="Ogani Template">

    <meta name="keywords" content="Ogani, unica, creative, html">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('tittle')
    <title>Toko Elektronik</title>



    <!-- Google Font -->

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">



    <!-- Css Styles -->

    <link rel="stylesheet" href="{{asset ('frontend')}}/css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="{{asset ('frontend')}}/css/font-awesome.min.css" type="text/css">

    <link rel="stylesheet" href="{{asset ('frontend')}}/css/elegant-icons.css" type="text/css">

    <link rel="stylesheet" href="{{asset ('frontend')}}/css/nice-select.css" type="text/css">

    <link rel="stylesheet" href="{{asset ('frontend')}}/css/jquery-ui.min.css" type="text/css">

    <link rel="stylesheet" href="{{asset ('frontend')}}/css/owl.carousel.min.css" type="text/css">

    <link rel="stylesheet" href="{{asset ('frontend')}}/css/slicknav.min.css" type="text/css">

    <link rel="stylesheet" href="{{asset ('frontend')}}/css/style1.css" type="text/css">

    <link rel="shortcut icon" href="{{asset ('frontend')}}/img/logo1.png" type="image/x-icon" />

</head>



<body>

    <!-- Page Preloder -->

    <div id="preloder">

        <div class="loader"></div>

    </div>



    <!-- Humberger Begin -->

    <div class="humberger__menu__overlay"></div>

    <div class="humberger__menu__wrapper">

        <div class="humberger__menu__logo">

            <a href="{{url('/')}}"><img src="{{asset ('frontend')}}/img/logo1.png" alt=""></a>

        </div>

        <div class="humberger__menu__cart">

            <ul>

                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>

                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>

            </ul>

            <div class="header__cart__price">item: <span>$150.00</span></div>

        </div>

        <div class="humberger__menu__widget">

            <div class="header__top__right__language">

                <img src="{{asset ('frontend')}}/img/language.png" alt="">

                <div>English</div>

                <span class="arrow_carrot-down"></span>

                <ul>

                    <li><a href="#">Spanis</a></li>

                    <li><a href="#">English</a></li>

                </ul>

            </div>

            <div class="header__top__right__auth">

                <a href="#"><i class="fa fa-user"></i> Login</a>

            </div>

        </div>

        <nav class="humberger__menu__nav mobile-menu">

            <ul>

                <li class="active"><a href="{{url ('/')}}">Home</a></li>

                <li><a href="./shop-grid.html">Shop</a></li>

                <li><a href="#">Pages</a>

                    <ul class="header__menu__dropdown">

                        <li><a href="{{url('cart')}}">Shoping Cart</a></li>

                        <li><a href="{{url('checkout')}}">Check Out</a></li>

                    </ul>

                </li>

            </ul>

        </nav>

        <div id="mobile-menu-wrap"></div>

        <div class="header__top__right__social">

            <a href="#"><i class="fa fa-facebook"></i></a>

            <a href="#"><i class="fa fa-twitter"></i></a>

            <a href="#"><i class="fa fa-linkedin"></i></a>

            <a href="#"><i class="fa fa-pinterest-p"></i></a>

        </div>

        <div class="humberger__menu__contact">

            <ul>

                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>

                <li>Free Shipping for all Order of $99</li>

            </ul>

        </div>

    </div>

    <!-- Humberger End -->



    <!-- Header Section Begin -->

    <header class="header">

        <div class="header__top">

            <div class="container">

                <div class="row">

                    <div class="col-lg-6 col-md-6">

                        <div class="header__top__left">

                            <ul>

                                <li><a href="https://github.com/fdaffa12"><i class="fa fa-github"> github.com/fdaffa12</i></a></li>

                            </ul>

                        </div>

                    </div>

                    <div class="col-lg-6 col-md-6">

                        <div class="header__top__right">

                            <div class="header__top__right__auth">

                                @auth

                                <a href="{{route('home')}}"><i class="fa fa-user"></i> My Accoount</a>

                                @else

                                <a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a>

                                <a href="{{route('register')}}"><i class="fa fa-user"></i> Register</a>

                                @endauth

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                    <strong>{{session('success')}}</strong>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    </div>

                    @endif

        <div class="container">

            <div class="row">

                <div class="col-lg-3">

                    <div class="header__logo">

                        <a href="{{url ('/')}}"><img src="{{asset ('frontend')}}/img/logo1.png" alt=""></a>

                    </div>

                </div>

                <div class="col-lg-6">

                    <nav class="header__menu">

                        <ul>

                            <li class="active"><a href="{{url ('/')}}">Home</a></li>

                            <li><a href="#">Pages</a>

                                <ul class="header__menu__dropdown active">

                                    <li><a href="{{url('cart')}}">Shoping Cart</a></li>

                                    <li><a href="{{url('checkout')}}">Check Out</a></li>

                                </ul>

                            </li>

                        </ul>

                    </nav>

                </div>

                <div class="col-lg-3">

                    <div class="header__cart">

                        @php

                            $total = App\Cart::all()->where('user_ip', request()->ip())->sum

                            (function($t){

                                return $t->price * $t->qty;

                            });

                            $quantity = App\Cart::where('user_ip', request()->ip())->sum('qty');

                            $wishqty = App\Wishlist::where('user_id', Auth::id())->get();

                        @endphp

                        <ul>

                            <li><a href="{{url('wishlist')}}"><i class="fa fa-heart"></i> <span>{{count($wishqty)}}</span></a></li>

                            <li><a href="{{url('cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{$quantity}}</span></a></li>

                        </ul>

                        <div class="header__cart__price">item: <span>Rp {{$total}}</span></div>

                    </div>

                </div>

            </div>

            <div class="humberger__open">

                <i class="fa fa-bars"></i>

            </div>

        </div>

    </header>

    <!-- Header Section End -->



    @yield ('content')



    <!-- Footer Section Begin -->

    <footer class="footer spad">

        <div class="container">

            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="footer__about">

                        <div class="footer__about__logo">

                            <a href="{{url ('/')}}"><img src="{{asset ('frontend')}}/img/logo1.png" alt=""></a>

                        </div>

                        <ul>

                            <li>Address: -</li>

                            <li>Phone: -</li>

                            <li>Email: fdaffa12@gmail.com</li>

                        </ul>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">

                    <div class="footer__widget">

                        <h6>Useful Links</h6>

                        <ul>

                            <li><a href="{{url('/')}}">Home</a></li>

                        </ul>

                    </div>

                </div>

                <div class="col-lg-4 col-md-12">

                    <div class="footer__widget">

                        <h6>Join Our Newsletter Now</h6>

                        <p>Get E-mail updates about our latest shop and special offers.</p>

                        <form action="#">

                            <input type="text" placeholder="Enter your mail">

                            <button type="submit" class="site-btn">Subscribe</button>

                        </form>

                        <div class="footer__widget__social">

                            <a href="#"><i class="fa fa-facebook"></i></a>

                            <a href="#"><i class="fa fa-instagram"></i></a>

                            <a href="#"><i class="fa fa-twitter"></i></a>

                            <a href="#"><i class="fa fa-pinterest"></i></a>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">

                    <div class="footer__copyright">

                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>

  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>

                        <div class="footer__copyright__payment"><img src="{{asset ('frontend')}}/img/payment-item.png" alt=""></div>

                    </div>

                </div>

            </div>

        </div>

    </footer>

    <!-- Footer Section End -->



    <!-- Js Plugins -->

    <script src="{{asset ('frontend')}}/js/jquery-3.3.1.min.js"></script>

    <script src="{{asset ('frontend')}}/js/bootstrap.min.js"></script>

    <script src="{{asset ('frontend')}}/js/jquery.nice-select.min.js"></script>

    <script src="{{asset ('frontend')}}/js/jquery-ui.min.js"></script>

    <script src="{{asset ('frontend')}}/js/jquery.slicknav.js"></script>

    <script src="{{asset ('frontend')}}/js/mixitup.min.js"></script>

    <script src="{{asset ('frontend')}}/js/owl.carousel.min.js"></script>

    <script src="{{asset ('frontend')}}/js/main.js"></script>







</body>



</html>