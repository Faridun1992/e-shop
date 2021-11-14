<?php

namespace App\Http\Controllers;

use App\Events\OrderProductCreated;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index(Request $request)
    {

        return view('cart');
    }

    public function store(Request $request)
    {

        $product = Product::findOrFail($request->input('product_id'));
        Cart::add($product->id,
            $product->images,
            $product->title,
            $request->input('quantity'),
            $product->price);

        return back()->with('status', 'Товар добавлен в корзину');
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return back()->with('status', 'Товар удален из корзины');
    }

    public function destroy()
    {
        Cart::destroy();
        return back()->with('status', 'корзина очищена');
    }

    public function orders(Request $request)
    {
        if (Auth::guest()) return redirect()->route('register');
        $order = Order::create([
            'currency' => '$',
            'user_id' => Auth::user()->id,
            'note' => $request->note
        ]);


        foreach (Cart::content() as $cart) {
            $orderProduct = OrderProduct::create([
                'quantity' => $cart->qty,
                'title' => $cart->name,
                'price' => $cart->price * $cart->qty,
                'order_id' => $order->id,
                'product_id' => $cart->id
            ]);
        }

        /*event(new OrderProductCreated($orderProduct));*/
        Cart::destroy();


        return back()->with('status', 'Ваш заказ принят на обработку, дождитесь звонка нашего менеджера');

    }

}
