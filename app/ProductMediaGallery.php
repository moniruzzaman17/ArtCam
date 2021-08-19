<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMediaGallery extends Model
{
    protected $primaryKey = 'entity_id';
    public $timestamps = false;
    protected $fillable = [
       'product_id',
       'sku',
       'image',
   ];
}
