<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoProduct extends Model
{
    protected $table = 'info_product';
    protected $fillable = [
        'parent_id',
        'title',
        'description',
    ];
}
