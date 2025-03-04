<div>
    <!--main area-->
	<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Shop</span></li>
        </ul>
    </div>
    <div class="row">

        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">


            <div class="wrap-shop-control" style=" margin-top: -57px;">

                <h1 class="shop-title">Digital & Electronics</h1>

                <div class="wrap-right">

                    {{-- <div class="sort-item orderby ">
                        <select name="orderby" class="use-chosen" >
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>

                    <div class="sort-item product-per-page">
                        <select name="post-per-page" class="use-chosen" >
                            <option value="12" selected="selected">12 per page</option>
                            <option value="16">16 per page</option>
                            <option value="18">18 per page</option>
                            <option value="21">21 per page</option>
                            <option value="24">24 per page</option>
                            <option value="30">30 per page</option>
                            <option value="32">32 per page</option>
                        </select>
                    </div> --}}

                    <div class="change-display-mode">
                        <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                        <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                    </div>

                </div>

            </div><!--end wrap shop control-->

            <div class="row">
                <div wire:loading wire:target="setActiveBrand" class="loader"></div>
                <ul wire:loading.class='loader-overlay' wire:target="setActiveBrand" class="product-list grid-products equal-container">
                    @foreach ($shop as $item)
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_20.jpg" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>{{$item['name']}}</span></a>
                                    <a class="product-name"><span>{{$item['desc']}}</span></a>
                                    <div class="wrap-price"><span class="product-price">${{$item['price']}}</span></div>
                                    <a wire:click="addToCart({{$item['id']}})" class="btn add-to-cart">Add To Cart</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>

            <div class="wrap-pagination-info">
                <ul class="page-numbers">
                    <li><span class="page-number-item current" >1</span></li>
                    <li><a class="page-number-item" href="#" >2</a></li>
                    <li><a class="page-number-item" href="#" >3</a></li>
                    <li><a class="page-number-item next-link" href="#" >Next</a></li>
                </ul>
                <p class="result-count">Showing 1-8 of 12 result</p>
            </div>
        </div><!--end main products area-->

        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">

            <div class="widget mercado-widget filter-widget brand-widget">
                <h2 class="widget-title">All Categories</h2>
                <div class="widget-content">
                    {{-- {{dd($brandFilter)}} --}}
                    <ul class="list-style vertical-list list-limited" data-show="6">
                        @if (isset($category))
                            @php
                                $count = 1;
                            @endphp
                            <li class="list-item flex"><a class="{{$brandFilter[0]}}" wire:click="setActiveBrand">All</a>
                            </li>
                            @foreach($category as $catItem)
                                @if ($count < 6)
                                    <li class="list-item flex"><a class="{{$brandFilter[$count]}}" wire:click="setActiveBrand({{$catItem['id']}})">{{$catItem['name']}}</a>
                                    </li>
                                @else
                                    <li class="list-item flex default-hiden"><a class="{{$brandFilter[$count]}} " wire:click="setActiveBrand({{$catItem['id']}})">{{$catItem['name']}}</a>
                                    </li>
                                    <li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
                                @endif
                                @php
                                    ++$count;
                                @endphp
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div><!-- brand widget-->
{{-- 
            <div class="widget mercado-widget filter-widget price-filter">
                <h2 class="widget-title">Price</h2>
                <div class="widget-content">
                    <div id="slider-range"></div>
                    <p>
                        <label for="amount">Price:</label>
                        <input type="text" id="amount" readonly>
                        <button class="filter-submit">Filter</button>
                    </p>
                </div>
            </div> --}}

            <div class="widget mercado-widget filter-widget">
                <h2 class="widget-title">Color</h2>
                <div class="widget-content">
                    <ul class="list-style vertical-list has-count-index">
                        <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
                    </ul>
                </div>
            </div><!-- Color -->

            <div class="widget mercado-widget filter-widget">
                <h2 class="widget-title">Size</h2>
                <div class="widget-content">
                    <ul class="list-style inline-round ">
                        <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                        <li class="list-item"><a class="filter-link " href="#">M</a></li>
                        <li class="list-item"><a class="filter-link " href="#">l</a></li>
                        <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                    </ul>
                    <div class="widget-banner">
                        <figure><img src="assets/images/size-banner-widget.jpg" width="270" height="331" alt=""></figure>
                    </div>
                </div>
            </div><!-- Size -->

            <div class="widget mercado-widget widget-product">
                <h2 class="widget-title">Popular Products</h2>
                <div class="widget-content">
                    <ul class="products">
                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="assets/images/products/digital_01.jpg" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="assets/images/products/digital_17.jpg" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="assets/images/products/digital_18.jpg" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
                                        <figure><img src="assets/images/products/digital_20.jpg" alt=""></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
                                    <div class="wrap-price"><span class="product-price">$168.00</span></div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div><!-- brand widget-->

        </div><!--end sitebar-->

    </div><!--end row-->

</div><!--end container-->

</main>
<!--main area-->

</div>
