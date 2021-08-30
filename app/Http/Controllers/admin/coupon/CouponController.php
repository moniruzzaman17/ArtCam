<?php

namespace App\Http\Controllers\admin\coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SalesCoupon;
use App\Product;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function index()
    {
        $coupons = SalesCoupon::orderBy('entity_id','DESC')->get();
        return view('admin.coupon.coupongrid', compact('coupons'));
    }

    public function addnewForm()
    {
        $products = Product::with('medias')->where('visibility',1)->get();
        return view('admin.coupon.addcoupon', compact('products'));
    }
    public function addNew(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            // 'coupon_code' => 'required|unique:sales_coupons,code',
            'product_id' => 'nullable',
            'coupon_code' => 'required|unique:sales_coupons,code',
            'limit' => 'required',
            'expiration_date' => 'date|required',
        ]);
        if (request('status')=='on') {
            $status = 1; 
        }
        else {
            $status = 0; 
        }

        $coupon = SalesCoupon::create([
            "name" => request('name'),
            "product_id" => request('product_id'),
            "code" => request('coupon_code'),
            "uses_limit" => request('limit'),
            "visibility" => $status,
            "expiration_date" => request('expiration_date')
        ]);
        if ($coupon) {
            return redirect()->route('admin.coupon.grid',array('session_id'=>session()->getId()))->with('success',"Coupon has been added");
        }
        else{
            return redirect()->back()->with('failed',"Not Added !");
        }
    }
    public function updateForm($id)
    {

        $coupon = SalesCoupon::where('entity_id',$id)->first();
        $products = Product::with('medias')->where('visibility',1)->get();
        return view('admin.coupon.coupondetails', compact('coupon','products'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            // 'coupon_code' => 'required|unique:sales_coupons,code',
            'product_id' => 'nullable',
            'coupon_code' => 'required|unique:sales_coupons,code,'.$id.',entity_id',
            'limit' => 'required',
            'expiration_date' => 'date|required',
        ]);
        if (request('status')=='on') {
            $status = 1; 
        }
        else {
            $status = 0; 
        }

        $coupon = SalesCoupon::find($id);
        $coupon->update([
            "name" => request('name'),
            "product_id" => request('product_id'),
            "code" => request('coupon_code'),
            "uses_limit" => request('limit'),
            "visibility" => $status,
            "expiration_date" => request('expiration_date')
        ]);
        if ($coupon) {
            return redirect()->back()->with('success',"Coupon details has been updated");
        }
        else{
            return redirect()->back()->with('failed',"Not Updated !");
        }
    }  

    public function delete($id)
    {
        $coupon = SalesCoupon::find($id);
        if ($coupon->delete()) {
            return redirect()->route('admin.coupon.grid',array('session_id'=>session()->getId()))->with('success',"Selected Coupon has been removed !");
        }
        else{
            return redirect()->back()->with('failed',"Failed to delete !");
        }
    }
}
