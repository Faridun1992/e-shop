<?php

namespace App\Http\Controllers;

use App\Models\Attribute_value;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    public function index()
    {
        $brands = Brand::select('id', 'title', 'images', 'description')->limit(3)->latest()->get();
        $products = Product::with('categories.parentCategory.parentCategory')
            ->where('status', TRUE)
            ->where('hit', TRUE)
            ->paginate(8);
        return view('index', compact('brands', 'products'));
    }

    public function search(Request $request)
    {
        $brands = Brand::select('id', 'title', 'images', 'description')->limit(3)->latest()->get();
        $s = $request->search;
        $products = Product::where('title', 'LIKE', "%{$s}%")->where('status', TRUE)->where('status', true)->latest()->paginate(8);

        return view('index', compact('products', 'brands'));
    }

}
