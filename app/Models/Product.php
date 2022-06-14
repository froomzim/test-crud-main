<?php

namespace App\Models;

use App\Models\Category as ModelsCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'buy_price',
        'sell_price',
        'inventory',
        'situation',
        'uri',
    ];

    public function category()
    {
        return $this->hasOne( ModelsCategory::class, 'id', 'category_id');
    }
}
