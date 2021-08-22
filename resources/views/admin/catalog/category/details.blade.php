@extends('admin.index')
@section('title', __("Category / artcam"))
@section('content')
<div class="grid-container">
	<div class="grid-head">
		<div style="height: 15px;"></div>
		<div class="head-content row">
			<div class="col-sm-4 text-left">
				<h4>Categories</h4>
			</div>
			<div class="col-sm-8">
				<a href="" class="btn action-button mr-2" data-toggle="modal" data-target="#rootCategoryModal"><i class="fa fa-plus" aria-hidden="true"></i>{{ __(' Root Category') }}</a>

				<a href="" class="btn action-button mr-2" data-toggle="modal" data-target="#subCategoryModal"><i class="fa fa-plus" aria-hidden="true"></i>{{ __(' Sub Category') }}</a>
				{{-- <a href="javascript:void(0)" class="btn action-button mr-2"><i class="fa fa-plus" aria-hidden="true"></i>{{ __(' Sub Category') }}</a> --}}
				{{-- <input type="submit" class="btn action-button" name="updateTopBannerBtn" value="Save Changes"> --}}
			</div>
			<!-- Modal -->
			<div class="modal fade" id="rootCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">New Root Category</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('admin.rootcategory.add',array('session_id'=>session()->getId()))}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="modal-body">
								<div class="form-group row">
									<label for="inputName" class="col-sm-4 col-form-label text-right required">{{ __('Category Name') }}</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="catName" id="inputName" value="" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputStatus" class="col-sm-4 col-form-label text-right required">{{ __('Visibility') }}</label>
									<div class="col-sm-8 d-flex">
										<label class="switch">
											<input type="checkbox" name="status" checked>
											<span class="slider round"></span>
										</label>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" name="rooCatAddBtn" class="btn btn-primary">Create</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="subCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">New Sub Category</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{route('admin.subcategory.add',array('session_id'=>session()->getId()))}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="modal-body">
								<div class="form-group row">
									<label for="inputName" class="col-sm-4 col-form-label text-right required">{{ __('Select Category') }}</label>
									<div class="col-sm-8 text-left">
										@foreach ($motherCategories as $key => $motherCategory)
										<div class="form-check">
											<input class="form-check-input" type="radio" required name="motherCatId" value="{{$motherCategory->entity_id}}" id="flexRadioDefault{{$motherCategory->entity_id}}">
											<label class="form-check-label" for="flexRadioDefault{{$motherCategory->entity_id}}">
												{{$motherCategory->name}}
											</label>
										</div>
										@endforeach

									</div>
								</div>
								<div class="form-group row">
									<label for="inputName" class="col-sm-4 col-form-label text-right required">{{ __('Sub Category Name') }}</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="subcatName" id="inputName" value="" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputStatus" class="col-sm-4 col-form-label text-right required">{{ __('Visibility') }}</label>
									<div class="col-sm-8 d-flex">
										<label class="switch">
											<input type="checkbox" name="status" checked>
											<span class="slider round"></span>
										</label>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" name="rooCatAddBtn" class="btn btn-primary">Create</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if(session()->has('success'))
	<div class="alert alert-success" role="alert">
		<i class="fa fa-check" aria-hidden="true"></i>  {{ session()->get('success') }}
	</div>
	@elseif(session()->has('failed'))
	<div class="alert alert-danger" role="alert">
		<i class="fa fa-times" aria-hidden="true"></i>  {{ session()->get('error') }}
	</div>
	@elseif(session()->has('warning'))
	<div class="alert alert-warning" role="alert">
		<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  {{ session()->get('warning') }}
	</div>
	@elseif ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $message)
			<li>{{ $message }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div style="height: 30px;"></div>
	<div class="details-container">
		<div class="row m-auto">
			<div class="col-sm-5">
				<div class="category-wrapper">
					<h5>Categories</h5>
					<i class="ml-3 p-0 text-danger" style="font-size: 11px;">Drag Category to Change Position & click on eye to change status</i>
					<div class="cat-list">
						@include('admin.catalog.category.categorylist')
					</div>
				</div>
				<div class="sub-category-wrapper mt-3">
					<h5>Sub Categories</h5>
					<i class="ml-3 p-0 text-danger" style="font-size: 11px;">Drag Sub-Category to Change Position & click on eye to change status</i>
					<div class="sub-cat-list">
						@include('admin.catalog.category.subcategorylist')
					</div>
				</div>
			</div>
			<div class="col-sm-7">
				<div class="catDetail-wrapper">
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection