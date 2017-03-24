<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
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
}
