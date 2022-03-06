<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    protected $fillable = [
        'parent_id',
        'name',
        'descriptions',
        'img',
        'price',
    ];
}
