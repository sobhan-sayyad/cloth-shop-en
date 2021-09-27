@extends('layouts.site')
@section('content')
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('site/img/bg/breadcrumb_bg03.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Cart Page</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- cart-area -->
    @if(session('cart'))
    <div class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-wrapper">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">QUANTITY</th>
                                        <th class="product-subtotal">SUBTOTAL</th>
                                        <th class="product-delete"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $totalPrice = 0
                                @endphp
                                @foreach(session('cart') as $id => $details)
                                    <tr>
                                        <td class="product-thumbnail"><a href="shop-details.html"><img src="{{Storage::url($details['image'])}}" alt=""></a></td>
                                        <td class="product-name">
                                            <h4><a href="shop-details.html">{{$details['title']}}</a></h4>
                                        </td>
                                        <td class="product-price">
                                        @if (isset($details['discount']))
                                            @php
                                                $discountPrice = round($details['price'] - ($details['price'] * $details['discount']/100),2)
                                            @endphp
                                            <span>Cost: <del>${{$details['price']}}</del></span><br>
                                            <span class="new">${{$discountPrice}}</span>
                                        @else
                                            <span class="new">Cost: ${{$details['price']}}</span>
                                        @endif
                                        </td>
                                        <td class="product-quantity">
                                                    <p style="border: 2px solid black; border-radius:4px; padding: none;">{{$details['quantity']}}</p>
                                        </td>
                                        <td class="product-subtotal">
                                            @php
                                                $multiPrice = $details['price'] * $details['quantity']
                                            @endphp
                                            @if (isset($details['discount']))
                                                @php
                                                    $discountPrice = round($multiPrice - ($multiPrice * $details['discount']/100),2)
                                                @endphp
                                                <span class="new">Cost: ${{$discountPrice}}</span>
                                                <span><del>${{$multiPrice}}</del></span> 
                                                @php
                                                    $totalPrice += $discountPrice
                                                @endphp
                                            @else
                                                <span class="new">Cost: ${{$multiPrice}}</span>
                                                @php
                                                    $totalPrice += $multiPrice
                                                @endphp
                                            @endif
                                        </td>
                                        <td class="product-delete">
                                            <a href="{{route('site.addOneToCart',$id)}}" style="margin: 5px;"><i class="far fa-plus-square"></i></a>
                                            <a href="{{route('site.subtractOneFromCart',$id)}}" style="margin: 5px;"><i class="far fa-minus-square"></i></a>
                                            <a href="{{route('site.removeFromCart',$id)}}" style="margin: 5px;"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="shop-cart-bottom mt-20">
                            <div class="cart-coupon">
                                <form action="#">
                                    <input type="text" placeholder="Enter Coupon Code...">
                                    <button class="btn">Apply Coupon</button>
                                </form>
                            </div>
                            <div class="continue-shopping">
                                <a href="shop.html" class="btn">update shopping</a>
                            </div>
                        </div>
                    </div>
                    <div class="cart-total pt-95">
                        <h3 class="title">CART TOTALS</h3>
                        <div class="shop-cart-widget">
                            <form action="#">
                                <ul>
                                    <li class="sub-total"><span>SUBTOTAL</span> $ {{$totalPrice}}</li>
                                    <li>
                                        <span>SHIPPING</span>
                                        <div class="shop-check-wrap">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">FLAT RATE: $15</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">FREE SHIPPING</label>
                                            </div>
                                            <a href="#" class="calculate">Calculate shipping</a>
                                        </div>
                                    </li>
                                    <li class="cart-total-amount"><span>TOTAL</span> <span class="amount">$ {{$totalPrice}}</span></li>
                                </ul>
                                <a href="checkout.html" class="btn">PROCEED TO CHECKOUT</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="cart-area pt-100 pb-100">
        <h2 style="color: red; text-align:center;">Your cart is empty</h2>
    </div>
    @endif
    <!-- cart-area-end -->

</main>
@endsection