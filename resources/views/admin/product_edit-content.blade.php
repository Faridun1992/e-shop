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
                    <h1>Товар {{$product->title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('master.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master.product.index')}}">Список товаров</a>
                        </li>
                        <li class="breadcrumb-item active">Товар {{$product->title}}</li>
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
                <div class="col-lg-offset-3">
                    <p>Базовое изоброжение:</p>
                    <img src="{{asset('pink')}}/images/{{$product->images}}" class="img-responsive"
                         width="100px" height="100px" alt="">
                    @if(count($product->galleries) > 0)
                        <p>Дополнительные изоброжения:</p>

                        @foreach($product->galleries as $gallery)
                            <form action="{{route('master.deleteImages', $gallery->id)}}"
                                  method="post">
                                <button class="btn text-danger">x</button>
                                @csrf
                                @method('delete')
                            </form>
                            <img src="{{asset('pink')}}/images/{{$gallery->imgages}}"
                                 class="img-responsive" width="100px" height="100px" alt="">
                        @endforeach
                    @endif

                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('master.product.update', $product)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group has-feedback">
                                    <label for="title">Наимменование товара</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Наименование товара" value="{{$product->title}}" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Выбирите категорию</label>
                                    <select class="form-control select2" name="category_id" id="categories">
                                        @foreach($categories as $category)

                                            <option @if($category->products->contains($product))  selected @endif
                                            value="{{ $category->id }}">{{ $category->parentCategory->parentCategory->title }}
                                                / {{ $category->parentCategory->title }}
                                                / {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea name="content" id="summernote" cols="80"
                                              rows="10">{{$product->content}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="images">Базовое изображение</label>

                                    <input type="file" name="images" value=""><br>

                                </div>

                                <div class="form-group">
                                    <label for="images">Дополнительные изоброжения</label>

                                    <input type="file" name="imgages[]" multiple><br>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Количество</label><br>
                                    <input type="number" size="10" value="{{$product->quantity}}" name="quantity"
                                           min="1" step="1">

                                </div>
                                <div class="form-group">
                                    <label for="price">Новая цена</label>
                                    <input type="text" name="price" pattern="^[0-9.]{1,}$" value="{{$product->price}}"
                                           class="form-control"
                                           placeholder="Цена">
                                </div>
                                <div class="form-group">
                                    <label for="price">Старая цена</label>
                                    <input type="text" name="old_price" pattern="^[0-9.]{1,}$"
                                           value="{{$product->old_price ?? ''}}"
                                           class="form-control"
                                           placeholder="Цена">
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <input type="text" name="description" class="form-control" placeholder="Описание"
                                           value="{{$product->description}}">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="status" value="0"/>
                                        <input type="checkbox" name="status"
                                               value="1" {{($product->status) ? 'checked' : '0'}}/>
                                        Статус
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label>
                                        <input type="hidden" name="hit" value="0">
                                        <input type="checkbox" name="hit"
                                               value="1" {{($product->hit) ? 'checked' : '0'}}>
                                            Хит

                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="related">Связанные товары</label>

                                    <div class="col-xs-8">

                                        @foreach ($products as $item)
                                            @if($product->products->contains($item))
                                                <input checked name="related[]" type="checkbox" value="{{ $item->id }}">
                                            @else
                                                <input name="related[]" type="checkbox" value="{{ $item->id }}">
                                            @endif
                                            {{ $item->title }}

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

