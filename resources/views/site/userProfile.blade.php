@extends('layouts.site')
@section('content')
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="img/bg/breadcrumb_bg04.jpg" style="background-image: url(&quot;img/bg/breadcrumb_bg04.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Wellcome {{$logedUser->first_name}} {{$logedUser->last_name}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('site.index')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- profile area -->
    <section class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-wrap">
                        <div class="section-title title-style-three mb-30">
                            @if (Session::has('message'))
                                <div class="alert alert-success alert-dismissable alert-display">
                                    {{ Session::get('message') }}
                                    <button type="button" class="btn-dismiss" data-dismiss="alert" aria-hidden="true">×</button>
                                </div>
                            @endif
                            @if (Session::has('successMessage'))
                                <div class="alert alert-success alert-dismissable alert-display">
                                    {{ Session::get('successMessage') }}
                                    <button type="button" class="btn-dismiss" data-dismiss="alert" aria-hidden="true">×</button>
                                </div>
                            @endif
                            @if (Session::has('errorMessage'))
                                <div class="alert alert-danger alert-dismissable alert-display">
                                    {{ Session::get('errorMessage') }}
                                    <button type="button" class="btn-dismiss" data-dismiss="alert" aria-hidden="true">×</button>
                                </div>
                            @endif
                            <span class="sub-title">Profile Informations</span>
                            <h3 class="title">{{$logedUser->email}}</h3>
                        </div>
                        <form action="{{ route('site.userProfileEdit',$logedUser) }}" class="contact-form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Your First Name" value="{{$logedUser->first_name}}" name="first_name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Your Last Name" value="{{$logedUser->last_name}}" name="last_name" required>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn btn-success" type="submit">Update Profile</button>
                                <a href="#" class="btn btn-danger" data-toggle="modal"
                                data-target="#changePassword">Change Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile area end -->
</main>


{{-- modal change password --}}

<div id="changePassword" class="modal modal-open modal-password" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" style="font-size: 60px;"><span>×</span></button>
    

    <form class="contact-form form-password" role="form" action="{{ route('site.userPasswordEdit',$logedUser) }}"
        method="POST">
        <h4 class="custom-modal-title">Change Password</h4>
        @csrf
        <div class="form-input">
            <input type="password" class="form-control" placeholder="Current Password" name="old_password" required>
        </div>
        <div class="form-input">
            <input type="password" class="form-control" placeholder="New Password" name="password" required>
        </div>
        <div class="form-input">
            <input type="password" class="form-control" placeholder="New Password Confirmation" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
                        
</div>
@endsection