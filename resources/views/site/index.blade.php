@extends('layouts.site')
@section('content')

<main>

    <!-- slider-area -->
    <section class="slider-area position-relative">
        <div class="third-slider-active">
            <div class="third-slider-item third-slider-bg" data-background="{{asset('site/img/slider/third_slider_bg.jpg')}}">
                <div class="container custom-container-two">
                    <div class="third-slider-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h3 class="sub-title" data-animation-in="fadeInUp" data-delay-in=".2" data-duration-in="1.5">best offer !</h3>
                                    <h2 class="title" data-animation-in="fadeInUp" data-delay-in=".4" data-duration-in="1.5">{{$especial->title}}</h2>
                                    <p data-animation-in="fadeInUp" data-delay-in=".6" data-duration-in="1.5">Get up to {{$especial->discount}}% off Today Only</p>
                                    <a href="{{route('site.productPage',$especial->id)}}" class="btn" data-animation-in="fadeInUp" data-delay-in=".8" data-duration-in="1.5">Shop now</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="third-slider-img">
                                    <div class="img-shape" data-background="{{asset('site/img/slider/third_slide_shape.png')}}" data-animation-in="zoomIn"
                                        data-delay-in="1" data-duration-in="1.5"></div>
                                    <a href="{{route('site.productPage',$especial->id)}}"><img src="{{Storage::url($especial->image)}}" alt="" class="main-img" data-animation-in="slideInRight2"
                                        data-delay-in="1" data-duration-in="1.5"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="third-slider-item third-slider-bg" data-background="{{asset('site/img/slider/third_slider_bg.jpg')}}">
                <div class="container custom-container-two">
                    <div class="third-slider-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h3 class="sub-title" data-animation-in="fadeInUp" data-delay-in=".2" data-duration-in="1.5">top deal !</h3>
                                    <h2 class="title" data-animation-in="fadeInUp" data-delay-in=".4" data-duration-in="1.5">athletes shoes</h2>
                                    <p data-animation-in="fadeInUp" data-delay-in=".6" data-duration-in="1.5">Get up to 50% off Today Only</p>
                                    <a href="shop-sidebar.html" class="btn" data-animation-in="fadeInUp" data-delay-in=".8" data-duration-in="1.5">Shop now</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="third-slider-img">
                                    <div class="img-shape" data-background="{{asset('site/img/slider/third_slide_shape.png')}}" data-animation-in="zoomIn"
                                        data-delay-in="1" data-duration-in="1.5"></div>
                                    <img src="{{asset('site/img/slider/third_slider_img02.png')}}" alt="" class="main-img" data-animation-in="slideInRight2"
                                        data-delay-in="1" data-duration-in="1.5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="third-slider-item third-slider-bg" data-background="{{asset('site/img/slider/third_slider_bg.jpg')}}">
                <div class="container custom-container-two">
                    <div class="third-slider-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h3 class="sub-title" data-animation-in="fadeInUp" data-delay-in=".2" data-duration-in="1.5">top deal !</h3>
                                    <h2 class="title" data-animation-in="fadeInUp" data-delay-in=".4" data-duration-in="1.5">New sports shoes</h2>
                                    <p data-animation-in="fadeInUp" data-delay-in=".6" data-duration-in="1.5">Get up to 50% off Today Only</p>
                                    <a href="shop-sidebar.html" class="btn" data-animation-in="fadeInUp" data-delay-in=".8" data-duration-in="1.5">Shop now</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="third-slider-img">
                                    <div class="img-shape" data-background="{{asset('site/img/slider/third_slide_shape.png')}}" data-animation-in="zoomIn"
                                        data-delay-in="1" data-duration-in="1.5"></div>
                                    <img src="{{asset('site/img/slider/third_slider_img03.png')}}" alt="" class="main-img" data-animation-in="slideInRight2"
                                        data-delay-in="1" data-duration-in="1.5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="third-slider-item third-slider-bg" data-background="{{asset('site/img/slider/third_slider_bg.jpg')}}">
                <div class="container custom-container-two">
                    <div class="third-slider-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h3 class="sub-title" data-animation-in="fadeInUp" data-delay-in=".2" data-duration-in="1.5">best offer !</h3>
                                    <h2 class="title" data-animation-in="fadeInUp" data-delay-in=".4" data-duration-in="1.5">Gym sports shoes</h2>
                                    <p data-animation-in="fadeInUp" data-delay-in=".6" data-duration-in="1.5">Get up to 50% off Today Only</p>
                                    <a href="shop-sidebar.html" class="btn" data-animation-in="fadeInUp" data-delay-in=".8" data-duration-in="1.5">Shop now</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="third-slider-img">
                                    <div class="img-shape" data-background="{{asset('site/img/slider/third_slide_shape.png')}}" data-animation-in="zoomIn"
                                        data-delay-in="1" data-duration-in="1.5"></div>
                                    <img src="{{asset('site/img/slider/third_slider_img04.png')}}" alt="" class="main-img" data-animation-in="slideInRight2"
                                        data-delay-in="1" data-duration-in="1.5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider-area-end -->

    <!-- shoes-category-area -->
    <div class="shoes-category-area pt-80 pb-30">
        <div class="container custom-container-two">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="shoes-cat-item mb-50">
                        <div class="thumb mb-30">
                            <a href="shop-sidebar.html"><img src="{{asset('site/img/images/shoes_cat_img01.jpg')}}" alt=""></a>
                        </div>
                        <div class="content">
                            <ul>
                                <li><a href="shop-sidebar.html">Women Shoes</a></li>
                                <li><span>18</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="shoes-cat-item mb-50">
                        <div class="thumb mb-30">
                            <a href="shop-sidebar.html"><img src="{{asset('site/img/images/shoes_cat_img02.jpg')}}" alt=""></a>
                        </div>
                        <div class="content">
                            <ul>
                                <li><a href="shop-sidebar.html">Travelling Shoes</a></li>
                                <li><span>24</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="shoes-cat-item mb-50">
                        <div class="thumb mb-30">
                            <a href="shop-sidebar.html"><img src="{{asset('site/img/images/shoes_cat_img03.jpg')}}" alt=""></a>
                        </div>
                        <div class="content">
                            <ul>
                                <li><a href="shop-sidebar.html">Man Shoes</a></li>
                                <li><span>09</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shoes-category-area-end -->

    <!-- trending-product-area -->
    <section class="trending-product-area trending-product-two gray-bg pt-95 pb-100">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title title-style-two text-center mb-50">
                        <h3 class="title">Trending Products</h3>
                    </div>
                </div>
            </div>
            <div class="row no-gutters trending-product-grid">
                <div class="col-2">
                    <div class="trending-products-list">
                        <h5>Category</h5>
                        <ul class="nav nav-tabs" id="trendingTab" role="tablist">
                            @php $i=1 @endphp
                            @foreach ($categories as $category)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link @if($i==1) active @endif" id="{{$category->title}}-tab" data-toggle="tab" href="#{{$category->title}}" role="tab" aria-controls="{{$category->title}}" aria-selected="true">{{$category->title}}</a>
                                </li>
                                @php $i++; @endphp
                            @endforeach
                        </ul>
                        <p class="offer"><a href="#">Limited-Time Offer!</a></p>
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content tp-tab-content" id="trendingTabContent">
                        @php $j=1 @endphp
                        @foreach ($categories as $category)
                            <div class="tab-pane @if($j==1) show active @endif" id="{{$category->title}}" role="tabpanel" aria-labelledby="{{$category->title}}-tab">
                                <div class="trending-products-banner banner-animation">
                                    <a href="shop-sidebar.html"><img src="{{Storage::url($category->image)}}" alt="category image"></a>
                                </div>
                                <div class="row trending-product-active">
                                    @foreach ($categoryProducts as $categoryProduct)
                                        @foreach ($categoryProduct as $product)
                                            @if ($category->id == $product->category_id)
                                            <div class="col">
                                                <div class="features-product-item">
                                                    <div class="features-product-thumb">
                                                        @if (isset($product->discount))
                                                            <div class="discount-tag">-{{$product->discount}}%</div>
                                                        @endif
                                                        <a href="{{route('site.productPage',$product->id)}}">
                                                            <img src="{{Storage::url($product->image)}}" alt="product image" style="height: 235px;">
                                                        </a>
                                                        <div class="product-overlay-action">
                                                            <ul>
                                                                <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                                <li><a href="{{route('site.productPage',$product->id)}}"><i class="far fa-eye"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="features-product-content">
                                                        <div class="rating">
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <h5><a href="{{route('site.productPage',$product->id)}}">{{$product->title}}</a></h5>
                                                        @if (isset($product->discount))
                                                        @php
                                                            $finalPrice = round(($product->price) - (($product->price)*($product->discount)/100),2);
                                                        @endphp
                                                            <p class="price" style="text-decoration: line-through; color:red;"><span style="color:#a9a9a9;">${{$product->price}}</span></p>
                                                            <p class="price">${{$finalPrice}}</p>
                                                        @else
                                                            <p class="price">{{$product->price}}</p>
                                                        @endif
                                                        <div class="features-product-bottom">
                                                            <ul>
                                                                <li class="color-option">
                                                                    <span class="gray"></span>
                                                                    <span class="cyan"></span>
                                                                    <span class="orange"></span>
                                                                </li>
                                                                @if (isset($product->discount))
                                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        
                                    @endforeach
                                </div>
                            </div>
                            @php $j++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- trending-product-area-end -->

    <!-- new-arrival-area -->
    <section class="new-arrival-area pt-95 pb-45">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title title-style-two text-center mb-45">
                        <h3 class="title">New Arrival Collection</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="new-arrival-nav mb-35">
                        <button class="active" data-filter="*">Best Sellers</button>
                        <button class="" data-filter=".cat-one">New Products</button>
                        <button class="" data-filter=".cat-two">Sales Products</button>
                    </div>
                </div>
            </div>
            <div class="row new-arrival-active">
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <a href="shop-details.html"><img src="{{asset('site/img/product/shoes_arrival_product01.jpg')}}" alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Athletes Shoes</a></h5>
                            <span class="price">$37.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <div class="discount-tag">- 20%</div>
                            <a href="shop-details.html"><img src="{{asset('site/img/product/shoes_arrival_product02.jpg')}}" alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Mountain Shoes</a></h5>
                            <span class="price">$25.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-one">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <a href="shop-details.html"><img src="{{asset('site/img/product/shoes_arrival_product03.jpg')}}" alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Travelling Shoes</a></h5>
                            <span class="price">$19.50</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <div class="discount-tag new">New</div>
                            <a href="shop-details.html"><img src="{{asset('site/img/product/shoes_arrival_product04.jpg')}}" alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Women Shoes</a></h5>
                            <span class="price">$12.90</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <div class="discount-tag">- 20%</div>
                            <a href="shop-details.html"><img src="{{asset('site/img/product/shoes_arrival_product05.jpg')}}" alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Men Shoes</a></h5>
                            <span class="price">$49.90</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-one">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <div class="discount-tag new">New</div>
                            <a href="shop-details.html"><img src="{{asset('site/img/product/shoes_arrival_product06.jpg')}}" alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Fashion Shoes</a></h5>
                            <span class="price">$31.99</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <a href="shop-details.html"><img src="{{asset('site/img/product/shoes_arrival_product07.jpg')}}" alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">New Shoes</a></h5>
                            <span class="price">$19.99</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <div class="discount-tag">- 45%</div>
                            <a href="shop-details.html"><img src="{{asset('site/img/product/shoes_arrival_product08.jpg')}}" alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Travelling Bags</a></h5>
                            <span class="price">$9.99</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- new-arrival-area-end -->

    <!-- shoes-banner-area -->
    <section class="shoes-banner-area">
        <div class="container">
            <div class="shoes-banner-active">
                <div class="shoes-banner-bg" data-background="{{asset('site/img/bg/shoes-banner_bg.jpg')}}">
                    <div class="row">
                        <div class="col-12">
                            <div class="shoes-banner-content">
                                <h6>Athletes Shoes</h6>
                                <h2>9 Best <span>Shoes for</span> Standing All Day Review 2020</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shoes-banner-bg" data-background="{{asset('site/img/bg/shoes-banner_bg.jpg')}}">
                    <div class="row">
                        <div class="col-12">
                            <div class="shoes-banner-content">
                                <h6>Athletes Shoes</h6>
                                <h2>3 Best <span>Shoes for</span> Standing All Day Review 2021</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shoes-banner-bg" data-background="{{asset('site/img/bg/shoes-banner_bg.jpg')}}">
                    <div class="row">
                        <div class="col-12">
                            <div class="shoes-banner-content">
                                <h6>Athletes Shoes</h6>
                                <h2>8 Best <span>Shoes for</span> Standing All Day Review 2021</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shoes-banner-area-end -->

    <!-- promo-services -->
    <section class="promo-services pt-70 pb-25">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="promo-services-item mb-40">
                        <div class="icon"><img src="{{asset('site/img/icon/promo_icon01.png')}}" alt=""></div>
                        <div class="content">
                            <h6>payment & delivery</h6>
                            <p>Delivered, when you receive arrives</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="promo-services-item mb-40">
                        <div class="icon"><img src="{{asset('site/img/icon/promo_icon02.png')}}" alt=""></div>
                        <div class="content">
                            <h6>Return Product</h6>
                            <p>Retail, a Product Return Process</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="promo-services-item mb-40">
                        <div class="icon"><img src="{{asset('site/img/icon/promo_icon03.png')}}" alt=""></div>
                        <div class="content">
                            <h6>money back guarantee</h6>
                            <p>Options Including 24/7</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="promo-services-item mb-40">
                        <div class="icon"><img src="{{asset('site/img/icon/promo_icon04.png')}}" alt=""></div>
                        <div class="content">
                            <h6>Quality support</h6>
                            <p>Support Options Including 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- promo-services-end -->

    <!-- instagram-post-area -->
    <div class="instagram-post-area">
        <div class="container-fluid p-0 fix">
            <div class="row no-gutters insta-active">
                <div class="col">
                    <div class="insta-post-item">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                            <img src="{{asset('site/img/instagram/s_insta_post01.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="insta-post-item">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                            <img src="{{asset('site/img/instagram/s_insta_post02.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="insta-post-item">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                            <img src="{{asset('site/img/instagram/s_insta_post03.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="insta-post-item">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                            <img src="{{asset('site/img/instagram/s_insta_post04.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="insta-post-item">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                            <img src="{{asset('site/img/instagram/s_insta_post05.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="insta-post-item">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                            <img src="{{asset('site/img/instagram/s_insta_post03.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="insta-post-item">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                            <img src="{{asset('site/img/instagram/s_insta_post04.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- instagram-post-area-end -->

</main>
    
@endsection