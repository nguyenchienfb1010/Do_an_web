@extends('web.layouts.master')
@section('content')
   
    <div class="products">
        <div class="container">
            <div class="col-md-4 products-left">
                <div class="categories animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Categories</h3>
                    <ul class="cate">
                        @foreach ($categories as $item)
                            <li><a href="{{ route('web.category', $item->slug) }}">{{ $item->name }}</a></li>
                            <ul>
                                @foreach ($categories_2 as $item2)
                                    @if ($item2->parent_id == $item->id)
                                        <li><a href="{{ route('web.category', $item2->slug) }}">{{ $item2->name }}</a>
                                        </li>
                                        <ul>
                                            @foreach ($categories_3 as $item3)
                                                @if ($item3->parent_id == $item2->id)
                                                    <li><a
                                                            href="{{ route('web.category', $item3->slug) }}">{{ $item3->name }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif

                                @endforeach
                            </ul>
                        @endforeach
                    </ul>
                </div>
                <div class="new-products animated wow slideInUp" data-wow-delay=".5s">
                    <h3>New Products</h3>

                    <div class="new-products-grids">
                        @foreach ($products as $product)
                            <div class="new-products-grid">
                                <div class="new-products-grid-left">
                                    <a href="{{ route('web.product.single', $product->slug) }}"><img
                                            src="cover/{{ $product->img }}" alt=" " class="img-responsive" /></a>
                                </div>

                                <div class="new-products-grid-right">
                                    <h4><a
                                            href="{{ route('web.product.single', $product->slug) }}">{{ $product->name }}</a>
                                    </h4>
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="template/web/images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="template/web/images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="template/web/images/2.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="template/web/images/1.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="template/web/images/1.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                        <p> <span class="item_price">{{ number_format($product->price) }}
                                                VND</span><a data-url={{ route('add_Cart', $product->id) }}
                                                class="item_add add_to_cart" href="" style="background-color: orange; color:white">add to cart </a></p>
                                        <input type="hidden" id="qty" value="1">
                                    </div>
                                </div>

                                <div class="clearfix"> </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8 products-right">
                <div class="products-right-grid">
                    <div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
      
                        
                        <div class="clearfix"> </div>
                    </div>
                 
                </div>
                <div class="products-right-grids-bottom" id="load">
                    @foreach ($products_all as $item)
                        <div class="col-md-4 products-right-grids-bottom-grid">
                            <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp"
                                data-wow-delay=".5s">
                                <div class="new-collections-grid1-image">
                                    <a href="{{ route('web.product.single', $item->slug) }}" class="product-image"><img
                                            src="cover/{{ $item->img }}" alt=" " class="img-responsive"></a>
                                    <div class="new-collections-grid1-image-pos products-right-grids-pos">
                                        <a href="{{ route('web.product.single', $item->slug) }}">View Detail</a>
                                    </div>
                                    <div class="new-collections-grid1-right products-right-grids-pos-right">
                                        <div class="rating">
                                            <div class="rating-left">
                                                <img src="template/web/images/2.png" alt=" " class="img-responsive">
                                            </div>
                                            <div class="rating-left">
                                                <img src="template/web/images/2.png" alt=" " class="img-responsive">
                                            </div>
                                            <div class="rating-left">
                                                <img src="template/web/images/2.png" alt=" " class="img-responsive">
                                            </div>
                                            <div class="rating-left">
                                                <img src="template/web/images/1.png" alt=" " class="img-responsive">
                                            </div>
                                            <div class="rating-left">
                                                <img src="template/web/images/1.png" alt=" " class="img-responsive">
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>
                                </div>
                                <h4><a href="{{ route('web.product.single', $item->slug) }}">{{ $item->name }}</a>
                                </h4>

                                <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                                    <p><span
                                            class="item_price">{{($item->price) }}VND</span><a
                                            data-url={{ route('add_Cart', $item->id) }}
                                            class="item_add add_to_cart" href="" style="background-color: orange; color:white">add to cart </a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

@endsection
