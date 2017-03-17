<?php

namespace App\Http\Controllers\Site;

use App\Cart;
use App\Category;
use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $products =product::all();
        return view('Site.product.index', compact('products'));
    }

    public function  show(){
        $products = Product::all();
        $categories = Category::all();
        return view('Site.product.index')
            ->with('products',$products)
            ->with('categories' , $categories);

    }
    public  function  getproduct(){
        return('site.product.index');
    }

    public  function  details($id){
        $products = product::find($id);
        return view('site.product.show')
            ->with('products',$products);
    }

    public function CartShopping()
    {

    }

}
