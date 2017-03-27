<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::select('id','name','alias','price','intro','content','image','keyword','description')->orderBy('id','DESC')->skip(0)->take(4)->paginate(6);
        return view('Site.home.index',compact('products'));
       // return view('home');
    }

    public function search()
    {

        $searchterm = Input::get('search');
        if ($searchterm) {
            $products = DB::table('products');
            $results = $products->where('name', 'LIKE', '%' . $searchterm . '%')
                ->orWhere('description', 'LIKE', '%' . $searchterm . '%')
                ->get();
            return view('user.search', compact('products', 'results'));
        }

    }
    public function loaisanpham($id)
    {
        $product_cate = DB::table('products')->select('id', 'name', 'price','pricesale','content','keyword', 'image','description', 'cate_id')->where('cate_id', $id)->paginate(3);
        $cate = DB::table('categories')->select('id')->where('id', $product_cate[0]->cate_id)->first();
        $menu_cate = DB::table('categories')->select('id', 'name')->where('id', $cate->id)->get();
        $last_products = DB::table('products')->select('id', 'name', 'price', 'image', 'cate_id')->orderBy('id', 'DESC')->take(6)->get();
        $category = DB::table('categories')->select('name')->where('id', $id)->first();
        return view('user.cate', compact('product_cate', 'menu_cate', 'last_products', 'category'));
    }
    public function xoasanpham(){

    }
}
