<?php

namespace App\Models;

use App\Events\ProductCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'title',
        'slug',
        'content',
        'quantity',
        'price',
        'old_price',
        'status',
        'images',
        'description',
        'hit',
        'category_id',
    ];
   /* protected $dispatchesEvents = [
        'created' => ProductCreated::class,
    ];*/


    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');

    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'related_products', 'product_id', 'related_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    public function modifications()
    {
        return $this->hasMany(Modification::class);
    }

    public function values()
    {
        return $this->belongsToMany(Attribute_value::class, 'attribute_products', 'product_id', 'value_id');
    }

}
