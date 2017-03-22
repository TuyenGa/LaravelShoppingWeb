@extends('layouts.site')

@section('content')
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Products</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!--- products --->
<div class="products">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="categories">
                <h2>Categories</h2>
                <ul class="cate">
                    @foreach($categories as $category)

                            <li><a href="/product/show"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$category->name}}</a></li>

                            <ul>
                                <li><a href="/product/show"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$category->name}}</a></li>
                            </ul>

                    @endforeach

                </ul>
            </div>
        </div>
        <div class="col-md-8 products-right">

            <div class="agile_top_brands_grids">
                @foreach($products as $product)
                <div class="col-md-4 gallery">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="/site/images/offer.png" alt=" " class="img-responsive">
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="/product/detail"><img title=" " alt=" " src="/resources/upload/{{$product->image}}"></a>
                                            <p>Sampann-toor-dal</p>
                                            <h4>{{$product->pricesale}}<span>{{$product->price}}</span></h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <a href="{{route('cart.edit',$product->id)}}">
                                                Add to cart
                                            </a>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                    <div class="clearfix"></div>
            </div>

            <nav class="numbering">
                <ul class="pagination paging">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<!--- products --->
@endsection