<?php

namespace App\Http\Controllers\staticpages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CoreConfigData;
class StaticPageController extends Controller
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
    public function about()
    {
        $about = CoreConfigData::where('name','about')->first()->value;


        return view('staticpages.about',compact('about'));
    }
}
