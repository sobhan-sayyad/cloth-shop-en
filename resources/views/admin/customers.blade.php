@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div class="container-fluid">
        <br>
        @if (Session::has('deleteMessage'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('deleteMessage') }}
            </div>
        @endif
        <div class="card-box">
            <h4 class="m-t-0 header-title">Products/h4>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($customers as $customer)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <a href="#delete{{$customer->id}}" class="btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5"
                                    data-animation="flip" data-plugin="custommodal" data-overlayspeed="100"
                                    data-overlaycolor="#36404a"><span class="dripicons-trash"></span></a>
                            </td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
            {{ $customers->render() }}
        </div>
    </div>
</div>

@foreach ($customers as $customer)
     <!-- Modal delete-->
    <div id="delete{{$customer->id}}" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Want To Delete {{$customer->first_name}} {{$customer->last_name}}?</h4>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <button type="button" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5" class="close" onclick="Custombox.close();">Close</button>
                                <a href="{{ route('admin.deleteCustomer', $customer->id) }}" class="btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>    
@endforeach
@endsection