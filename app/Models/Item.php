<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'item_name', 'sku', 'item_categories', 'number_in_stock', 'description',
             'discount', 'image_path', 'tax'
    ];
}