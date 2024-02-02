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
                <li class="breadcrumb-item active" aria-current="page">Manage Brand</li>
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
                        <h3 class="card-title">Brand Module</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">SL</th>
                                        <th class="wd-15p border-bottom-0">Brand Name</th>
                                        <th class="wd-20p border-bottom-0">Brand Description</th>
                                        <th class="wd-15p border-bottom-0">Image</th>
                                        <th class="wd-10p border-bottom-0">Status</th>
                                        <th class="wd-25p border-bottom-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)  
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td>{{$brand->description}}</td>
                                        <td>
                                            <img
                                                src="{{asset($brand->image)}}"
                                                class="img-fluid rounded-top"
                                                alt=""
                                                height="50"
                                                width="50"
                                            />
                                            
                                        </td>
                                        <td>{{$brand->status}}</td>
                                        <td class=" d-flex">
                                            <a href="{{route('brand.edit',['id'=>$brand->id])}}" class=" me-1 btn btn-sm btn-success rounded-0">
                                                <i class=" fa fa-edit"></i>
                                            </a>
                                           <form action="{{route('brand.delete')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$brand->id}}">
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
