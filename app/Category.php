<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'entity_id';
    protected $fillable = [
         'parent_id',
         'name',
         'position',
         'lavel',
         'children_count',
         'category_icon',
         'image_value',
         'visibility',
         'created_at',
         'updated_at',
    ];
}
