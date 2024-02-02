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
                <li class="breadcrumb-item active" aria-current="page">Manage Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Sub Category</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">SL</th>
                                        <th class="wd-15p border-bottom-0">Category Name</th>
                                        <th class="wd-15p border-bottom-0">Sub Category Name</th>
                                        <th class="wd-20p border-bottom-0">Sub category Description</th>
                                        <th class="wd-15p border-bottom-0">Image</th>
                                        <th class="wd-10p border-bottom-0">Status</th>
                                        <th class="wd-25p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sub_categories as $sub_category)  
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sub_category->category->name}}</td>
                                        <td>{{$sub_category->name}}</td>
                                        <td>{{$sub_category->description}}</td>
                                        <td>
                                            <img
                                                src="{{asset($sub_category->image)}}"
                                                class="img-fluid rounded-top"
                                                alt=""
                                                height="50"
                                                width="50"
                                            />
                                            
                                        </td>
                                        <td>{{$sub_category->status}}</td>
                                        <td class="">
                                            <a href="{{route('sub-category.edit',['id'=>$sub_category->id])}}" class=" me-1 btn btn-sm btn-success rounded-0">
                                                <i class=" fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('sub-category.delete',['id'=>$sub_category->id])}}" onclick="return confirm('Are you Sure Delete this !!')" class="btn btn-danger btn-sm rounded-0">
                                                <i class=" fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

    </div>
@endsection
