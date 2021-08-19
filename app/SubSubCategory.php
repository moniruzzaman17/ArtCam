<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    protected $primaryKey = 'entity_id';
    protected $fillable = [
         'parent_id',
         'name',
         'position',
         'visibility',
    ];

    function subCategories() {
        return $this->belongsTo('App\SubCategory','parent_id','entity_id')->orderBy('position');
    }
}
