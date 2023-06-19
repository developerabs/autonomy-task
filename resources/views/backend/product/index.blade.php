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
            <form action="{{ route('products.index') }}" method="get">
                <div class="row m-4">
                    <div class="col-sm-3">
                        <input name="name" value="{{ request('name') }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Name...."/>
                    </div>
                    <div class="col-sm-3">
                        <input name="category" value="{{ request('category') }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Category...."/>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
            <div class="sa-example my-5">
                <div class="sa-example__legend">All Products</div>
                <div class="sa-example__body">
                    <table class="table table-striped m-0">
                        <thead>
                            <tr>
                                <th class="w-min" >SL</th>
                                <th class="w-10x">Name</th>
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
                                        <?php echo $product->status == 1 ? '<span class="badge badge-sa-pill badge-sa-success">Active</span>' : '<span class="badge badge-sa-pill badge-sa-warning">Inactive</span>'; ?>
                                    </td>
                                    <td>
                                    {{-- product details button --}}
                                    <a href="{{ route('products.show',$product->id) }}" class="btn btn-info btn-sm" style="float:left">
                                        <svg
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 24 24"
                                            class="octicon octicon-checklist"
                                            aria-hidden="true"
                                        >
                                            <path
                                                d="M3.5 3.75a.25.25 0 01.25-.25h13.5a.25.25 0 01.25.25v10a.75.75 0 001.5 0v-10A1.75 1.75 0 0017.25 2H3.75A1.75 1.75 0 002 3.75v16.5c0 .966.784 1.75 1.75 1.75h7a.75.75 0 000-1.5h-7a.25.25 0 01-.25-.25V3.75z"
                                            ></path>
                                            <path
                                                d="M6.25 7a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm-.75 4.75a.75.75 0 01.75-.75h4.5a.75.75 0 010 1.5h-4.5a.75.75 0 01-.75-.75zm16.28 4.53a.75.75 0 10-1.06-1.06l-4.97 4.97-1.97-1.97a.75.75 0 10-1.06 1.06l2.5 2.5a.75.75 0 001.06 0l5.5-5.5z"
                                            ></path>
                                        </svg>
                                    </a>
                                    {{-- product edit button --}}
                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary btn-sm" style="float:left">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-cast"
                                        >
                                            <path
                                                d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"
                                            ></path>
                                            <line x1="2" y1="20" x2="2.01" y2="20"></line>
                                        </svg>
                                    </a>
                                    {{-- product delete button  --}}
                                    <form action="{{ route('products.destroy',$product->id) }}" method="post" onsubmit="return confirm('Do you want to delete this?')">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm" > 
                                            <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="12"
                                            height="12"
                                            viewBox="0 0 12 12"
                                            fill="currentColor"
                                        >
                                            <path
                                                d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z"
                                            ></path>
                                        </svg>
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="mt-4">{{ $products->links('pagination::bootstrap-4') }}</div>
                </div>
             
              
            </div>
           
        </div>
    </div>
</div>

@endsection