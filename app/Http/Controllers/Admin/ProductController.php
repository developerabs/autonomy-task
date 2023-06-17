<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductReuest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Size;
use App\Models\Color;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = null;
        $category = null;
        $products = Product::with('categories');
        if ($request->has('name')){
            $name = $request->name; 
            $products = $products->where('name', 'like', '%'.$name.'%');
        } 
        if ($request->has('category')){ 
            $category = $request->category;
            $products = $products->whereHas('categories', function ($query) use ($category) {
                $query->where('cat_name', 'like', '%'.$category.'%');
            });
        }
        $products = $products->paginate(10);
        // return $products;
        return view('backend.product.index', compact('products','name','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('subCategoriy')->where('parent_id', '=', 0)->get();
        $sizes = Size::get();
        $colors = Color::get();
        return view('backend.product.create', compact('categories','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductReuest $request)
    {   
        DB::beginTransaction();
  
        try {
            // store products 
            $product = new Product();
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->user_id = Auth::user()->id;
            $product->unit_price = $request->unit_price;
            $product->purchase_price = $request->purchase_price;
            $product->stock = $request->stock;
            $product->title = $request->title;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->thumbnail_img = "image.png";
            $product->unit = $request->unit;
            $product->min_qty = $request->min_qty;
    
            if ($request->sizes != null) {
                $product->size = json_encode($request->sizes);
            }
            if ($request->colors != null) {
                $product->colors = json_encode($request->colors);
            }
            $product->save();

            // store product category 
            foreach ($request->categories as $category) {
                $productCategory = new ProductCategory();
                $productCategory->product_id = $product->id;
                $productCategory->category_id = $category;
                $productCategory->save();
            }
            
 
            DB::commit();
              
        } catch (Exception $e) {
   
            DB::rollback();
            throw $e;
        }

        $notification = array(
            'message' => 'Added Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('products.index')->with($notification);

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
        //
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
        $product = Product::find($id);
        $product->delete();

        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'error' 
        );
        return redirect()->back()->with($notification);
    }
}
