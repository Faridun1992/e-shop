<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_group extends Model
{
    use HasFactory;

    protected $table = 'attribute_groups';

    protected $guarded = [];

    public function values()
    {
        return $this->hasMany(Attribute_value::class, 'attr_group_id','id');
    }
}
