<?php

namespace App\Http\Controllers\download;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\SalesCoupon;

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
        $coupon = SalesCoupon::where('code',request('code'))->where('visibility',1)->where('expiration_date', '>=', date('Y-m-d'))->first();
        if($coupon){
            if (!empty($coupon->product_id)) {
                if ($coupon->product_id == request('pid')) {
                    if ($coupon->uses_limit >=  $coupon->time_used) {
                        $fileName = Product::with('medias')->where('entity_id',request('pid'))->first()->medias[0]->file;
                        $url = asset('medias/files/base/'.$fileName);
                        $c = SalesCoupon::find($coupon->entity_id);
                        $c->uses_limit = $c->uses_limit-1;
                        $c->time_used = $c->time_used+1;
                        $c->save();
                        return response()->json(['success' => 'Download will start witin 2s, thank you','url' => $url], 200);
                    }
                    else{
                        return response()->json(['failed' => 'Sorry! Download limit for this coupon has been exceeded'], 400);
                    }
                }
                else{
                    return response()->json(['failed' => 'Sorry! This Coupon is not for this product'], 400);
                }
            }
            else{
                if ($coupon->uses_limit >=  $coupon->time_used) {
                    $fileName = Product::with('medias')->where('entity_id',request('pid'))->first()->medias[0]->file;
                    $url = asset('medias/files/base/'.$fileName);
                    $c = SalesCoupon::find($coupon->entity_id);
                    $c->uses_limit = $c->uses_limit-1;
                    $c->time_used = $c->time_used+1;
                    $c->save();
                    return response()->json(['success' => 'Download will start witin 2s, thank you','url' => $url], 200);
                }
                else{
                    return response()->json(['failed' => 'Sorry! Download limit for this coupon has been exceeded'], 400);
                }
            }
        }
        else{
            return response()->json(['failed' => 'Sorry! Entered Coupon is not Valid.'], 400);
        }
    }
}
