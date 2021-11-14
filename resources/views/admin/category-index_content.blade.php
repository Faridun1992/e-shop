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
                    <h1>Список категорий</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('master.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Список категорий</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="list-group-item">
    @foreach($categories as $category)

        <li>
            <a href="{{route('master.category.show', $category)}}">{{$category->title}}</a>

            @foreach($category->childCategories as $children)
                <ul>
                    <a href="{{route('master.category.show', $children)}}">{{$children->title}}</a>

                    @foreach($children->childCategories as $child)
                        <ul>
                            <a href="{{route('master.category.show', $child)}}">{{$child->title}}</a>
                        </ul>
                    @endforeach

                </ul>
            @endforeach
        </li>

    @endforeach
</div>
<!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
