@extends('admin.index')
@section('title', __("Add Product / artcam"))
@section('content')
<div class="upload-product">
	<form action="" method="post" enctype="multipart/form-data">
		@csrf
		<div class="grid-head">
			<div style="height: 15px;"></div>
			<div class="head-content row">
				<div class="col-sm-4 text-left d-flex align-items-center">
					<h5>{{ __('Add new Product') }}</h5>
				</div>
				<div class="col-sm-8">
					<a href="{{ route('admin.product.grid',array('session_id'=>session()->getId())) }}" class="btn action-button mr-1"><i class="fas fa-arrow-left"></i>&#9; Back</a>
					<input type="submit" name="clicked_update_btn" value="Save Product" class="btn action-button">
				</div>
			</div>
		</div>
		@if(session()->has('success'))
		<div class="alert alert-success" role="alert">
			{{ session()->get('success') }}
		</div>
		@elseif(session()->has('error'))
		<div class="alert alert-danger" role="alert">
			{{ session()->get('error') }}
		</div>
		@elseif ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $message)
				<li>{{ $message }}</li>
				@endforeach
			</ul>
		</div>
		@else
		@endif
		<div style="height: 15px;"></div>
		<div class="p-upload-body"> 
			<fieldset class="w-100">
				<div class="row">
					<div class="col-sm-10">
						<div class="form-group row">
							<label for="inputName" class="col-sm-4 col-form-label text-right required">{{ __('Product Name') }}</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="pname" id="inputName" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputStatus" class="col-sm-4 col-form-label text-right required">{{ __('Visibility') }}</label>
							<div class="col-sm-8 d-flex">
								<label class="switch">
									<input type="checkbox" name="status" checked required>
									<span class="slider round"></span>
								</label>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputMeta" class="col-sm-4 col-form-label text-right">{{ __('Meta Keyword') }}</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="meta" id="inputMeta">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputDesc" class="col-sm-4 col-form-label text-right">{{ __('Description') }}</label>
							<div class="col-sm-8">
								<textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputName" class="col-sm-4 col-form-label text-right required">Product Image</label>
							<div class="col-sm-8">
								<div class="input-group d-flex align-items-center">
									<input type="file" name="file" required>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputCat" class="col-sm-4 col-form-label text-right required">{{ __('Categories') }}</label>
							<div class="col-sm-8">
								<ul class="control list-unstyled product_cat_list">

									@foreach ($categories as $key => $category)
									<li id="product_cat-51">
										<input value="{{$category->entity_id}}" type="checkbox" name="product_cat[]" id="in-product_cat-51">
										<label class="selectit font-weight-bold">{{$category->name}}</label>
										<ul class="children list-unstyled ml-4">

											@foreach ($category->subCategories as $key => $subcategory)
											<li id="product_cat-52">
												<input value="{{$subcategory->entity_id}}" type="checkbox" name="product_subcat{{$category->entity_id}}[]" id="in-product_cat-52">
												<label class="selectit">{{$subcategory->name}}</label>
											</li>
											@endforeach
										</ul>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</form>
</div>
<script>
	var checkboxes = document.querySelectorAll('input.subOption'),
	checkall = document.getElementById('option');

	for(var i=0; i<checkboxes.length; i++) {
		checkboxes[i].onclick = function() {
			var checkedCount = document.querySelectorAll('input.subOption:checked').length;

			checkall.checked = checkedCount > 0;
			checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
		}
	}

	checkall.onclick = function() {
		for(var i=0; i<checkboxes.length; i++) {
			checkboxes[i].checked = this.checked;
		}
	}


</script>
@endsection

