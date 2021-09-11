<!doctype html>
<html class="no-js" lang="">
    @include('site.partials._head')
    <body>


        <!-- preloader  -->
       @include('site.partials._preloader')
        <!-- preloader end -->


		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        
            @if (Route::currentRouteName() == 'site.index')
                <header class="header-style-two">
                @include('site.partials._indexNav') 
                </header>
            @else
                <header class="header-style-three">
                @include('site.partials._nav')
                </header>
            @endif
        
        <!-- header-area-end -->

        <!-- main-area -->
        @yield('content')
        
        <!-- main-area-end -->


        <!-- footer-area -->
        @include('site.partials._footer')
        <!-- footer-area-end -->





		<!-- JS here -->
        @include('site.partials._scripts')
    </body>
</html>
