<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $part = $request->get("part",30);
        $users = User::paginate($part);
        return view('admin.user.list')
            ->with("users",$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.add')
            ->with("roles",$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->only(['name','username','password','email','phone','role_id']);
        $repassword = $request->get("repassword");
        if($repassword != $data['password']){
            return redirect()->action("Admin\UserController@create")->with("messages", [ 'errors' => ["Lỗi không thể thêm danh mục"]]);
        }
        $data['password'] = Hash::make($data['password']);
        $user = new User($data);
        if($user->save()){
            return redirect()->action("Admin\UserController@index")->with("messages", array( "success" => ["Thêm danh mục thành công"]));
        }


        return redirect()->action("Admin\UserController@create")->with("errors", ["Lỗi không thể thêm danh mục"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.user.show')
            ->with("user",$user)
            ->with("roles",$roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit')
            ->with("user",$user)
            ->with("roles",$roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->only(['name','username','email','phone','role_id']);
        if($request->get("password") != null){
            $repassword = $request->get("repassword");
            $password = $request->get("password");
            if($repassword != $password){
                return redirect()->action("Admin\UserController@create")->with("messages", [ 'errors' => ["Lỗi không thể thêm danh mục"]]);
            }
            $data['password'] = Hash::make($password);
        }
        if($user->update($data)){
            return redirect()->action("Admin\UserController@index")->with("messages", array( "success" => ["Sửa thành công"]));
        }
        return redirect()->action("Admin\UserController@edit")->with("errors", ["Lỗi không thể sửa "]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        if($user->delete()){
            return redirect()->action("Admin\UserController@index")->with("messages", array( "success" => ["Xóa danh mục thành công"]));
        }
        return redirect()->action("Admin\UserController@index")->with("errors", ["Lỗi không thể xóa danh mục"]);
    }

}
