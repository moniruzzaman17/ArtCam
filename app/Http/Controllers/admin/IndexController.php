<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class IndexController extends Controller
{
	public function __construct()
	{
        $this->middleware('admin.auth');
	}

	public function index()
	{
		$total = Product::count();
		$active = Product::where('visibility',1)->count();
		$inactive = Product::where('visibility',0)->count();

		$productSummery = array(
			"total" => $total,
			"active" => $active,
			"inactive" => $inactive
		);
    	return view('admin.index', compact('productSummery'));
	}
}
