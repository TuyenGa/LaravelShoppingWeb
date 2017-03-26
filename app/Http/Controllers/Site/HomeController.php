<?php

namespace App\Http\Controllers\Site;

use App\Cart;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Product;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $products = Product::all();
        return view('site.home.index',compact('products'));
    }

    public  function getlogin(){
        return view("site.home.login");
    }

    public  function  postLogin(LoginRequest $request){
        $data = $request->only(['email','password']);
        $email = $request->get('email');
        $password = $request->get('password');
           if (Auth::attempt(['email'=>$email , 'password' => $password])) {

               return redirect('site/home');
           }
        return redirect()->action('Site\HomeController@login')->with("message",['errors' => 'Tài khoản hoặc mật khẩu Sai']);
    }

    public  function  getregister(){
        $roles = Role::all();
        return view('site.home.register')
            ->with('roles' , $roles);
    }

    public  function  postregister(UserRequest $request){
        $data = $request->only(['name','username','password','email','phone','role_id']);
        $repassword = $request->get('password');
        if($repassword!= $data['password'] )
        {
            return redirect() -> action('Site\HomeController@getregister')->with("messages",['error'=> ["Lỗi không thể đăng ký!"]]);

        }
        $data['password'] = Hash::make($data['password']);
        $user = new User($data);

        if($user->save())
        {
            return redirect()->action('Site\HomeController@index')->with('messages',array("success" => ["Thêm tài khoản thành công"]));
        }

        return redirect()->action('Site\HomeController@getregister')->with("messages",["error" => ["lỗi không thể thêm tài khoản"]]);
    }


}
