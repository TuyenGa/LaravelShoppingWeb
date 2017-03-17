<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\product_image;
use  App\Http\Requests\ProductRequest;
use Input,File;
//use Illuminate\Support\Facades\Input;



class ProductController extends Controller
{

    public function getAdd()
    {
        $cate = Category::select('id', 'name', 'prarent_id')->get()->toArray();
        return view('admin.product.add', compact('cate'));
    }

    public function postAdd(ProductReQuest $product_request)
    {
        $product = new Product();
        $file_name = $product_request->file('fImages')->getClientOriginalName();


        $product->name = $product_request->txtName;
        $product->alias = $product_request->txtName;
        $product->price = $product_request->txtPrice;
        $product->pricesale = $product_request->txtgiasale;
        $product->intro = $product_request->txtIntro;
        $product->content = $product_request->txtContent;
        $product->image = $file_name;
        $product->keyword = $product_request->txtKeyword;
        $product->description = $product_request->txtDescription;
        $product->user_id = 1;
        $product->cate_id = $product_request->category;
        $product_request->file('fImages')->move('resources/upload/', $file_name);
        $product->save();
 //       $product_id = $product->id;
//        if (Input::hasFile('fProductDetail')){
//        foreach (Input::file('fProductDetail') as $file){
//            $product_img = new product_image();
//            if (isset($file)){
//                $product_img -> image = $file->getClientOriginalName();
//                $product_img-> product_id = $product_id;
//                $file ->move('resources/upload/detail/',$file->getClientOriginalName());
//                $product_img ->save();
//            }
//        }
//       }

        return redirect()->route('admin.product.getList')->with(['flash_message' => 'Success!! Complete Add Product']);


    }

    public function getDelete($id)
    {
        //$product_detail = Product::find($id)->pimages->toArray();
        //foreach ($product_detail as $)
        return redirect()->route('admin.product.list');
    }
    public function index()
    {
        $data = product::select('id','name','alias','price','intro','content','image','keyword','description')->orderBy('id','DESC')->get()->toArray();
      return view('admin.product.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create()
    //{
        //
    //}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    //{
        //
    //}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    //{
        //
    //}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id)
    //{
        //
    //}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    //{
        //
    //}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function destroy($id)
    //{
        //
    //}
}
