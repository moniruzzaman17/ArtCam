<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoreConfigData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_config_data';
    protected $fillable = [
         'name',
         'value',
         'created_at',
         'updated_at',
         'data',
         'script',
    ];
}
