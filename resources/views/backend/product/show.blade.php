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
            <div class="sa-example my-5">
                <div class="sa-example__legend">All Products</div>
                <div class="sa-example__body">
                
                    de
                </div>
             
              
            </div>
           
        </div>
    </div>
</div>

@endsection