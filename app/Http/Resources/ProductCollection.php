<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Size;
use App\Models\Color;
use App\Models\User;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'data' => $this->collection->map(function($data) {
                return [
                    'id' => $data->id,
                    'name' => $data->name, 
                    'owner' => User::select('name','email','user_type','profile_photo_path')->find($data->user_id), 
                    'categories' => $data->categories, 
                    'unit_price' => $data->unit_price, 
                    'purchase_price' => $data->purchase_price, 
                    'stock' => $data->stock, 
                    'min_qty' => $data->min_qty, 
                    'size' => Size::whereIn('id',json_decode($data->size))->pluck('name'), 
                    'colors' => Color::whereIn('id',json_decode($data->colors))->pluck('name'), 
                    'thumbnail_image' => $data->thumbnail_img, 
                    'title' => $data->title, 
                    'description' => $data->description, 
                    'unit' => $data->unit, 
                    'status' => $data->status == 1 ? "Active" : "Inactive", 
                    'created_at' => $data->created_at, 
                    'updated_at' => $data->updated_at, 
                ];
            })
        ];
    
    }
}
