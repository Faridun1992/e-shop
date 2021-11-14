<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <img src="{{ asset('pink') }}/images/bnr-1.jpg" alt=""/>
            </li>
            <li>
                <img src="{{ asset('pink') }}/images/bnr-2.jpg" alt=""/>
            </li>
            <li>
                <img src="{{ asset('pink') }}/images/bnr-3.jpg" alt=""/>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends-->

<!--about-starts-->
@if($brands)
<div class="about">
    <div class="container">
        <div class="about-top grid-1">
            @foreach($brands as $brand)
            <div class="col-md-4 about-left">
                <figure class="effect-bubba">
                    <img class="img-responsive" src="{{ asset('pink') }}/images/{{$brand->images}}" alt=""/></a>
                    <figcaption>
                        <h2>{{ $brand->title }}</h2>
                        <p>{{ $brand->description }}</p>
                    </figcaption>
                </figure>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endif
<!--about-end-->
<!--product-starts-->
@if($products)
<div class="product">
    <div class="container">
        <div class="product-top">
            <div class="product-one">
                @foreach($products as $k=>$product)

                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="{{ route('show', [
                                                    $product->categories->parentCategory->parentCategory->slug,
                                                    $product->categories->parentCategory->slug,
                                                    $product->categories->slug,
                                                    $product->slug,
                                                    $product]) }}" class="mask"><img class="img-responsive zoom-img" src="{{ asset('pink') }}/images/{{$product->images}}" alt="" /></a>
                        <div class="product-bottom">
                            <h3>{{ $product->title }}</h3>
                            <p>Explore Now</p>
                            <h4>
                                <a data-id="{{$product->id}}" class="add-to-cart-link" href="{{route('cart.store', $product->slug)}}"><i></i></a> <span class=" item_price">$ {{ $product->price }}</span>
                                @if($product->old_price)
                                <small><del>{{ $product->old_price }}</del>$</small>
                                @endif
                            </h4>
                        </div>
                        <div class="srch">
                            @if($product->old_price)
                            <span>-{{round((($product->old_price-$product->price)/$product->old_price) * 100)}}%</span>
                            @endif
                        </div>
                    </div>
                </div>
                @if($k==3)
                <div class="clearfix"></div>
                 </div>

                <div class="product-one">
                @endif

                    @if($k==7)
                </div>
                    <div class="clearfix"></div>

                    @endif

                  @endforeach
            <div class="clearfix"></div>

                {{$products->links()}}






        </div>


    </div>
</div>
@endif
<!--product-end-->

