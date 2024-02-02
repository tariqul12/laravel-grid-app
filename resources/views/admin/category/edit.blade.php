@extends('admin.maser')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Category Edit</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" method="POST" action="{{route('category.update',['id'=>$category->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" value="{{$category->name}}" placeholder="Category Name" name="name" type="text" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                               <textarea name="description" class=" form-control" placeholder="Category Description">{{$category->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input class="form-control" name="image" type="file" />
                                <img src="{{asset($category->image)}}" alt="this is a image" height="100" width="100" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Published Status</label>
                            <div class="col-md-9">
                               <label> <input type="radio" value="1" {{$category->status == 1 ? "checked":''}} name="status" />Published</label>
                               <label> <input type="radio" value="0" {{$category->status == 0 ? "checked":''}} name="status" />UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
