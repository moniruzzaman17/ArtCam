<form action="{{route('admin.category.update',array('session_id'=>session()->getId()))}}" method="post" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="catID" value="{{$category->entity_id}}">
	<div class="modal-body">
		<div class="form-group row">
			<label for="inputName" class="col-sm-3 col-form-label text-right required">{{ __('Category Name') }}</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="catName" id="inputName" value="{{$category->name}}" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputStatus" class="col-sm-3 col-form-label text-right required">{{ __('Visibility') }}</label>
			<div class="col-sm-9 d-flex">
				@if($category->visibility == 1)
				<label class="switch">
					<input type="checkbox" name="status" checked>
					<span class="slider round"></span>
				</label>
				@else
				<label class="switch">
					<input type="checkbox" name="status">
					<span class="slider round"></span>
				</label>
				@endif
			</div>
		</div>
		{{-- <div class="form-group row">
			<label for="" class="col-sm-3 col-form-label text-right">Category Product</label>
			<div class="col-sm-9 d-flex align-items-center">
				<table class="table table-striped">
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Item Code</th>
					</tr>
					<tr>
						<td>
							<img style="width: 30px;" src="/p/" alt="">
						</td>
						<td>
							Product name
						</td>
						<td>
							itm001
						</td>
					</tr>
				</table>
			</div>
		</div> --}}
		<div class="form-group row">
			<label for="" class="col-sm-3 col-form-label text-right"></label>
			<div class="col-sm-9 d-flex align-items-center">
				<input type="submit" class="action-button" name="updatCatBtn" value="Update">
			</div>
		</div>
	</form>