<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $primaryKey = 'entity_id';
    protected $fillable = [
         'parent_id',
         'name',
         'position',
         'visibility',
    ];

    function category() {
        return $this->belongsTo('App\Category','parent_id','entity_id');
    }

    function subSubCategories() {
        return $this->hasMany('App\SubSubCategory','parent_id','entity_id')->orderBy('position');
    }
}
