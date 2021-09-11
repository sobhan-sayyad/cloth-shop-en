@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div class="container-fluid">
        <br>
        <a href="#add" class="btn btn-block btn-success btn-bordred waves-effect w-md waves-light m-b-5"
            data-animation="push" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">Add
            Product</a><br><br>
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
            <h4 class="m-t-0 header-title">Products</h4>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product Code</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Category</th>
                        <th>type</th>
                        <th>Created At</th>
                        <th>Modify</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td><img src="{{ Storage::url($product->image) }}" alt="product Image"
                                    style="max-width: 100px;"></td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount }}@if(!isset($product->discount)) 0 @endif %</td>
                            <td>{{ $product->category_title }}</td>
                            <td>{{ $product->type }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <a href="#delete{{$product->id}}" class="btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5"
                                    data-animation="flip" data-plugin="custommodal" data-overlayspeed="100"
                                    data-overlaycolor="#36404a"><span class="dripicons-trash"></span></a>
                                <a href="#edit{{$product->id}}" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5"
                                    data-animation="door" data-plugin="custommodal" data-overlayspeed="100"
                                    data-overlaycolor="#36404a"><span class="dripicons-pencil"></span></a>
                            </td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>
            {{ $products->render() }}
        </div>
    </div>
</div>

<!-- Modal add-->
<div id="add" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Add Product</h4>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" action="{{ route('admin.addProduct') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box">

                                            <h4 class="header-title m-t-0 m-b-30">Image</h4>

                                            <div class="dropify-wrapper" style="height: 314px;">
                                                <div class="dropify-message"><span class="file-icon"></span>
                                                    <p>Drag and drop a file here or click</p>
                                                    <p class="dropify-error">Ooops, something wrong appended.</p>
                                                </div>
                                                <div class="dropify-loader"></div>
                                                <div class="dropify-errors-container">
                                                    <ul></ul>
                                                </div><input type="file" class="dropify" data-height="300" name="image"
                                                    required><button type="button" class="dropify-clear">Remove</button>
                                                <div class="dropify-preview"><span class="dropify-render"></span>
                                                    <div class="dropify-infos">
                                                        <div class="dropify-infos-inner">
                                                            <p class="dropify-filename"><span class="file-icon"></span>
                                                                <span class="dropify-filename-inner"></span>
                                                            </p>
                                                            <p class="dropify-infos-message">Drag and drop or click to
                                                                replace</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Title</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" placeholder="Title" name="title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Product Code</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" placeholder="Product Code" name="product_code"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Price</label>
                                    <div class="col-10">
                                        <input type="number" class="form-control" placeholder="00.00" min="0" step="0.01" name="price" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Discount</label>
                                    <div class="col-10">
                                        <input type="number" class="form-control" placeholder="00%" min="0" max="100" step="0.5" name="discount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Category</label>
                                    <div class="col-10">
                                       <select name="category_id" class="form-control" id="">
                                           @foreach ($categories as $category)
                                               <option value="{{$category->id}}">{{$category->title}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-2 col-form-label">Type</label>
                                    <div class="col-10">
                                        <select name="type" class="form-control" id="">
                                            <option value="Men">For Men</option>
                                            <option value="Women">For women</option>
                                        </select>
                                    </div>
                                </div><br><br><br>
                                <div class="form-group row">    
                                    <button type="submit"
                                        class="btn btn-block btn-success btn-bordred waves-effect w-md waves-light m-b-5">Submit</button>
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
@foreach ($products as $product)
    <!-- Modal edit-->
    <div id="edit{{$product->id}}" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Edit {{$product->title}}</h4>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <form class="form-horizontal" role="form" action="{{ route('admin.editProduct', $product->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
    
                                                <h4 class="header-title m-t-0 m-b-30">Image</h4>
    
                                                <div class="dropify-wrapper" style="height: 314px;">
                                                    <div class="dropify-message"><span class="file-icon"></span>
                                                        <p>Drag and drop a file here or click</p>
                                                        <p class="dropify-error">Ooops, something wrong appended.</p>
                                                    </div>
                                                    <div class="dropify-loader"></div>
                                                    <div class="dropify-errors-container">
                                                        <ul></ul>
                                                    </div><input type="file" class="dropify" data-height="300" name="image"
                                                        data-default-file="{{Storage::url($product->image)}}"><button type="button" class="dropify-clear">Remove</button>
                                                    <div class="dropify-preview"><span class="dropify-render"></span>
                                                        <div class="dropify-infos">
                                                            <div class="dropify-infos-inner">
                                                                <p class="dropify-filename"><span class="file-icon"></span>
                                                                    <span class="dropify-filename-inner"></span>
                                                                </p>
                                                                <p class="dropify-infos-message">Drag and drop or click to
                                                                    replace</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Title</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{$product->title}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Product Code</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" placeholder="Product Code" name="product_code" value="{{$product->product_code}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Price</label>
                                        <div class="col-10">
                                            <input type="number" class="form-control" placeholder="00.00" min="0" step="0.01" name="price" value="{{$product->price}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Discount</label>
                                        <div class="col-10">
                                            <input type="number" class="form-control" placeholder="00%" min="0" max="100" step="0.5" name="discount" @if(isset($product->discount)) value= "{{$product->discount}}" @endif >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Category</label>
                                        <div class="col-10">
                                           <select name="category_id" class="form-control" id="">
                                               @foreach ($categories as $category)
                                                   <option value="{{$category->id}}" @if ($category->id == $product->category_id) selected @endif>{{$category->title}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label">Type</label>
                                        <div class="col-10">
                                            <select name="type" class="form-control" id="">
                                                <option value="Men" @if ($product->type == 'Men') selected @endif>For Men</option>
                                                <option value="Women" @if ($product->type == 'Women') selected @endif>For women</option>
                                            </select>
                                        </div>
                                    </div><br><br><br>
                                    <div class="form-group row">    
                                        <button type="submit"
                                            class="btn btn-block btn-success btn-bordred waves-effect w-md waves-light m-b-5">Submit</button>
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
    <div id="delete{{$product->id}}" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Want To Delete {{$product->title}}?</h4>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <button type="button" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5" class="close" onclick="Custombox.close();">Close</button>
                                <a href="{{ route('admin.deleteProduct', $product->id) }}" class="btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endforeach

@endsection