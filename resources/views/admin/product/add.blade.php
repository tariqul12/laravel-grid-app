@extends('admin.maser')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">PRoduct</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add  Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Product</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" method="POST" action="{{route('sub-category.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label"> Category Name</label>
                            <div class="col-md-9">
                              <select name="sub_category_id" class=" form-control">
                                <option value="">--Select Category--</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                              <select name="category_id" class=" form-control">
                                <option value="">--Select Sub Category--</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                              <select name="Brand_id" class=" form-control">
                                <option value="">--Select BRand--</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">unit Name</label>
                            <div class="col-md-9">
                              <select name="category_id" class=" form-control">
                                <option value="">--Select Unit name--</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" placeholder="Product Name" name="name" type="text" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product code</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" placeholder="Product code" name="code" type="text" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                               <textarea name="short_description" class=" form-control" placeholder="Short Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                               <textarea name="long_description" class=" form-control" placeholder="Long Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                               <div class=" input-group">
                                <input class="form-control" id="" placeholder="Regular Price" name="regular_price" type="number" />
                                <input class="form-control" id="" placeholder="Selling Price" name="selling_price" type="number" />
                               </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Stock Amount</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" placeholder="Stock Amount" name="stock_amount" type="text" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9">
                                <input class="form-control" name="image" type="file" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Product Other Image</label>
                            <div class="col-md-9">
                                <input class="form-control" name="other_image" type="file" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Published Status</label>
                            <div class="col-md-9">
                               <label> <input type="radio" value="1" checked name="status" />Published</label>
                               <label> <input type="radio" value="0" name="status" />UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Sub Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
