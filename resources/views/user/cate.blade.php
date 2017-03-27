
@extends('layouts.site')


@section('content')

    <!-- top-brands -->
    <div class="top-brands">
        <div class="container">
            <h2>Top selling offers</h2>
            <div class="grid_3 grid_5">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Advertised offers</a></li>

                    </ul>

                    <div class="agile_top_brands_grids">
                        @forelse($product_cate as $product)
                            <div class="col-md-4 top_brand_left">
                                <div class="hover14 column">
                                    <div class="agile_top_brand_left_grid">
                                        <div class="agile_top_brand_left_grid_pos">
                                            <img src="/site/images/offer.png" alt=" " class="img-responsive" />
                                        </div>
                                        <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block" >
                                                    <div class="snipcart-thumb">
                                                        <a href="/product/detail/{{$product->id}}"><img title=" " alt=" " src="/resources/upload/{{$product->image}}" /></a>
                                                        <p>{{$product->name}}</p>

                                                        <h4>{{$product->pricesale}}<span>{{$product->price}}</span></h4>
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_detailsg">
                                                        <a href="{{route('cart.edit',$product->id)}} " class="btn btn-primary">
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3>No Product</h3>
                        @endforelse
                        <div class="clearfix"> </div>

                    </div>

                    <div class="agile_top_brands_grids">


                        <div class="clearfix"> </div>
                    </div>
                </div>

            </div>

        </div>



    </div>
    <!-- //top-brands -->
    <!-- new -->
    <div class="newproducts-w3agile">

    </div>
    <!-- //new -->

@endsection