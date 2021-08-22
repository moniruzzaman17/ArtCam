<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\ProductMediaGallery;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($type,$id)
    {
        if ($type == 'category') {
            $products = Product::with('medias')->where('visibility',1)->where('category_id', 'LIKE', '%'.$id.'%')->paginate(30)->onEachSide(0);
        }
        else{
            $products = Product::with('medias')->where('visibility',1)->where('sub_category_id', 'LIKE', '%'.$id.'%')->paginate(30)->onEachSide(0);
        }

        // dd($config);
        return view('catalog.category',compact('products'));
    }
}
