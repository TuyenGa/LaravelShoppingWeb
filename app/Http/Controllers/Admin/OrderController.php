<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $part = $request->get("part",30);
        $orders = Order::paginate($part);
        return view('admin.category.index')->with("orders",$orders)->with('categories',$categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        return view('admin.order.show')->with("order",$order);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        if($order->delete()){
            return redirect()->action("Admin\OrderController@index")->with("messages", array( "success" => ["Succsess"]));
        }
        return redirect()->action("Admin\OrderController@index")->with("errors", ["Lỗi!!"]);

    }
}
