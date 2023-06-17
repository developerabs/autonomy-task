@extends('backend.layouts.app')

@section('content')

<div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
    <div class="container">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <nav class="mb-2" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-sa-simple">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Products</li>
                        </ol>
                    </nav>
                    <h1 class="h3 m-0">All Products</h1>
                </div>
                <div class="col-auto d-flex"><a href="{{ route('products.create') }}" class="btn btn-primary">New Products</a></div>
            </div>
        </div>
        <div class="card"> 
            {{-- <form action="{{ route('categories.index') }}" method="get"><input name="search" value="{{ $search }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Search...."/></form> --}}
            <div class="sa-example my-5">
                <div class="sa-example__legend">All Products</div>
                <div class="sa-example__body">
                    <table class="table table-striped m-0">
                        <thead>
                            <tr>
                                <th class="w-min" >SL</th>
                                <th class="min-w-10x">Name</th>
                                <th>Categories</th>
                                <th>Unit Price</th>
                                <th>Stock</th> 
                                <th>Status</th>  
                                <th>Action</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product)
                                <tr>
                                    <td>{{ $products->firstItem() + $index }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @foreach ($product->categories as $category)
                                            <p>{{ $category->cat_name }}</p>
                                        @endforeach
                                    </td>
                                    <td>{{ $product->unit_price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        @if ($product->status == 1)
                                        <span class="badge badge-sa-pill badge-sa-success">Active</span>
                                        @else
                                        <span class="badge badge-sa-pill badge-sa-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td>a</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    {{-- <div class="mt-4">{{ $categories->links('pagination::bootstrap-4') }}</div> --}}
                </div>
             
              
            </div>
           
        </div>
    </div>
</div>

@endsection