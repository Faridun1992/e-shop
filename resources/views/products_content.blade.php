<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                @foreach(explode('/', $urls) as $url)
                <li>{{$url}}</li>
                @endforeach

            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->
<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
            <div class="sngl-top">
                <div class="col-md-5 single-top-left">
                    @if($product->galleries->count() > 0)

                    <div class="flexslider">
                        <ul class="slides">
                              @foreach($product->galleries as $gallery)
                            <li data-thumb="{{ asset('pink') }}/images/{{$gallery->imgages}}">
                                <div class="thumb-image"> <img src="{{ asset('pink') }}/images/{{$gallery->imgages}}" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                            </li>
                              @endforeach
                          </ul>

                    </div>
                    @else

                        <div class="flexslider">
                            <ul class="slides">
                                    <li data-thumb="{{asset('pink')}}/images/{{($product->images)}}">
                                        <div class="thumb-image"> <img src="{{asset('pink')}}/images/{{($product->images)}}" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                    </li>
                            </ul>
                        </div>
                    @endif
                    <!-- FlexSlider -->

                </div>
                <div class="col-md-7 single-top-right">
                    <div class="single-para simpleCart_shelfItem">

                    <h2>{{$product->title}}</h2>
                        <div class="star-on">
                            <ul class="star-footer">
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                </ul>

                            <div class="review">
                                <a href="#"> 1 customer review </a>

                            </div>
                        <div class="clearfix"> </div>
                        </div>

                        <h5 class="item_price" id="base-price" data-base="{{$product->price}}$">{{$product->price}}$</h5>
                        @if($product->old_price)
                            <small><del>{{ $product->old_price }}</del>$</small>
                        @endif
                        <p>{!! $product->content !!}</p>
                        <div class="available">
                            <ul>
                                <li>Color

                                        <select>
                                            <option>Выбрать цвет</option>
                                            @foreach($product->modifications as $prod)
                                        <option data-title="{{$prod->title}}"
                                                data-price="{{$prod->price}}"
                                                value="{{$prod->id}}">{{$prod->title}}</option>
                                            @endforeach
                                        </select>

                                </li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>
                        <ul class="tag-men">
                            <li><span>Категории</span>
                                <span class="women1">

                                    <a href="#"></a>{{$product->categories->title}}</span></li>
                        </ul>

                        <form action="{{route('cart.store', $product->slug)}}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="quantity">

                                    <input type="number" size="4" value="1" name="quantity" min="1" step="1">

                            </div>
                            <button type="submit">ADD TO CART</button>
                        </form>


                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="tabs">
                <ul class="menu_drop">
            <li class="item1"><a href="#"><img src="{{ asset('pink') }}/images/arrow.png" alt="">Description</a>
                <ul>
                    <li class="subitem1"><a href="#">{{$product->description}}</a></li>
                </ul>
            </li>
            <li class="item2"><a href="#"><img src="{{ asset('pink') }}/images/arrow.png" alt="">Additional information</a>
                <ul>
                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                </ul>
            </li>
            <li class="item3"><a href="#"><img src="{{ asset('pink') }}/images/arrow.png" alt="">Reviews (10)</a>
                <ul>
                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                </ul>
            </li>
            <li class="item4"><a href="#"><img src="{{ asset('pink') }}/images/arrow.png" alt="">Helpful Links</a>
                <ul>
                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                </ul>
            </li>
            <li class="item5"><a href="#"><img src="{{ asset('pink') }}/images/arrow.png" alt="">Make A Gift</a>
                <ul>
                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                </ul>
            </li>
         </ul>
            </div>
            <div class="latestproducts">
                <div class="product-one">
                    @foreach($product->products as $prod)
                    <div class="col-md-4 product-left p-left">

                        <div class="product-main simpleCart_shelfItem">
                            <a href="{{ route('show', [
                                                    $prod->categories->parentCategory->parentCategory->slug,
                                                    $prod->categories->parentCategory->slug,
                                                    $prod->categories->slug,
                                                    $prod->slug,
                                                    $prod]) }}" class="mask"><img class="img-responsive zoom-img" src="{{ asset('pink') }}/images/{{$prod->images}}" alt="" /></a>
                            <div class="product-bottom">
                                <h3>{{$prod->title}}</h3>
                                <p>Explore Now</p>
                                <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{$prod->price}}$</span></h4>
                            </div>
                            <div class="srch">
                                <span>-50%</span>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
            <div class="col-md-3 single-right">
                <div class="w_sidebar">
                    @foreach($product->values as $v)
                    <section  class="sky-form">
                        <h4>{{$v->group->title}}</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                @foreach($product->values as $value)
                                <label class="checkbox"><input type="checkbox" name="checkbox" value="{{$value->id}}" ><i></i>{{$value->value}}</label>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    @endforeach
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
