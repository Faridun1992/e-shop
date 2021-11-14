<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table= 'categories';

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description'
    ];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);

    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

   public static function tree()
   {
        $allCategories = Category::all();

        $rootCategories =$allCategories->whereNull('parent_id');

        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;
   }

   private static function formatTree($categories, $allCategories)
   {
       foreach ($categories as $category)
       {
           $category->children = $allCategories->where('parent_id', $category->id);

           if($category->children->isNotEmpty()){
                self::formatTree($category->children, $allCategories);
           }
       }
   }


}
