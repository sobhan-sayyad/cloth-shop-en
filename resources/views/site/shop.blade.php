@extends('layouts.site')
@section('content')
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('site/img/bg/breadcrumb_bg01.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2>Shop Sidebar</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- shop-area -->
        <section class="shop-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="shop-top-meta mb-35">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="shop-top-left">
                                        <ul>
                                            <li><a href="#"><i class="flaticon-menu"></i> FILTER</a></li>
                                            <li>Showing 1–9 of 80 results</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="shop-top-right">
                                        <form action="#">
                                            <select name="select">
                                                <option value="">Sort by newness</option>
                                                <option>Free Shipping</option>
                                                <option>Best Match</option>
                                                <option>Newest Item</option>
                                                <option>Size A - Z</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-xl-4 col-sm-6">
                                <div class="new-arrival-item text-center mb-50">
                                    <div class="thumb mb-25">
                                        @if (isset($product->discount))
                                        <div class="discount-tag">-{{$product->discount}}%</div>
                                        @endif
                                        <a href="{{ route('site.productPage', $product->id) }}"><img style="height: 344px; width: 296px" src="{{Storage::url($product->image)}}"
                                                alt=""></a>
                                        <div class="product-overlay-action">
                                            <ul>
                                                <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                <li><a href="{{ route('site.productPage', $product->id) }}"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{ route('site.productPage', $product->id) }}">{{ $product->title }}</a></h5>
                                        @if (isset($product->discount))
                                            @php
                                                $finalPrice = round(($product->price) - (($product->price)*($product->discount)/100),2);
                                            @endphp
                                            <div class="price" style="text-decoration: line-through; color:red;"><span style="color:#a9a9a9;">${{$product->price}}</span></div>
                                            <p class="price">${{$finalPrice}}</p>
                                        @else
                                            <p class="price">{{$product->price}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $products->render() }}
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <aside class="shop-sidebar">
                            <div class="widget side-search-bar">
                                <form action="#">
                                    <input type="text">
                                    <button><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Product Categories</h4>
                                <div class="shop-cat-list">
                                    <ul>
                                        @foreach ($categories as $category)
                                        <li><a href="#">{{ $category->title }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Price Filter</h4>
                                <div class="price_filter">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <span>Price :</span>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Product Brand</h4>
                                <div class="shop-cat-list">
                                    <ul>
                                        <li><a href="#">For Men</a></li>
                                        <li><a href="#">For Women</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget has-border">
                                <div class="sidebar-product-size mb-30">
                                    <h4 class="widget-title">Product Size</h4>
                                    <div class="shop-size-list">
                                        <ul>
                                            <li><a href="#">S</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">XL</a></li>
                                            <li><a href="#">XXL</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar-product-color">
                                    <h4 class="widget-title">Color</h4>
                                    <div class="shop-color-list">
                                        <ul>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Top Items</h4>
                                <div class="sidebar-product-list">
                                    <ul>
                                        <li>
                                            <div class="sidebar-product-thumb">
                                                <a href="#"><img src="{{asset('site/img/product/sidebar_product01.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="sidebar-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h5><a href="#">Woman T-shirt</a></h5>
                                                <span>$ 39.00</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-product-thumb">
                                                <a href="#"><img src="{{asset('site/img/product/sidebar_product02.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="sidebar-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h5><a href="#">Slim Fit Cotton</a></h5>
                                                <span>$ 39.00</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-product-thumb">
                                                <a href="#"><img src="{{asset('site/img/product/sidebar_product03.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="sidebar-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h5><a href="#">Fashion T-shirt</a></h5>
                                                <span>$ 39.00</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-area-end -->

    </main>
@endsection
