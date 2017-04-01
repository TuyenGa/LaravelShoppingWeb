<?php

namespace App\Http\Controllers\Site;

use App\Product;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $cartItems = Cart::content();
        $total = Cart::total();
//        $count = Cart::count();
        return view('site.cart.index',compact('cartItems','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getShipping()
    {
        return view('site.shipping');

    }
    public function postShipping(Request $request)
    {
        $shipping = Shipping::create($request->all());
        return redirect()->back()->with('shipping' ,$shipping);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $product = Product::find($id);
        Cart::add([
            'id' =>$id,
            'name'=>$product->name,
            'qty'=>1,
            'price'=>$product->price,
            'options'=>  ['image'=>$product->image]
        ]);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function xoasanpham($id){
        Cart::remove($id);
        return view('Site.cart.index');
//return redirect()->route('index');
    }
}
