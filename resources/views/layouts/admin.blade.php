<!DOCTYPE html>
<html>
  @include('admin.partials._head')
    <body>

        <!-- Navigation Bar-->
       @include('admin.partials._nav')
        

        <!-- Page Content -->
        @yield('content')
        


        <!-- Footer -->
       @include('admin.partials._footer')
        


        <!-- scripts  -->
       @include('admin.partials._scripts')

    </body>
</html>