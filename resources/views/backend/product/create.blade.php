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
                            <li class="breadcrumb-item active" aria-current="page">Add New Products</li>
                        </ol>
                    </nav>
                    <h1 class="h3 m-0">Add New Products</h1>
                </div>
                <div class="col-auto d-flex"><a href="{{ route('products.index') }}" class="btn btn-primary">Back</a></div>
            </div>
        </div>
        <div class="card">  
            <div class="sa-example my-5">
                <div class="sa-example__legend">Add New</div>
                <div class="sa-example__body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row mb-4">
                            <label for="formGroupExampleInput" class="col-sm-2 form-label">Name</label> 
                            <div class="col-sm-10"><input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Product Name"/></div>
                        </div>
                        <div class="row mb-4">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Categories</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-select sa-select2 mt-3" multiple>
                                    <option disabled>Select Categories</option>
                                    {{-- main category loop --}}
                                    @foreach ($categories as $category) 
                                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                        {{-- sub category loop  --}}
                                        @foreach ($category->subCategoriy as $sub_category) 
                                            <option value="{{ $sub_category->id }}">__{{ $sub_category->cat_name }}</option>
                                            {{-- child category loop  --}}
                                            @foreach ($sub_category->childCategoriy as $child_category) 
                                                <option value="{{ $child_category->id }}">____{{ $child_category->cat_name }}</option>
                                                {{-- sub child loop   --}}
                                                @foreach ($child_category->subChildCategoriy as $sub_child_category) 
                                                    <option value="{{ $sub_child_category->id }}">_______{{ $sub_child_category->cat_name }}</option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="formGroupExampleInput" class="col-sm-2 form-label">Unit Price</label> 
                            <div class="col-sm-10"><input name="unit_price" type="number" class="form-control" id="formGroupExampleInput" placeholder="Enter Unit Price"/></div>
                        </div>
                        <div class="row mb-4">
                            <label for="formGroupExampleInput" class="col-sm-2 form-label">Purchase Price</label> 
                            <div class="col-sm-10"><input name="purchase_price" type="number" class="form-control" id="formGroupExampleInput" placeholder="Enter Purchase Price"/></div>
                        </div>
                        <div class="row mb-4">
                            <label for="formGroupExampleInput" class="col-sm-2 form-label">Stock</label> 
                            <div class="col-sm-10"><input name="stock" type="number" class="form-control" id="formGroupExampleInput" placeholder="Enter Stock Number"/></div>
                        </div>
                        <div class="row mb-4">
                            <label for="formGroupExampleInput" class="col-sm-2 form-label">Banner</label> 
                            <div class="col-sm-10"><input name="banner" type="file" class="form-control" id="formFile-3-normal" accept=".jpg,.jpeg,.png"/></div>
                        </div>
                        <div class="row mb-4">
                            <label for="formGroupExampleInput" class="col-sm-2 form-label">Icon</label> 
                            <div class="col-sm-10"><input name="icon" type="file" class="form-control" id="formFile-3-normal" accept=".jpg,.jpeg,.png"/></div>
                        </div>
                        <div class="row mb-4">
                            <label for="formGroupExampleInput" class="col-sm-2 form-label">Title</label> 
                            <div class="col-sm-10"><input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Title"/></div>
                        </div>
                        <div class="row mb-4">
                            <label for="formGroupExampleInput" class="col-sm-2 form-label">Description</label> 
                            <div class="col-sm-10"><textarea name="description" placeholder="Enter Description" class="form-control" rows="4"></textarea></div>
                        </div>
                        <div class="row mb-4">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Size</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-select sa-select2 mt-3" multiple>
                                    <option disabled>Select Sizes</option>
                                    {{-- main category loop --}}
                                    @foreach ($sizes as $size) 
                                        <option value="{{ $size->id }}">{{ $size->name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Color</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-select sa-select2 mt-3" multiple>
                                    <option disabled>Select Color</option>
                                    {{-- main category loop --}}
                                    @foreach ($colors as $color) 
                                        <option value="{{ $color->id }}">{{ $color->name }}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <fieldset class="row mb-4">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input
                                        type="radio" class="form-check-input" name="status" id="gridRadios1" value="1" checked="" >
                                    <label class="form-check-label" for="gridRadios1">Active</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="status" id="gridRadios2" value="0" />
                                    <label class="form-check-label" for="gridRadios2">Inactive</label>
                                </div> 
                            </div>
                        </fieldset> 
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection