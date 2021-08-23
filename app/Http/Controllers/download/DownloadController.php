<?php

namespace App\Http\Controllers\download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class DownloadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fileName = Product::with('medias')->where('entity_id',request('pid'))->first()->medias[0]->file;
        $url = asset('medias/files/base/'.$fileName);
        

        return $url;
    }
}
