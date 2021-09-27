@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <br>
            <a href="#add" class="btn btn-block btn-success btn-bordred waves-effect w-md waves-light m-b-5"
                data-animation="push" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">Add
                Category</a><br><br>
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
                <h4 class="m-t-0 header-title">Categories</h4>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td><img src="{{ Storage::url($category->image) }}" alt="Category Image"
                                        style="max-width: 100px;"></td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <a href="#delete{{$category->id}}" class="btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5"
                                        data-animation="flip" data-plugin="custommodal" data-overlayspeed="100"
                                        data-overlaycolor="#36404a"><span class="dripicons-trash"></span></a>
                                    <a href="#edit{{$category->id}}" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5"
                                        data-animation="door" data-plugin="custommodal" data-overlayspeed="100"
                                        data-overlaycolor="#36404a"><span class="dripicons-pencil"></span></a>
                                </td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->render() }}
            </div>
        </div>
    </div>

    <!-- Modal add-->
    <div id="add" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Add Category</h4>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-20">
                                <form class="form-horizontal" role="form" action="{{ route('admin.addCategory') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                <h4 class="header-title m-t-0 m-b-30">Image</h4>
                                                <div class="dropify-wrapper" style="height: 314px;">
                                                    <input type="file" class="dropify" data-height="300" name="image" required>
                                                    <button type="button" class="dropify-clear">Remove</button>
                                                    <div class="dropify-preview">
                                                        <span class="dropify-render"></span>
                                                        <div class="dropify-infos">
                                                            <div class="dropify-infos-inner">
                                                                <p class="dropify-filename">
                                                                    <span class="file-icon"></span> <span class="dropify-filename-inner"></span>
                                                                </p>
                                                                <p class="dropify-infos-message">Drag and drop or click to replace</p>
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
                                            <input type="text" class="form-control" placeholder="Title" name="title"
                                                required>
                                        </div><br><br><br>
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
    @foreach ($categories as $category)
        <!-- Modal edit-->
        <div id="edit{{$category->id}}" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Edit {{$category->title}}</h4>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20">
                                    <form class="form-horizontal" role="form" action="{{ route('admin.editCategory', $category->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="header-title m-t-0 m-b-30">Image</h4>
                                                    <div class="dropify-wrapper has-preview">
                                                        <div class="dropify-message"><span class="file-icon"></span>
                                                            <p>Drag and drop a file here or click</p>
                                                            <p class="dropify-error">Ooops, something wrong appended.</p>
                                                        </div>
                                                        <div class="dropify-loader" style="display: none;"></div>
                                                        <div class="dropify-errors-container">
                                                            <ul></ul>
                                                        </div><input type="file" class="dropify" name="image" data-default-file="{{Storage::url($category->image)}}"><button type="button"
                                                            class="dropify-clear">Remove</button>
                                                        <div class="dropify-preview" style="display: block;"><span class="dropify-render"><img
                                                                    src="{{Storage::url($category->image)}}"></span>
                                                            <div class="dropify-infos">
                                                                <div class="dropify-infos-inner">
                                                                    <p class="dropify-filename"><span class="file-icon"></span> <span
                                                                            class="dropify-filename-inner">1.jpg</span></p>
                                                                    <p class="dropify-infos-message">Drag and drop or click to replace</p>
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
                                                <input type="text" class="form-control" placeholder="Title" name="title" value="{{$category->title}}"
                                                    required>
                                            </div><br><br><br>
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
        <div id="delete{{$category->id}}" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Want To Delete {{$category->title}}?</h4>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20">
                                    <button type="button" class="btn btn-warning btn-bordred waves-effect w-md waves-light m-b-5" class="close" onclick="Custombox.close();">Close</button>
                                    <a href="{{ route('admin.deleteCategory', $category->id) }}" class="btn btn-danger btn-bordred waves-effect w-md waves-light m-b-5">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    @endforeach

@endsection
