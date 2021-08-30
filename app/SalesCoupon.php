<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesCoupon extends Model
{
    protected $primaryKey = 'entity_id';
    public $timestamps = false;
    protected $fillable = [
       'product_id',
       'name',
       'code',
       'uses_limit',
       'time_used',
       'visibility',
       'expiration_date',
   ];
}
