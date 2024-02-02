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
                <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
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
                        <h3 class="card-title">Basic Datatable</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">SL</th>
                                        <th class="wd-15p border-bottom-0">Category Name</th>
                                        <th class="wd-20p border-bottom-0">category Description</th>
                                        <th class="wd-15p border-bottom-0">Image</th>
                                        <th class="wd-10p border-bottom-0">Status</th>
                                        <th class="wd-25p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)  
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>
                                            <img
                                                src="{{asset($category->image)}}"
                                                class="img-fluid rounded-top"
                                                alt=""
                                                height="50"
                                                width="50"
                                            />
                                            
                                        </td>
                                        <td>{{$category->status}}</td>
                                        <td class=" d-flex">
                                            <a href="{{route('category.edit',['id'=>$category->id])}}" class=" me-1 btn btn-sm btn-success rounded-0">
                                                <i class=" fa fa-edit"></i>
                                            </a>
                                           <form action="{{route('category.delete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$category->id}}">
                                            <button onclick="return confirm('Are you sure delete this !!')" class="btn btn-danger btn-sm rounded-0">
                                                <i class=" fa fa-trash"></i>
                                            </button>
                                           </form>
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
