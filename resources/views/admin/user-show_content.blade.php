<div class="content-wrapper">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Профиль пользователя {{$user->name}}</h1>
                    <form action="№" method="POST">
                        @csrf
                        <button class="btn btn-success btn-xs">Заблокировать</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('master.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master.user.index')}}">Список пользователей</a></li>
                        <li class="breadcrumb-item active">Профиль пользователя {{$user->name}}</li>

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
                            <form action="{{route('master.user.update', $user)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group has-feedback">
                                    <label for="title">ID</label>
                                    <p>{{$user->id}}</p>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="description">Имя</label>
                                    <p>{{$user->name}}</p>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Роль</label>
                                    <select class="form-control select2" name="role_id">
                                        @foreach($roles as $role)
                                            <option  value="{{ $role->id }}" {{($user->role_id == $role->id) ? 'selected' : ''}} >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="description">Дата регистрации</label>
                                    <p>{{$user->created_at->format('d-m-Y')}}</p>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">
                                        Изменить
                                    </button>
                                </div>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <h3>Заказы пользователя</h3>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID Заказа</th>
                                    <th>Статус</th>
                                    <th>Сумма</th>
                                    <th>Дата создания</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        @if(!$order->orderproducts->sum('price'))
                                        <td>заказ удален</td>
                                        @elseif($order->status == null)
                                            <td>Новый</td>
                                        @else
                                            <td>Заверщен</td>
                                        @endif
                                        @if($order->orderproducts->sum('price'))
                                        <td>{{$order->orderproducts->sum('price')}}$</td>
                                        @else
                                        <td>Заказ удален</td>
                                        @endif
                                        <td>{{$order->created_at}}</td>
                                        <td><a href="{{route('master.orders.show', $order->id)}}"><i class="fa fa-fw fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
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
