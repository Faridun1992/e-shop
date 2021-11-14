<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 0)
            ->whereHas('orderproducts')
            ->count();
        $users = User::count();
        $products = Product::count();
        $categories = Category::count();

        return view('admin.admin-index', compact('orders', 'users', 'products', 'categories'));
    }
}
