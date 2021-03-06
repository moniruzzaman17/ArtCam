<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\MediaGallery;
use App\CoreConfigData;
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
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('medias')->where('visibility',1)->paginate(30)->onEachSide(0);

        // dd($config);
        return view('welcome',compact('products'));
    }
}
