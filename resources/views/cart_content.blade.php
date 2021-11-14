@if(\Gloudemans\Shoppingcart\Facades\Cart::content()->count() > 0)
<div class="ckeckout">
    <div class="container">
        <div class="ckeck-top heading">
            <h2>CHECKOUT</h2>
        </div>


        <div class="ckeckout-top">
            <div class="cart-items">
                <h3>My Shopping Bag ({{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}})</h3>

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th><span>Фото</span></th>
                                <th><span>Название продукта</span></th>
                                <th><span>Цена за штуку</span></th>
                                <th><span>Количетсво</span></th>
                                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </th>
                                <div class="clearfix"> </div>
                            </tr>
                        </thead>

                            <tbody>
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                            <tr>
                                <td><a href="single.html" ><img src="{{asset('pink')}}/images/{{$item->image}}" class="img-responsive" alt=""></a>
                                </td>
                                <td><span class="name">{{$item->name}}</span></td>
                                <td><span>${{$item->price}}</span></td>
                                <td><span>{{$item->qty}}шт</span></td>
                                <td>
                                <form action="{{route('cart.delete', $item->rowId)}}" method="post">
                                    @csrf
                                    <button class="glyphicon glyphicon-remove text-danger" aria-hidden="true" ></button>
                                </form>
                                </td>
                                <div class="clearfix"> </div>
                            </tr>
                            @endforeach
                        <tr>
                            <td>Итого:</td>
                            <td colspan="4" class="text-right cart-qty" >{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}шт</td>
                        </tr>
                        <tr>
                            <td>На сумму:</td>
                            <td colspan="4" class="text-right cart-sum">${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                        </tr>
                            </tbody>
                    </table>
                    <tfoot>

                    <div class="modal-footer">
                        <a href="{{route('home')}}" class="btn btn-default" data-dismiss="modal" type="button">Продолжить покупки</a>
                        <a class="btn btn-danger btn-sm" href="{{route('cart.destroy')}}" type="button">Очистить корзину</a>
                        <form method="post" action="{{route('order')}}" role="form" data-toggle="validator">
                            @csrf
                            <div class="form-group">
                                <label for="address">Note</label>
                                <textarea name="note" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Оформить</button>
                        </form>

                    </div>
                    </tfoot>

                </div>
            </div>
            </div>



        </div>
    </div>
</div>
@else
<h1 class="text-center" >Корзина пуста</h1>
    @endif
