<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                    <div class="col-sm-6">
                        @if($order->status == false)
                        <h1>Заказ №{{$order->id}}</h1>
                        <form action="{{route('master.orders.update', $order)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success btn-xs">Одобрить</button>
                        </form>
                        <form action="{{route('master.orders.destroy', $order)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-xs" type="submit">Удалить</button>
                        </form>
                        @else
                            <h4>Заказ заверщен</h4>
                        @endif
                    </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('master.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master.orders.index')}}">Список заказов</a></li>
                        <li class="breadcrumb-item active">Заказ №{{$order->id}}</li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>Номер заказа</td>
                                    <td>{{$order->id}}</td>
                                </tr>
                                <tr>
                                    <td>Дата заказа</td>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Дата изменения</td>
                                    <td>{{$order->updated_at}}</td>
                                </tr>
                                <tr>
                                    <td>Сумма заказа</td>
                                    <td>{{$order->orderproducts->sum('price')}} $</td>
                                </tr>
                                <tr>
                                    <td>Имя заказчика</td>
                                    <td>{{$order->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Комментарий</td>
                                    <td>{{$order->note}}</td>
                                </tr>


                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <h3>Детали заказа</h3>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID Заказа</th>
                                    <th>Наименование</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderproducts as $orderproduct)
                                    <tr>
                                        <td>{{$orderproduct->order_id}}</td>
                                        <td>{{$orderproduct->title}}</td>
                                        <td>{{$orderproduct->quantity}}</td>
                                        <td>{{$orderproduct->price}}$</td>
                                    </tr>
                                @endforeach
                                <tr class="active">
                                    <td colspan="2">
                                        <b>Итого:</b>
                                    </td>
                                    <td>
                                        <b>{{$orderproducts->sum('quantity')}}</b>
                                    </td>
                                    <td>
                                        <b>{{$orderproducts->sum('price')}}$</b>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
