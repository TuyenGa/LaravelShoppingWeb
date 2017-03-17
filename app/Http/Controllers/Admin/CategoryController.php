<?php

namespace App\Http\Controllers\Admin;

use App\category;
use App\Http\Requests\Admin\CategoryRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $part = $request->get("part", 30);
        $categories = Category::paginate($part);
        return view('admin.category.index')->with("categories", $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = Category::all();
        return view('admin.category.add')
            ->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->only(['name','keyword','description']);
        //dd($data);
        if($request->prarent_id != null && $request->prarent_id  != 0){
            $data['prarent_id'] = $request->prarent_id;
        }
        $category = new Category($data);
        //dd($category);
        if($category->save()){
            return redirect()->action("Admin\CategoryController@index")->with("messages", array( "success" => ["Success!!"]));
        }
        return redirect()->action("Admin\CategoryrController@create")->with("errors", ["Lỗi !!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $user)
    {
        return view('admin.category.show')->with("category",$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.category.edit')
            ->with("category",$category)
            ->with("categories",$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->only(['name','keyword','description']);
        //dd($data);
        if($request->prarent_id != null && $request->prarent_id  != 0){
            $data['prarent_id'] = $request->prarent_id;
        }
        if($category->update($data)){
            return redirect()->action("Admin\CategoryController@index")->with("messages", array( "success" => ["Sửa danh mục thành công"]));
        }
        return redirect()->action("Admin\CategoryController@edit")->with("errors", ["Lỗi không thể sửa danh mục"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect()->action("Admin\CategoryController@index")->with("messages", array( "success" => ["Xóa danh mục thành công"]));
        }
        return redirect()->action("Admin\CategoryController@index")->with("errors", ["Lỗi không thể xóa danh mục"]);
    }
}
