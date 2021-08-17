<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaGallery extends Model
{
    protected $primaryKey = 'entity_id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'value',
        'mob_value',
        'media_type',
        'position',
        'url',
        'visibility_status',
        'value2',
        'custom_name',
    ];
}
