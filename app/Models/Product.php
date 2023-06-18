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

    protected $fillable = ['name', 'added_by', 'user_id', 'unit_price', 'purchase_price', 'stock', 'size', 'color', 'photos', 'thumbnail_img', 'tags','featured','unit','min_qty','discount','shipping_cost','title','description','slug','status'] ; 

    // size mutator
    public function setSizeAttribute($value){
        return $this->attributes['size'] = json_encode($value);
    }
    public function getSizeAttribute($value){
        return $this->attributes['size'] = json_decode($value);
    }
    // color mutator 
    public function setColorAttribute($value){
        return $this->attributes['color'] = json_encode($value);
    }
    public function getColorAttribute($value){
        return $this->attributes['color'] = json_decode($value);
    }
    /**
     * The category that belong to the Product 
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    } 
}
