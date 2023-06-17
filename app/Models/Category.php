<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates = ['deleted_at'];
   
    protected $fillable = ['parent_id', 'level', 'cat_name', 'slug', 'icon', 'banner', 'featured', 'title', 'description', 'status'] ; 

    public function subChildCategoriy()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function childCategoriy()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('subChildCategoriy');
    }
    public function subCategoriy()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('childCategoriy');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


  
}
