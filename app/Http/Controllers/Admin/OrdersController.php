<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $user = User::all();
        $product = Product::all();
        $orders=  Order::all();

        return view('admin.order.index',compact('user','product','orders'));

    }


    public function create()
    {

    }
    public function store()
    {
        $user = Auth::user();
        $orders = $user->orders()->create([
            'qty' => Cart::qty(),
            'total' => Cart::total()

        ]);





    }

}
