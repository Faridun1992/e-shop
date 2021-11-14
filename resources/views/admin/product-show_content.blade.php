<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Продукт {{$product->title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('master.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master.product.index')}}">Список продуктов</a>
                        </li>
                        <li class="breadcrumb-item active">Продукт {{$product->title}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="list-group-item">

    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Псевдоним</th>
                                    <th>Описание</th>
                                    <th>Категория</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->categories->parentCategory->parentCategory->title}}/{{$product->categories->parentCategory->title}}/{{$product->categories->title}}</td>
                                    <td>
                                        <form action="{{route('master.product.destroy', $product)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-xs" type="submit">Удалить</button>
                                        </form>
                                        <form action="{{route('master.product.edit', $product)}}" method="GET">
                                            @csrf
                                            <button class="btn btn-secondary btn-xs" type="submit">Редактировать</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
