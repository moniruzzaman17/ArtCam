<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'entity_id';
    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'sub_category_id',
        'sub_sub_category_id',
        'meta_keyword',
        'description',
    ];

    function medias() {
        return $this->hasMany('App\ProductMediaGallery','product_id','entity_id');
    }
}
