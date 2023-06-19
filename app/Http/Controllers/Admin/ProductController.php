<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductReuest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Size;
use App\Models\Color;
use App\Traits\UploadTrait; 

class ProductController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $products = Product::with('categories')->latest()
                    ->when($request->has('name'), function ($query) {
                        $query->where('name', 'like', '%'.request('name').'%');
                    })
                    ->when($request->has('category'), function ($query) {
                        $query->whereHas('categories', function ($query) {
                            $query->where('cat_name', 'like', '%'.request('category').'%');
                        });
                    }); 
        $products = $products->paginate(10);
        // return $products;
        return view('backend.product.index', compact('products'));
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
            $product->unit = $request->unit;
            $product->min_qty = $request->min_qty;
            
            // product thumbnail image upload
            $path = $this->UploadFile($request->file('thumbnail_img'), 'Products'); 
            $product->thumbnail_img = $path;

            // products photos upload 
            $files = [];
            if ($request->hasFile('photo')) {
                // multiple images upload 
                  foreach ($request->file('photo') as $key => $file) { 
                      $path = $this->UploadFile($file, 'Products');
      
                      //reformat the file details
                      array_push($files, [
                          'path' => $path,
                      ]);
                  }
                  $product->photo = $files;
            }   

            if ($request->size != null) {
                $product->size = $request->size;
            }
            if ($request->color != null) {
                $product->color = $request->color;
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
        $product = Product::with('categories')->findOrFail($id);
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        $category_ids = $product->categories->pluck('id')->toArray();
        $categories = Category::with('subCategoriy')->where('parent_id', '=', 0)->get();
        $sizes = Size::get();
        $colors = Color::get();
        // return $product;
        return view('backend.product.edit', compact('product','categories','sizes','colors','category_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        DB::beginTransaction();
  
        try {
            // update products 
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->slug = Str::slug($request->name); 
            $product->unit_price = $request->unit_price;
            $product->purchase_price = $request->purchase_price;
            $product->stock = $request->stock;
            $product->title = $request->title;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->unit = $request->unit;
            $product->min_qty = $request->min_qty;
            
            // product thumbnail image upload
            if ($request->hasFile('thumbnail_img')) { 
                $this->deleteFile($product->thumbnail_img);
                  $path = $this->UploadFile($request->file('thumbnail_img'), 'Products'); 
                  $product->thumbnail_img = $path;
            } 
          

            // products photos upload 
            $files = [];
            if ($request->hasFile('photo')) {
                // multiple images upload 
                  foreach ($request->file('photo') as $key => $file) { 
                      $path = $this->UploadFile($file, 'Products');
      
                      //reformat the file details
                      array_push($files, [
                          'path' => $path,
                      ]);
                  }
                  $product->photo = $files;
            }   

            if ($request->size != null) {
                $product->size = $request->size;
            }
            if ($request->color != null) {
                $product->color = $request->color;
            }
            $product->save();

            // update product category  
            $collection = ProductCategory::where('product_id', $id)->get(['id']);
            // return $collection;
            ProductCategory::destroy($collection->toArray());
 

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
            'message' => 'Updated Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'error' 
        );
        return redirect()->back()->with($notification);
    }
}
