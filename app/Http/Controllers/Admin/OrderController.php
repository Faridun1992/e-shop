<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('user')
            ->where('status', false)
            ->whereHas('orderproducts')
            ->latest()
            ->paginate(3);
        return view('admin.orders', compact('orders'));
    }


    public function show(Order $order)
    {
        $orderproducts = OrderProduct::with('orders')
            ->where('order_id', $order->id)
            ->get();
        $order->load('orderproducts', 'user');
        return view('admin.orders-view', compact('order', 'orderproducts'));
    }


    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->update(['status' => TRUE]);
        return redirect()->route('master.orders.index')->with('status', "заказ одобрен и принят на обработку");
    }


    public function destroy($id)
    {
        $orderproduct = OrderProduct::where('order_id', $id)->delete();

        return redirect()->route('master.orders.index')->with('status', "заказ успешно удален");
    }
}
