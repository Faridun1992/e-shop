<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute_value extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'attribute_values';
    protected $fillable = [];

    public function group()
    {
        return $this->belongsTo(Attribute_group::class, 'attr_group_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'attribute_products', 'value_id', 'product_id');
    }
}
