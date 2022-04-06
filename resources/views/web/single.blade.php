@extends('web.layouts.master')
@section('content')
    
    <div class="single">
        <div class="container">
            <div class="col-md-4 products-left">
                <div class="filter-price animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Filter By Price</h3>
                    <ul class="dropdown-menu1">
                        <li><a href="">
                                <div id="slider-range"></div>
                                <input type="text" id="amount" style="border: 0" />
                            </a></li>
                    </ul>
                    <script type='text/javascript'>
                        
                        $(window).load(function() {
                            $("#slider-range").slider({
                                range: true,
                                min: 0,
                                max: 600,
                                values: [100, 600],
                                slide: function(event, ui) {
                                    $("#amount").val(ui.values[0] + "VND - " + ui.values[1]+  "VND" );
                                }
                            });
                            $("#amount").val( $("#slider-range").slider("values", 0)+"VND - "  + $("#slider-range").slider(
                                "values", 1)+ "VND");


                        }); //]]>
                    </script>
                    <script type="text/javascript" src="template/web/js/jquery-ui.min.js"></script>
                    
                </div>
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
               
            </div>
            <div class="col-md-8 single-right">
                <div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach ($product->images as $value)
                                <li data-thumb="/images/{{ $value->image }}">
                                    <div class="thumb-image"> <img src="/images/{{ $value->image }}"
                                            data-imagezoom="true" class="img-responsive" style="height: 280px"> </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- flixslider -->
                    <script defer src="template/web/js/jquery.flexslider.js"></script>
                    <link rel="stylesheet" href="template/web/css/flexslider.css" type="text/css" media="screen" />
                    <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>
                    <!-- flixslider -->
                </div>
                <div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
                    <h3>{{ $product->name }}</h3>
                    <h4><span class="item_price">{{($product->price)}} VND</span>
                        
                    </h4>
                   
                    <div class="description">
                        
                    </div>
                    <div class="color-quality">
                        <div class="color-quality-left">
                             <h4>Views: {{ $product->views }}</h4>
                        </div>
        
                        <div class="clearfix"> </div>
                    </div>
                    <div class="occasional">
                        <h5>Category : {{ $product->category->name }}</h5>

                        <div class="clearfix"> </div>
                    </div>
                    <div class="occasion-cart">
                        <a class="item_add add_to_cart" data-url={{ route('add_Cart', $product->id) }} href="#" style="background-color: orange; color:white">add to
                            cart </a>
                    </div>
                    
                </div>
                
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="single-related-products">
        <div class="container">
            <h3 class="animated wow slideInUp" data-wow-delay=".5s">Related Products</h3>
            <div class="new-collections-grids">
                @foreach ($products_related as $item)
                    <div class="col-md-3 new-collections-grid">
                        <div class="new-collections-grid1 animated wow slideInLeft" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="{{ route('web.product.single', $item->slug) }}" class="product-image"><img
                                        src="cover/{{ $item->img }}" alt=" " class="img-responsive"></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="{{ route('web.product.single', $item->slug) }}"> View Detail</a>
                                </div>
                                
                            </div>
                            <h4><a href="{{ route('web.product.single', $item->slug) }}">{{ $item->name }}</a></h4>

                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p>
                                    <span
                                        class="item_price">{{ $item->price}} VND</span>
                                  
                                </p>
                                <p>  <a class="item_add add_to_cart" data-url={{ route('add_Cart', $product->id) }}
                                    href="#" style="background-color: orange; color:white">add to cart </a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

@endsection
