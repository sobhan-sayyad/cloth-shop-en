@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div class="container-fluid">
        <br>
        <a href="#add" class="btn btn-block btn-success btn-bordred waves-effect w-md waves-light m-b-5"
            data-animation="push" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">Add
            Coupon</a><br><br>
        @if (Session::has('message'))
            <div class="alert alert-success alertdismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{Session::get('message')}}
            </div>
        @endif
        @if (Session::has('deleteMessage'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('deleteMessage') }}
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
        <div class="card-box">
            <h4 class="m-t-0 header-title">Coupons</h4>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Time</th>
                        <th>Created At</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($coupons as $coupon)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $coupon->title }}</td>
                            <td>{{ $coupon->user_first_name }} {{ $coupon->user_last_name }}</td>
                            <td>{{ $coupon->amount }}</td>
                            <td>{{ $coupon->time }}</td>
                            <td>{{ $coupon->created_at }}</td>
                            <td>
                                <a href="#delete{{$coupon->id}}" class="btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5"
                                    data-animation="flip" data-plugin="custommodal" data-overlayspeed="100"
                                    data-overlaycolor="#36404a"><span class="dripicons-trash"></span></a>
                                <a href="#edit{{$coupon->id}}" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5"
                                    data-animation="door" data-plugin="custommodal" data-overlayspeed="100"
                                    data-overlaycolor="#36404a"><span class="dripicons-pencil"></span></a>
                            </td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
            {{ $coupons->render() }}
        </div>
    </div>
</div>

<!-- Modal add-->
<div id="add" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Add Coupon</h4>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" action="{{ route('admin.addCoupon') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Title</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" placeholder="Title" name="title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">User</label>
                                    <div class="col-10">
                                       <select name="user_id" class="form-control" id="">
                                           @foreach ($customers as $customer)
                                               <option value="{{$customer->id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Amount</label>
                                    <div class="col-10">
                                        <input type="number" class="form-control" placeholder="00" min="0" step="0.5" name="amount" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Time</label>
                                    <div class="col-10">
                                        <input type="datetime-local" class="form-control" name="time" required>
                                    </div>
                                </div><br><br><br>
                                <div class="form-group row">    
                                    <button type="submit" class="btn btn-block btn-success btn-bordred waves-effect w-md waves-light m-b-5"> Submit </button>
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
@foreach ($coupons as $coupon)
    <!-- Modal edit-->
    <div id="edit{{$coupon->id}}" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Edit {{$coupon->title}}</h4>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <form class="form-horizontal" role="form" action="{{ route('admin.editCoupon', $coupon->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Title</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{$coupon->title}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">User</label>
                                        <div class="col-10">
                                           <select name="user_id" class="form-control" id="">
                                               @foreach ($customers as $customer)
                                                   <option value="{{$customer->id}}" @if($customer->id == $coupon->user_id) selected @endif >{{$customer->first_name}} {{$customer->last_name}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Amount</label>
                                        <div class="col-10">
                                            <input type="number" class="form-control" placeholder="00" min="0" step="0.5" name="amount" value="{{$coupon->amount}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Time</label>
                                        <div class="col-10">
                                            <input type="datetime-local" class="form-control" name="time" value="{{$coupon->time}}" required>
                                        </div>
                                    </div><br><br><br>
                                    <div class="form-group row">    
                                        <button type="submit" class="btn btn-block btn-success btn-bordred waves-effect w-md waves-light m-b-5"> Submit </button>
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
    <!-- Modal delete-->
    <div id="delete{{$coupon->id}}" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Want To Delete {{$coupon->title}}?</h4>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <button type="button" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5" class="close" onclick="Custombox.close();">Close</button>
                                <a href="{{ route('admin.deleteCoupon', $coupon->id) }}" class="btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endforeach
@endsection