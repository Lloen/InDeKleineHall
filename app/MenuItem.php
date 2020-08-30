<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_item';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'category_id',
        'subcategory_id',
        'quantity',
        'price'
    ];
}
