<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'added_by', 'user_id', 'unit_price', 'purchase_price', 'stock', 'size', 'colors', 'photos', 'thumbnail_img', 'tags','featured','unit','min_qty','discount','shipping_cost','title','description','slug','status'] ; 

  
    /**
     * The category that belong to the Product 
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}
