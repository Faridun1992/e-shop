<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('master.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master.category.index')}}">Список категорий</a>
                        </li>
                        <li class="breadcrumb-item active">Редактирование категории</li>
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
                            <form action="{{route('master.category.update', $category)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-group has-feedback">
                                    <label for="title">Наимменование категории</label>
                                    <input type="text" name="title" class="form-control"
                                           placeholder="Наименование категории" value="{{ $category->title }}" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="description">Описание</label>
                                    <input type="text" name="description" class="form-control" placeholder="Описание"
                                           value="{{$category->description}}">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Выбирите категорию</label>
                                    <select class="form-control select2" name="parent_id">
                                        <option value="">Пожалуйста выбирите категорию</option>
                                        @foreach($categories as $item)
                                            @if($category->id !== $item->id)
                                                <option
                                                    value="{{ $item->id }}" {{ ($category->parent_id == $item->id) ? 'selected' : '' }}>{{ $item->title }}</option>
                                                @foreach($item->childCategories as $childCategory)
                                                    @if($category->id !== $childCategory->id)
                                                        <option
                                                            value="{{ $childCategory->id }}"
                                                            {{ ($category->parent_id) == $childCategory->id ? 'selected' : '' }}
                                                        >-- {{ $childCategory->title }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
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

