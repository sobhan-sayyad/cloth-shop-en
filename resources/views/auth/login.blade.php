<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Adminto - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">

         <!-- Custom box css -->
        <link href="{{asset('admin/plugins/custombox/dist/custombox.min.css')}}" rel="stylesheet">

        <!-- App css -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{asset('admin/js/modernizr.min.js')}}"></script>

    </head>

    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.html" class="logo"><span>Admin<span>to</span></span></a>
                <h5 class="text-muted mt-0 font-600">Responsive Admin Dashboard</h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold mb-0">Sign In</h4>
                </div>
                @if (Session::has('message'))
                <div class="alert alert-success alertdismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{Session::get('message')}}
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="p-20">
                    <form class="form-horizontal m-t-20" action="{{ route('admin.loginAccount') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" required="" placeholder="Email" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password" name="password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox" name="remember">
                                    <label for="checkbox-signup">Remember me</label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-30 mb-0">
                            <div class="col-sm-12">
                                <a href="#forgotPassword" class="text-muted waves-effect w-md waves-light m-b-5" data-animation="push" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end card-box-->

            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Don't have an account? <a href="{{route('admin.signup')}}" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                </div>
            </div>
            
        </div>
        <!-- end wrapper page -->

        
            {{-- modal forgot password --}}

            <div id="forgotPassword" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="custom-modal-title">Password Recovery</h4>
                <div class="custom-modal-text">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-20">
                                            <form action="{{ route('admin.userPasswordRecovery') }}" method="POST">
                                                <div class="modal-body col-12">
                                                    @csrf
                                                    <input type="email" class="form-control" placeholder="Enter your Email" name='email' required>
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default btn-rounded w-md waves-effect waves-light m-b-5"
                                                            data-dismiss="modal">close</button>
                                                        <button type="submit"
                                                            class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Recovery</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
            
                                </div>
                                <!-- end row -->
            
                            </div> <!-- end card-box -->
                        </div><!-- end col -->
                    </div>
                </div>
            </div><!-- /.modal -->




        <!-- jQuery  -->
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/js/waves.js')}}"></script>
        <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>

        <!-- Modal-Effect -->
        <script src="{{asset('admin/plugins/custombox/dist/custombox.min.js')}}"></script>
        <script src="{{asset('admin/plugins/custombox/dist/legacy.min.js')}}"></script>


        <!-- App js -->
        <script src="{{asset('admin/js/jquery.core.js')}}"></script>
        <script src="{{asset('admin/js/jquery.app.js')}}"></script>
	
	</body>
</html>