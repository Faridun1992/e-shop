<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новый товар</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('master.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master.product.index')}}">Список товаров</a>
                        </li>
                        <li class="breadcrumb-item active">Новый товар</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="list-group-item">

    </div>
    <!-- Main content -->
    <section class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('master.product.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group has-feedback">
                                    <label for="title">Наимменование товара</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Наименование товара" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Выбирите категорию</label>
                                    <select class="form-control select2" name="category_id" id="categories">
                                        @foreach($categories as $category)

                                            <option
                                                value="{{ $category->id }}">{{ $category->parentCategory->parentCategory->title }}
                                                / {{ $category->parentCategory->title }}
                                                / {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea name="content" id="summernote" cols="80" rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="images">Базовое изображение</label>
                                    <input type="file" name="images"  required>
                                </div>

                                <div class="form-group">
                                    <label for="images">Дополнительные изоброжения</label>
                                    <input type="file" name="imgages[]"  multiple>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Количество</label><br>
                                    <input type="number" size="10" value="1" name="quantity" min="1" step="1">

                                </div>
                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <input type="text" name="price" pattern="^[0-9.]{1,}$" class="form-control"
                                           placeholder="Цена">
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <input type="text" name="description" class="form-control" placeholder="Описание">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="status" value="0">
                                        <input type="checkbox" name="status" value="1" checked> Статус
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="hit" value="0">
                                        <input type="checkbox" name="hit" value="1"> Хит
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="related">Связанные товары</label>

                                    <div class="col-xs-8">

                                        @foreach ($products as $product)
                                            <input name="related[]" type="checkbox" value="{{ $product->id }}">
                                            {{ $product->title }}
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">
                                        Сохранить
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

