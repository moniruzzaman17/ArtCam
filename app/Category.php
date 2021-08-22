<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'entity_id';
    protected $fillable = [
         'name',
         'position',
         'visibility',
    ];

    function subCategories() {
        return $this->hasMany('App\SubCategory','parent_id','entity_id');
    }
}
