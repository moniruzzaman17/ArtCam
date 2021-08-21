<?php

namespace App\Http\Controllers\admin\catalog\category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Category;
use App\SubCategory;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin.auth');
	}

	public function index()
	{
		$motherCategories = Category::with('subCategories')->orderBy('position','asc')->get();
		return view('admin.catalog.category.details',compact('motherCategories'));
	}

	public function sortMotherCat()
	{
		$position = array();
		$i=1;
		foreach (request('id') as $key => $value) {
			$motherCategories = Category::where('entity_id',$value)->first();
			$motherCategories->update([
				'position'=>$i++
			]);
			$position[] = $value;
		}
		return 'Success';
	}

	public function sortSubCat()
	{
		$position = array();
		$i=1;
		foreach (request('id') as $key => $value) {
			$subCategories = SubCategory::where('entity_id',$value)->first();
			$subCategories->update([
				'position'=>$i++
			]);
			$position[] = $value;
		}
		return 'Success';
	}

	public function addRootCategory(Request $request){
		$name 			= request('catName');

		if (request('status') == 'on') {
			$status = 1;
		}
		else{
			$status = 0;
		}

		$created = Category::create([
			'name'			=> $name,
			'position'		=> Category::max('position')+1,
			'visibility'	=> $status,
		]);
		if ($created) {
			return redirect()->back()->with('success','New root category has been added');		
		}
		else{
			return redirect()->back()->with('failed','Failed to adding category');
		}
	}


	public function addSubCategory(Request $request){
		$name 			= request('subcatName');

		if (request('status') == 'on') {
			$status = 1;
		}
		else{
			$status = 0;
		}

		$created = SubCategory::create([
			'name'			=> $name,
			'parent_id'			=> request('motherCatId'),
			'position'		=> Category::max('position')+1,
			'visibility'	=> $status,
		]);
		if ($created) {
			return redirect()->back()->with('success','New Sub category has been added');		
		}
		else{
			return redirect()->back()->with('failed','Failed to adding sub-category');
		}
	}

	public function changeVisibilityDisable(Request $request){
		$category = Category::where('entity_id',request('catID'))->first();
		$category->update([
			'visibility'=>0
		]);


		$motherCategories = Category::orderBy('position','asc')->get();
		return view('admin.catalog.category.categorylist',compact('motherCategories'));
	}

	public function changeVisibilityEnable(Request $request){
		$category = Category::where('entity_id',request('catID'))->first();
		$category->update([
			'visibility'=>1
		]);


		$motherCategories = Category::orderBy('position','asc')->get();
		return view('admin.catalog.category.categorylist',compact('motherCategories'));
	}

	public function changeSubVisibilityDisable(Request $request){
		$subcategory = SubCategory::where('entity_id',request('subCatID'))->first();
		$subcategory->update([
			'visibility'=>0
		]);


		$motherCategories = Category::with('subCategories')->orderBy('position','asc')->get();
		return view('admin.catalog.category.subcategorylist',compact('motherCategories'));
	}

	public function changeSubVisibilityEnable(Request $request){
		$category = SubCategory::where('entity_id',request('subCatID'))->first();
		$category->update([
			'visibility'=>1
		]);


		$motherCategories = Category::with('subCategories')->orderBy('position','asc')->get();
		return view('admin.catalog.category.subcategorylist',compact('motherCategories'));
	}

	public function showCategoryDetail(Request $request){
		$category = Category::where('entity_id',request('catID'))->first();


		// $motherCategories = Category::where('parent_id',null)->orderBy('position','asc')->get();
		return view('admin.catalog.category.categorydetails',compact('category'));
		return "working";
	}

	public function showSubCategoryDetail(Request $request){
		$subCategory = SubCategory::where('entity_id',request('subCatID'))->first();


		// $motherCategories = Category::where('parent_id',null)->orderBy('position','asc')->get();
		return view('admin.catalog.category.subcategorydetails',compact('subCategory'));
		return "working";
	}

	public function updateCategory(Request $request){
		$name 			= request('catName');
		$category 	= Category::where('entity_id',request('catID'))->first();

		if (request('status') == 'on') {
			$status = 1;
		}
		else{
			$status = 0;
		}

		$updated = $category->update([
			'name'			=> $name,
			'visibility'	=> $status,
		]);
		if ($updated) {
			return redirect()->back()->with('success','Category has been updated');		
		}
		else{
			return redirect()->back()->with('failed','Failed to update');
		}
	}
	public function updateSubCategory(Request $request){
		$name 			= request('subcatName');
		$subcategory 	= SubCategory::where('entity_id',request('subCatID'));

		if (request('status') == 'on') {
			$status = 1;
		}
		else{
			$status = 0;
		}

		$updated = $subcategory->update([
			'name'			=> $name,
			'visibility'	=> $status,
		]);
		if ($updated) {
			return redirect()->back()->with('success','Sub Category has been updated');		
		}
		else{
			return redirect()->back()->with('failed','Failed to update');
		}
	}

	public function deleteCategory(Request $request){
		$category 	= Category::where('entity_id',request('catID'))->delete();

		$motherCategories = Category::orderBy('position','asc')->get();
		return view('admin.catalog.category.categorylist',compact('motherCategories'));
	}

	public function deleteSubCategory(Request $request){
		$subCategory 	= SubCategory::where('entity_id',request('subCatID'))->delete();

		$motherCategories = Category::with('subCategories')->orderBy('position','asc')->get();
		return view('admin.catalog.category.subcategorylist',compact('motherCategories'));
	}
}
