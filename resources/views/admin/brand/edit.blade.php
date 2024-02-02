@extends('admin.maser')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Brand Edit</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" method="POST" action="{{route('brand.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" value="{{$brand->name}}" placeholder="Brand Name" name="name" type="text" />
                                <input type="hidden" name="id" value="{{$brand->id}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Brand Description</label>
                            <div class="col-md-9">
                               <textarea name="description"  class=" form-control" placeholder="Brand Description">{{$brand->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input class="form-control" name="image" type="file" />
                                <img
                                    src="{{asset($brand->image)}}"
                                    class="img-fluid rounded-top"
                                    alt="This is image"
                                    height="100"
                                    width="100"
                                />
                                
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Published Status</label>
                            <div class="col-md-9">
                               <label> <input type="radio" {{$brand->status == 1 ? 'checked':''}} value="1" name="status" />Published</label>
                               <label> <input type="radio" {{$brand->status == 0 ? 'checked':''}} value="0" name="status" />UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create Brand</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
