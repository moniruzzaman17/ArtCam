<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\ProductMediaGallery;

class SearchController extends Controller
{
    public function search() {
        $keyword = request('keyword');
        $products    = Product::with('medias')
        ->where(function($q) use ($keyword){
          $q->where('name', 'like', '%' . $keyword . '%')
          ->orWhere('sku', 'like', '%' . $keyword . '%')
          ->orWhere('description', 'like', '%' . $keyword . '%')
          ->orWhere('meta_keyword', 'like', '%' . $keyword . '%');
      })
        ->where('visibility',1)
        ->paginate(30)->onEachSide(0);

        $found = count($products);

        $total = Product::with('medias')->where('visibility',1)->count();

        return view('catalog.search',compact('products','found','total'));

    }
}
