<?php

namespace App\Http\Controllers\admin\catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductMediaGallery;
use App\Category;
use App\SubCategory;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('medias')->paginate(50)->onEachSide(0);

        // dd($products);
        return view('admin.catalog.productgrid',compact('products'));
    }
    public function addProduct()
    {
        $products = Product::with('medias')->paginate(50)->onEachSide(0);

        // dd($config);
        return view('admin.catalog.productgrid',compact('products'));
    }
    public function showUpdateProductForm()
    {
        $product = Product::with('medias')->where('entity_id',request('id'))->first();
        $categories = Category::with('subCategories')->get();

        // dd($product);
        return view('admin.catalog.updateproduct',compact('product','categories'));
    }
    public function updateProduct(Request $request)
    {
        if ($request->hasFile('file')) {
            if (request('status') == 'on') {
                $status = 1;
            }
            else{
                $status = 0;
            }

        // dd($request->all());
            $categoryraw = '';
            $subcategoryraw = '';

            foreach (request('product_cat') as $key => $cat) {
                $categoryraw .= $cat.',';
                foreach (request('product_subcat'.$cat) as $key => $subcat) {
                    $subcategoryraw .= $subcat.',';
                }
            }

            $category = rtrim($categoryraw, ',');
            $subcategory = rtrim($subcategoryraw, ',');


            $product = Product::with('medias')->where('entity_id',request('id'))->update([
                'name'=> request('pname'),
                'meta_keyword'=> request('meta'),
                'description'=> request('description'),
                'category_id'=> $category,
                'sub_category_id'=> $subcategory,
                'visibility'=> $status
            ]);

            $image = $request->file('file');

            $image_name=explode('.',$image->getClientOriginalName())[0];

            $new_name = $image_name . Carbon::now('Asia/Dhaka')->format('YmdHu') .'.' .$image->getClientOriginalExtension();

            ProductMediaGallery::where('product_id',request('id'))->update([
                "image" => $new_name
            ]);

            $image_path = public_path('medias/'.request('oldIMG'));
            if(File::exists($image_path)) {
              File::delete($image_path);
          }

          $image->move(public_path('medias'), $new_name);

          return redirect()->back()->with('success','Product has been saved');
      }
      else{
        if (request('status') == 'on') {
            $status = 1;
        }
        else{
            $status = 0;
        }

        // dd($request->all());
        $categoryraw = '';
        $subcategoryraw = '';

        foreach (request('product_cat') as $key => $cat) {
            $categoryraw .= $cat.',';
            foreach (request('product_subcat'.$cat) as $key => $subcat) {
                $subcategoryraw .= $subcat.',';
            }
        }

        $category = rtrim($categoryraw, ',');
        $subcategory = rtrim($subcategoryraw, ',');


        $product = Product::with('medias')->where('entity_id',request('id'))->update([
            'name'=> request('pname'),
            'meta_keyword'=> request('meta'),
            'description'=> request('description'),
            'category_id'=> $category,
            'sub_category_id'=> $subcategory,
            'visibility'=> $status
        ]);
        return redirect()->back()->with('success','Product has been saved');
    }
}

public function showAddProductForm()
{
    $categories = Category::with('subCategories')->get();

        // dd($product);
    return view('admin.catalog.addproduct',compact('categories'));
}
public function addNewProduct(Request $request)
{
    if (request('status') == 'on') {
        $status = 1;
    }
    else{
        $status = 0;
    }

        // dd($request->all());
    $categoryraw = '';
    $subcategoryraw = '';

    foreach (request('product_cat') as $key => $cat) {
        $categoryraw .= $cat.',';
        foreach (request('product_subcat'.$cat) as $key => $subcat) {
            $subcategoryraw .= $subcat.',';
        }
    }

    $category = rtrim($categoryraw, ',');
    $subcategory = rtrim($subcategoryraw, ',');


    $product = Product::create([
        'name'=> request('pname'),
        'meta_keyword'=> request('meta'),
        'description'=> request('description'),
        'category_id'=> $category,
        'sub_category_id'=> $subcategory,
        'visibility'=> $status
    ]);
    $products = new Product;

    $product->name =request('pname');
    $product->meta_keyword =request('meta');
    $product->description =request('description');
    $product->category_id =$category;
    $product->sub_category_id =$subcategory;
    $product->save();

    $pid = $product->entity_id;


    $image = $request->file('file');

    $image_name=explode('.',$image->getClientOriginalName())[0];

    $new_name = $image_name . Carbon::now('Asia/Dhaka')->format('YmdHu') .'.' .$image->getClientOriginalExtension();

    ProductMediaGallery::create([
        "product_id" => $pid,
        "image" => $new_name
    ]);
    $image->move(public_path('medias'), $new_name);

    return redirect()->back()->with('success','Product has been added');
}
public function deleteProduct(){

    $product = Product::with('medias')->where('entity_id',request('id'))->first();


            $image_path = public_path('medias/'.$product->medias[0]->image);
            if(File::exists($image_path)) {
              File::delete($image_path);
          }
    $deleted = $product->delete();
    if ($deleted) {
        return redirect()->route('admin.product.grid',array('session_id'=>session()->getId()))->with('success','Product has been Deleted');
    }
}
}
