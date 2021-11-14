@foreach ($frontCategories as $parentCategory)
<li class="grid"><a href="{{ route('category', [$parentCategory]) }}">{{$parentCategory->title}}</a>
    <div class="mepanel">
        <div class="row">
            <div class="col1 me-one">


                    @if($parentCategory->childCategories->count())

                        @foreach($parentCategory->childCategories as $category)

                            <a href="{{ route('category', [$parentCategory, $category]) }}"><h4>{{$category->title}}</h4></a>
                                @foreach ($category->childCategories as $childCategory)
                                    <ul>
                                            <li><a href="{{ route('category', [$parentCategory, $category, $childCategory->slug]) }}">{{ $childCategory->title }}</a></li>
                                    </ul>
                                @endforeach
                        @endforeach
                    @endif

            </div>

        </div>
    </div>
</li>
@endforeach
<li class="grid"><a href="typo.html">Blog</a>
</li>
<li class="grid"><a href="contact.html">Contact</a>
</li>
