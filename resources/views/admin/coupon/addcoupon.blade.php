@extends('admin.index')
@section('title', __("Add New Coupon / artcam"))
@section('content')
<div class="upload-product">
	<form action="" method="post" enctype="multipart/form-data">
		@csrf
		<div class="grid-head">
			<div style="height: 15px;"></div>
			<div class="head-content row">
				<div class="col-sm-4 text-left d-flex align-items-center">
					<h5>{{ __('Update Coupon') }}</h5>
				</div>
				<div class="col-sm-8">
					<a href="{{ route('admin.coupon.grid',array('session_id'=>session()->getId())) }}" class="btn action-button mr-1"><i class="fas fa-arrow-left"></i>&#9; Back</a>
					<input type="submit" name="clicked_update_btn" value="Store" class="btn action-button">
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
							<label for="inputName" class="col-sm-4 col-form-label text-right required">{{ __('Coupon Name') }}</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="name" id="inputName" value="{{old('name')}}" required>
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
						<div class="form-group row">
							<label for="inputCode" class="col-sm-4 col-form-label text-right">{{ __('Select Product') }}</label>
							<div class="col-sm-8">
								<select name="product_id" value="{{old('coupon_code')}}" id="" class="form-control p-2">
									<option value="">NONE</option>
									@foreach ($products as $key => $product)
									<option value="{{$product->entity_id}}">{{$product->name}} ~ {{$product->medias[0]->file}} ~ {{$product->meta_keyword}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputCode" class="col-sm-4 col-form-label text-right required">{{ __('Coupon Code') }}</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="coupon_code" id="inputCode" value="{{old('coupon_code')}}" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputName" class="col-sm-4 col-form-label text-right required">Uses Limit</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" min="1" name="limit" id="inputCode" value="{{old('limit')}}" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputName" class="col-sm-4 col-form-label text-right required">Expiration Date</label>
							<div class="col-sm-8">
								<input type="date" class="form-control" min="1" name="expiration_date" id="inputCode" value="{{old('expiration_date')}}" required>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</form>
</div>
@endsection