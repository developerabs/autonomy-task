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
                            <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                        </ol>
                    </nav>
                    <h1 class="h3 m-0">Update Product</h1>
                </div>
                <div class="col-auto d-flex"><a href="{{ route('products.index') }}" class="btn btn-primary">Back</a></div>
            </div>
        </div> 
       <form action="{{ route('products.update', $product->id)  }}" method="POST" enctype="multipart/form-data">
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
        <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md","1100":"sa-entity-layout--size--lg"}'>
            <div class="sa-entity-layout__body">
                <div class="sa-entity-layout__main">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="mb-5"><h2 class="mb-0 fs-exact-18">Basic information</h2></div>
                            <div class="mb-4">
                                <label for="form-product/name" class="form-label">Name</label>
                                <input name="name" value="{{ $product->name }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Product Name"/>
                            </div> 
                            <div class="mb-4">
                                <label for="form-product/name" class="form-label">Title</label>
                                <input name="title" value="{{ $product->title }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Title"/>
                            </div>
                            <div class="mb-4">
                                <label for="form-product/description" class="form-label">Description</label>
                                <textarea name="description" id="form-product/description" class="sa-quill-control form-control" rows="8" placeholder="Enter Description">{{ $product->description }}</textarea>  
                            </div> 
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5"><h2 class="mb-0 fs-exact-18">Pricing</h2></div>
                            <div class="row g-4">
                                <div class="col">
                                    <label for="form-product/price" class="form-label">Unit Price</label>
                                    <input name="unit_price" value="{{ $product->unit_price }}" type="number" class="form-control" id="formGroupExampleInput" placeholder="Enter Unit Price"/>
                                </div>
                                <div class="col">
                                    <label for="form-product/old-price" class="form-label">Purchase price</label>
                                    <input name="purchase_price" value="{{ $product->purchase_price }}" type="number" class="form-control" id="formGroupExampleInput" placeholder="Enter Purchase Price"/>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5"><h2 class="mb-0 fs-exact-18">Inventory</h2></div> 
                            <div>
                                <label for="form-product/quantity" class="form-label">Stock quantity*</label>
                                <input name="stock" value="{{ $product->stock }}" type="number" class="form-control" id="formGroupExampleInput" placeholder="Enter Stock Quentity"/>
                            </div>
                            <div class="mt-2">
                                <label for="form-product/quantity" class="form-label">Unit*</label>
                                <input name="unit" value="{{ $product->unit }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Unit Name"/>
                            </div>
                            <div class="mt-2">
                                <label for="form-product/quantity" class="form-label">Minimun Quentity*</label>
                                <input name="min_qty" value="{{ $product->min_qty }}" type="number" class="form-control" id="formGroupExampleInput" placeholder="Enter Minimun Quentity"/>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5"><h2 class="mb-0 fs-exact-18">Images</h2></div> 
                                <div class="row mb-4">
                                    <label for="formGroupExampleInput" class="col-sm-2 form-label">Thumbnail*</label> 
                                    <div class="col-sm-10"><input name="thumbnail_img" onchange="loadFile(event)" type="file" class="form-control" accept=".jpg,.jpeg,.png"/></div>
                                    <img id="loadImage" src="" alt="" srcset="" style="width: 180px; marrgin-left:40px">
                                </div>
                                <div class="row mb-4">
                                    <label for="formGroupExampleInput" class="col-sm-2 form-label">Photos</label> 
                                    <div class="col-sm-10"><input name="photo[]" multiple type="file" class="form-control" id="formFile-3-normal" accept=".jpg,.jpeg,.png"/></div>
                                </div> 
                        </div> 
                    </div> 
                </div>
                <div class="sa-entity-layout__sidebar">
                    <div class="card w-100">
                        <div class="card-body p-5">
                            <div class="mb-5"><h2 class="mb-0 fs-exact-18">Visibility</h2></div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input
                                        type="radio" class="form-check-input" name="status" id="gridRadios1" value="1" @if($product->status == 1) {{ 'checked' }} @endif >
                                    <label class="form-check-label" for="gridRadios1">Active</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="status" id="gridRadios2" value="0" @if($product->status == 0) {{ 'checked' }} @endif/>
                                    <label class="form-check-label" for="gridRadios2">Inactive</label>
                                </div> 
                            </div> 
                        </div>
                    </div>
                    <div class="card w-100 mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5"><h2 class="mb-0 fs-exact-18">Categories</h2></div>
                            <select name="categories[]" class="form-select sa-select2 mt-3" multiple>
                                <option disabled>Select Categories</option>
                                {{-- main category loop --}}
                                @foreach ($categories as $category) 
                                    <option value="{{ $category->id }}" @if(in_array($category->id, $category_ids)) {{ 'selected' }} @endif>{{ $category->cat_name }}</option>
                                    {{-- sub category loop  --}}
                                    @foreach ($category->subCategoriy as $sub_category) 
                                        <option value="{{ $sub_category->id }}" @if(in_array($sub_category->id, $category_ids)) {{ 'selected' }} @endif>__{{ $sub_category->cat_name }}</option>
                                        {{-- child category loop  --}}
                                        @foreach ($sub_category->childCategoriy as $child_category) 
                                            <option value="{{ $child_category->id }}" @if(in_array($child_category->id, $category_ids)) {{ 'selected' }} @endif>____{{ $child_category->cat_name }}</option>
                                            {{-- sub child loop   --}}
                                            @foreach ($child_category->subChildCategoriy as $sub_child_category) 
                                                <option value="{{ $sub_child_category->id }}" @if(in_array($sub_child_category->id, $category_ids)) {{ 'selected' }} @endif>_______{{ $sub_child_category->cat_name }}</option>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </select>
                            <div class="mt-4 mb-n2"><a href="{{ route('categories.create') }}">Add new category</a></div>
                        </div>
                    </div>
                    <div class="card w-100 mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5"><h2 class="mb-0 fs-exact-18">Size</h2></div>
                            <select name="size[]" class="form-select sa-select2 mt-3" multiple>
                                <option disabled>Select Sizes</option>
                                {{-- main category loop --}}
                                @foreach ($sizes as $size) 
                                    <option value="{{ $size->id }}"  @if(in_array($size->id, $product->getOriginal('size'))) {{ 'selected' }} @endif>{{ $size->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card w-100 mt-5">
                        <div class="card-body p-5">
                            <div class="mb-5"><h2 class="mb-0 fs-exact-18">Color</h2></div>
                            <select name="color[]" class="form-select sa-select2 mt-3" multiple>
                                <option disabled>Select Color</option>
                                {{-- main category loop --}}
                                @foreach ($colors as $color) 
                                    <option value="{{ $color->id }}" @if(in_array($color->id, $product->getOriginal('color'))) {{ 'selected' }} @endif>{{ $color->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
        </div> 
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
    </div>
</div>

@endsection