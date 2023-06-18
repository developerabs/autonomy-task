<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryReuest;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $categories = Category::with('subCategoriy')->where('parent_id', '=', 0)
                        ->when($request->has('search'), function ($query) {
                            $query->where('cat_name', 'like', '%'.request('search').'%')
                            ->orWhereHas('subCategoriy', function ($query) {
                                $query->where('cat_name', 'like', '%'.request('search').'%');
                            });
                        });

        // $categories = Category::with('subCategoriy')->where('parent_id', '=', 0);
        // if ($request->has('search')){
        //     $search = $request->search;
        //     $categories = $categories->where('cat_name', 'like', '%'.$search.'%')
        //     ->orWhereHas('subCategoriy', function ($query) use ($search) {
        //         $query->where('cat_name', 'like', '%'.$search.'%');
        //     });

        // }
        
        $categories = $categories->paginate(10);
        // return $categories;
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('subCategoriy')->where('parent_id', '=', 0)->get();
        return view('backend.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryReuest $request)
    { 

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->slug = Str::slug($request->cat_name);
        $category->title = $request->title;
        $category->description = $request->description;

        if (isset($request->parent_id) && $request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1 ;
        }else{
            $category->parent_id = 0;
            $category->level = 0;
        }

        $category->save();
        $notification = array(
            'message' => 'Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'hello';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $category = Category::find($id);
        $category->delete();

        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'error' 
        );
        return redirect()->back()->with($notification);
    }
}
