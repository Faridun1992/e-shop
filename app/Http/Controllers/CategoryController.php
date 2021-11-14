<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function category(Category $category, Category $childCategory = null, $childCategory2 = null)
    {
        $brands = Brand::take(3)->get();

        if ($childCategory2) {
            $subCategory = $childCategory->childCategories()->where('slug', $childCategory2)->firstOrFail();
            $ids = collect($subCategory);
            $categories = [$category, $childCategory, $subCategory];
        } elseif ($childCategory) {
            $ids = $childCategory->childCategories->pluck('id');
            $categories = [$category, $childCategory];
        } elseif ($category) {
            $category->load('childCategories.childCategories');
            $ids = collect();
            $categories[] = $category;

            foreach ($category->childCategories as $subCategory) {
                $ids = $ids->merge($subCategory->childCategories->pluck('id'));
            }
        }

        $products = Product::whereHas('categories', function ($query) use ($ids) {
            $query->whereIn('id', $ids);
        })->with('categories.parentCategory.parentCategory')
            ->paginate(8);


        return view('index', compact('products', 'categories', 'brands'));
    }
}
