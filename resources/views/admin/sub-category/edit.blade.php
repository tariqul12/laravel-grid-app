@extends('admin.maser')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Sub Category Edit</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" method="POST" action="{{route('sub-category.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label"> Category Name</label>
                            <div class="col-md-9">
                              <select name="category_id" class=" form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @selected($category->id == $sub_category->category_id)>{{$category->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" value="{{$sub_category->name}}" placeholder="Sub Category Name" name="name" type="text" />
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$sub_category->id}}">
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                               <textarea name="description" class=" form-control" placeholder="Sub Category Description">{{$sub_category->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input class="form-control" name="image" type="file" />
                                <img src="{{asset($sub_category->image)}}" alt="this is a image" height="100" width="100" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Published Status</label>
                            <div class="col-md-9">
                               <label> <input type="radio" value="1" {{$sub_category->status == 1 ? "checked":''}} name="status" />Published</label>
                               <label> <input type="radio" value="0" {{$sub_category->status == 0 ? "checked":''}} name="status" />UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Edit Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
