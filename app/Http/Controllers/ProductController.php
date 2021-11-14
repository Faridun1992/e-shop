<?php

namespace App\Http\Controllers;


use App\Models\Attribute_group;
use App\Models\Attribute_value;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends Controller
{

    public function product($category, $childCategory, $childCategory2, $productSlug, Product $product, Request $request)
    {
        $product->load('products.categories.parentCategory.parentCategory', 'galleries', 'modifications', 'values.group');

        /*$groups = cache()->remember('group', 3600, function (){
            return  Attribute_group::with('values')->get();
        });*/

        $urls = $request->path();

        return view('products', compact('product','urls'));
    }
}
