<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\Admin\EditProductRequest;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $part = $request->get("part",30);
        $products = Product::paginate($part);
        return view('admin.product.list')->with("products",$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.add')
            ->with("category",$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $file_name = $request->file('image')->getClientOriginalName();
        $data = $request->only(['name','price','content','keyword','description','cate_id','pricesale','company']);
        $request->file('image')->move('resources/upload/', $file_name);
        $data['image'] = $file_name;

        $product = new Product($data);
        if($product->save()){
            return redirect()->action("Admin\ProductController@index")->with("messages", array( "success" => ["Success"]));
        }
        return redirect()->action("Admin\ProductController@create")->with("errors", ["Lỗi!!!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $categories = Category::all();
        return view('admin.product.show')
            ->with("product",$product)
            ->with("categories",$categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit')
            ->with("product",$product)
            ->with("categories",$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, product $product)
    {        $data = $request->only(['name','price','content','keyword','description','cate_id','pricesale','company']);

        if ($request->has('image')){
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('resources/upload/', $file_name);
            $data['image'] = $file_name;
        }

        if($product->update($data)){
            return redirect()->action("Admin\ProductController@index")->with("messages", array( "success" => ["Success!!"]));
        }
        return redirect()->action("Admin\ProductController@edit")->with("errors", ["Lỗi!!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        if($product->delete()){
            return redirect()->action("Admin\ProductController@index")->with("messages", array( "success" => ["Succsess"]));
        }
        return redirect()->action("Admin\ProductController@index")->with("errors", ["Lỗi!!"]);

    }
}
