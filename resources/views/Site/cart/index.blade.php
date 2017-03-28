@extends('layouts.site')
@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1">
                <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- checkout -->
    <div class="checkout">
        <div class="container">
            <h2>Your shopping cart contains: <span> {!! $cartItems->count() !!} products</span></h2>
            <div class="checkout-right">
                <table class="timetable_sub">
                    <thead>
                    <tr>

                        <th>Product</th>
                        <th>Quality</th>
                        <th>Product Name</th>

                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    @foreach($cartItems as $cartItem)
                    <tr class="rem">

                        <td class="invert-image"><img src="{{asset('/resources/upload/'.$cartItem->options->image)}}" alt=" " class="img-responsive" /></td>
                        {{--{{dd($cartItem->options->image)}}--}}
                        {{--{{dd($cartItem->image)}}--}}
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <div class="entry value-minus">&nbsp;</div>
                                    <div class="entry value"><span>{{$cartItem->qty}}</span></div>
                                    <div class="entry value-plus active">&nbsp;</div>
                                </div>
                            </div>
                        </td>
                        <td class="invert">{{$cartItem->name}}</td>

                        <td class="invert">{{$cartItem->price}}</td>
                        <td class="invert">
                            <div class="minicart-details-remove">
                                <button type="button" name="remove" id="minicart-remove" data-minicart-idx="0">x{{\Gloudemans\Shoppingcart\Facades\Cart::remove($cartItem->rowId)}}</button>

                            </div>
                            <div class="rem">
                                <div class="close">
                                </div>
                            </div>

                        </td>
                    </tr>

                    @endforeach
                    <!--quantity-->

                    <script>
                        $('#minicart-remove').on('click',function () {
                            window.location.reload();
                        });
                        $('.value-plus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                            divUpd.text(newVal);
                        });

                        $('.value-minus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                            if(newVal>=1) divUpd.text(newVal);
                        });
                    </script>
                    <!--quantity-->
                </table>
            </div>
            <div class="checkout-left">
                <div class="checkout-left-basket">
                    <h4>Continue to basket</h4>
                    <ul>
                        @foreach($cartItems as $cartItem)
                        <li>{{$cartItem->name}}<i>- {{$cartItem->qty}}</i> <span>{{$cartItem->price * $cartItem->qty}} </span></li>
                        @endforeach
                        <li>Total <i>-</i> <span>{{$total}}</span></li>

                    </ul>
                </div>
                <div class="checkout-right-basket">
                    <a href="{{route('site.home.index')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //checkout -->
    @endsection