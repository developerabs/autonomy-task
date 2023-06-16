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
                            <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                        </ol>
                    </nav>
                    <h1 class="h3 m-0">All Categories</h1>
                </div>
                <div class="col-auto d-flex"><a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a></div>
            </div>
        </div>
        <div class="card"> 
            <form action="{{ route('categories.index') }}" method="get"><input name="search" value="{{ $search }}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Search...."/></form>
            <div class="sa-example my-5">
                <div class="sa-example__legend">All Categories</div>
                <div class="sa-example__body">
                    <table class="table table-striped m-0">
                        <thead>
                            <tr>
                                <th class="w-min" >SL</th>
                                <th class="min-w-10x">Main Category</th>
                                <th>Sub Category</th>
                                <th>Child Category</th>
                                <th>Sub Child Category</th> 
                                <th class="w-min" data-orderable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index => $category)
                                
                            <tr>
                                <td>{{ $categories->firstItem() + $index }} </td>
                                {{-- main category --}}
                                <td>
                                    <p>{{ $category->cat_name }}</p>
                                    {{-- category edit button --}}
                                    <a href="" class="btn btn-primary btn-sm" style="margin-left: 10px; float:left">
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
                                        </svg></a>
                                    {{-- category delete button  --}}
                                    <form action="{{ route('categories.destroy',$category->id) }}" method="post" onsubmit="return confirm('Do you want to delete this?')">
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
                                <td>
                                    @foreach ($category->subCategoriy as $sub_category)
                                        {{-- sub category --}}
                                        <p>{{ $sub_category->cat_name }}</p>
                                        {{-- category edit button --}}
                                        <a href="" class="btn btn-primary btn-sm" style="margin-left: 10px; float:left">
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
                                            </svg></a>
                                        {{-- category delete button  --}}
                                        <form action="{{ route('categories.destroy',$sub_category->id) }}" method="post" onsubmit="return confirm('Do you want to delete this?')">
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
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($category->subCategoriy as $sub_category)
                                        @foreach ($sub_category->childCategoriy as $child_category)
                                            {{-- chils category --}}
                                            <p>{{ $child_category->cat_name }}</p> 
                                              {{-- category edit button --}}
                                            <a href="" class="btn btn-primary btn-sm" style="margin-left: 10px; float:left">
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
                                                </svg></a>
                                            {{-- category delete button  --}}
                                            <form action="{{ route('categories.destroy',$child_category->id) }}" method="post" onsubmit="return confirm('Do you want to delete this?')">
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
                                        @endforeach
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($category->subCategoriy as $sub_category)
                                        @foreach ($sub_category->childCategoriy as $child_category) 
                                            @foreach ($child_category->subChildCategoriy as $sub_child_category)
                                            {{-- sub chils category --}}
                                            <p>{{ $sub_child_category->cat_name }}</p> 
                                              {{-- category edit button --}}
                                            <a href="" class="btn btn-primary btn-sm" style="margin-left: 10px; float:left">
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
                                                </svg></a>
                                            {{-- category delete button  --}} 
                                            <form action="{{ route('categories.destroy',$sub_child_category->id) }}" method="post" onsubmit="return confirm('Do you want to delete this?')">
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
                                        @endforeach
                                        @endforeach
                                    @endforeach
                                </td>
                             
                            </tr> 
        
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">{{ $categories->links('pagination::bootstrap-4') }}</div>
                </div>
             
              
            </div>
           
        </div>
    </div>
</div>

@endsection