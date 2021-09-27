<div id="sticky-header" class="main-header transparent-header menu-area">
    <div class="container custom-container-two">
        <div class="row">
            <div class="col-12">
                <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                <div class="menu-wrap">
                    <nav class="menu-nav show">
                        <div class="logo">
                            <a href="index.html" class="main-logo"><img src="{{asset('site/img/logo/fw_logo.png')}}" alt="Logo"></a>
                            <a href="index.html" class="sticky-logo"><img src="{{asset('site/img/logo/logo.png')}}" alt="Logo"></a>
                        </div>
                        <div class="navbar-wrap main-menu d-none d-lg-flex">
                            <ul class="navigation">
                                <li class="active menu-item-has-children has--mega--menu">
                                    <a href="{{route('site.index')}}">Home</a>
                                </li>
                                <li class="has--mega--menu"><a href="{{route('site.shop')}}">Shop</a>
                                    <ul class="mega-menu">
                                        <li class="mega-menu-wrap">
                                            <ul class="mega-menu-col">
                                                <li class="mega-title"><a href="shop.html">SHOP PAGES</a></li>
                                                <li><a href="shop-sidebar.html">Right Sidebar</a></li>
                                                <li><a href="shop-sidebar.html">Left Sidebar</a></li>
                                                <li><a href="shop.html">Hidden sidebar</a></li>
                                                <li><a href="shop.html">Filters area</a></li>
                                                <li><a href="shop-details.html">Shop Details</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="checkout.html">Checkout Page</a></li>
                                            </ul>
                                            <ul class="mega-menu-col">
                                                <li class="mega-title"><a href="#">FEATURES</a></li>
                                                <li><a href="shop-sidebar.html">Variable Product</a></li>
                                                <li><a href="shop-sidebar.html">External Product</a></li>
                                                <li><a href="shop-sidebar.html">Other Shop Pages</a></li>
                                                <li><a href="shop-sidebar.html">Categories</a></li>
                                                <li><a href="shop-sidebar.html">Collection</a></li>
                                                <li><a href="shop-sidebar.html">LookBook</a></li>
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                            </ul>
                                            <ul class="mega-menu-col sub-cat-post">
                                                <li>
                                                    <a href="shop-sidebar.html">
                                                        <img src="{{asset('site/img/product/sub_menu_img01.jpg')}}" alt="">
                                                        <span class="btn">Man Shop</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="mega-menu-col sub-cat-post">
                                                <li>
                                                    <a href="shop-sidebar.html">
                                                        <img src="{{asset('site/img/product/sub_menu_img02.jpg')}}" alt="">
                                                        <span class="btn">Women’s Shop</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li class="menu-item-has-children"><a href="#">blog</a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="header-action d-none d-md-block">
                            <ul>
                                <li class="header-search"><a href="#" data-toggle="modal" data-target="#search-modal"><i class="flaticon-search"></i></a></li>
                                <li class="header-shop-cart"><a href="{{route('site.cart')}}"><i class="flaticon-shopping-bag"></i><span>0</span></a>
                                    <ul class="minicart">
                                        @if(session('cart'))
                                            @php
                                                $totalPrice = 0
                                            @endphp
                                            @foreach(session('cart') as $id => $details)
                                                <li class="d-flex align-items-start">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="{{Storage::url($details['image'])}}" alt=""></a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h4><a href="#">{{$details['title']}}</a></h4>
                                                        <p style="margin-bottom: 5px;">Qty: {{$details['quantity']}}</p>
                                                        @if (isset($details['discount']))
                                                            <p style="color: red; margin-bottom: 5px;">-{{$details['discount']}}%</p>
                                                        @endif
                                                        <div class="cart-price">
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
                                                        </div>
                                                    </div>
                                                    <div class="del-icon">
                                                        <a href="{{route('site.addOneToCart',$id)}}"><i class="far fa-plus-square"></i></a>
                                                        <a href="{{route('site.subtractOneFromCart',$id)}}"><i class="far fa-minus-square"></i></a>
                                                        <a href="{{route('site.removeFromCart',$id)}}"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <li>
                                                <div class="total-price">
                                                    <span class="f-left">Total:</span>
                                                    <span class="f-right">${{$totalPrice}}</span>
                                                </div>
                                            </li>
                                        @endif
                                        <li>
                                            <div class="checkout-link">
                                                <a href="{{route('site.cart')}}">Shopping Cart</a>
                                                <a class="black-color" href="#">Checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @if (isset($logedUser->id))
                                    @if ($logedUser->type == 'user')
                                        <li class="header-profile"><a href="{{route('site.userProfile',$logedUser)}}"><i class="flaticon-user-profile"></i></a></li>
                                    @endif
                                    @if ($logedUser->type == 'admin')
                                        <li class="header-profile"><a href="{{route('admin.dashboard')}}"><i class="flaticon-user-profile"></i></a></li>
                                    @endif
                                @else
                                <li class="header-profile"><a href="{{route('admin.signup')}}"><i class="flaticon-user-profile"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Mobile Menu  -->
                <div class="mobile-menu">
                    <div class="close-btn"><i class="flaticon-targeting-cross"></i></div>
                    <nav class="menu-box">
                        <div class="nav-logo"><a href="index.html"><img src="{{asset('site/img/logo/logo.png')}}" alt="" title=""></a>
                        </div>
                        <div class="menu-outer">
                            <ul class="navigation">
                                <li class="active menu-item-has-children">
                                    <a href="{{route('site.index')}}">Home</a>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Shop</a>
                                    <ul class="submenu">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                        <li><a href="shop-details.html">Shop Details</a></li>
                                        <li><a href="cart.html">Cart Page</a></li>
                                        <li><a href="cart.html">Checkout Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li class="menu-item-has-children"><a href="#">blog</a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="social-links">
                            <ul class="clearfix">
                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="menu-backdrop"></div>
                <!-- End Mobile Menu -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Search -->
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('site.search')}}" method="GET">
                <input type="text" placeholder="Search here..." name="subject" required>
                <button type="submit"><i class="flaticon-search"></i></button>
            </form>
        </div>
    </div>
</div>
<!-- Modal Search-end -->

<!-- off-canvas-start -->
<div class="sidebar-toggle-btn"><a href="#" class="navSidebar-button"><img src="{{asset('site/img/icon/sidebar_toggle_icon.png')}}" alt=""></a></div>
<div class="sidebar-off-canvas info-group">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-widget scroll">
        <div class="sidebar-widget-container">
            <div class="off-canvas-heading">
                <a href="#" class="close-side-widget">
                    <span class="flaticon-targeting-cross"></span>
                </a>
            </div>
            <div class="sidebar-textwidget">
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo mb-30">
                            <a href="index.html"><img src="{{asset('site/img/logo/logo.png')}}" alt=""></a>
                        </div>
                        <div class="content-box">
                            <p>WooCommerce and WordPress are both free, open source software reasons many ...</p>
                        </div>
                        <div class="contact-info">
                            <h4 class="title">CONTACT US</h4>
                            <ul>
                                <li><span class="flaticon-phone-call"></span><a href="tel:123456789">+9 325 444 0000</a></li>
                                <li><span class="flaticon-email"></span><a href="mailto:adara@info.com">adara@info.com</a></li>
                                <li><span class="flaticon-place"></span>71 Park Lan Street 2355 NY</li>
                            </ul>
                        </div>
                        <div class="oc-newsletter">
                            <h4 class="title">NEWSLETTER</h4>
                            <p>Fill your email below to subscribe to my newsletter</p>
                            <form action="#">
                                <input type="email" placeholder="Email...">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                        <div class="oc-social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                            </ul>
                        </div>
                        <div class="oc-bottom">
                            <div class="currency">
                                <form action="#">
                                    <label>Currency</label>
                                    <select name="select">
                                        <option value="">USD</option>
                                        <option value="">AUE</option>
                                        <option value="">SAR</option>
                                        <option value="">INR</option>
                                        <option value="">BDT</option>
                                    </select>
                                </form>
                            </div>
                            <div class="language">
                                <form action="#">
                                    <label>Language</label>
                                    <select name="select">
                                        <option value="">English</option>
                                        <option value="">Spanish</option>
                                        <option value="">Turkish</option>
                                        <option value="">Russian</option>
                                        <option value="">Chinese</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- off-canvas-end -->