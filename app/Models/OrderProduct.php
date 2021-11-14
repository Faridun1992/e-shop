<?php

namespace App\Models;


use App\Events\OrderProductCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class OrderProduct extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $table = 'order_product';
    protected $guarded = [];

    /* protected $dispatchesEvents = [
         'created' => OrderProductCreated::class,
     ];*/

    public function orders()
    {
        return $this->hasMany(Order::class, 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
