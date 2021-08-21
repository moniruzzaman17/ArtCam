@extends('admin.index')
@section('title', __('Configuration / ArtCam'))
@section('body-class', 'artcam-configuration')
@section('content')

<div class="grid-container">
	<form action="" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="grid-head">
			<div style="height: 15px;"></div>
			<div class="head-content row">
				<div class="col-sm-4 text-left">
					<h4>Configuration</h4>
				</div>
				<div class="col-sm-8">
					<a href="{{route('admin.home',array('session_id'=>session()->getId()))}}" class="btn action-button mr-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>{{ __(' Back') }}</a>
					<input type="submit" value="Save Configuration" class="btn action-button mr-2">
				</div>
			</div>
		</div>
		@if(session()->has('success'))
		<div class="alert alert-success" role="alert">
			<i class="fa fa-check" aria-hidden="true"></i>  {{ session()->get('success') }}
		</div>
		@elseif(session()->has('failed'))
		<div class="alert alert-danger" role="alert">
			<i class="fa fa-times" aria-hidden="true"></i>  {{ session()->get('failed') }}
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
				{{-- <input type="hidden" name="configID" value="{{request('role_id')}}"> --}}
				<div class="col-sm-7 m-auto">
					<div class="form-group row">
						<label for="inputName" class="col-sm-3 col-form-label text-right required">Company Name</label>
						<div class="col-sm-9">
							{{-- <input type="text" name="userName" class="form-control" id="inputName" value="{{$configration['appName']}}" required> --}}
							<div class="input-group d-flex align-items-center">
								<input type="text" name="company_name" class="form-control inputText" value="{{$configration['appName']}}" readonly required>
								<div class="input-group-append">
									<span class="input-group-text" id="basic-addon2"><span class="editIcon" style="cursor: pointer;"><i class="fas fa-edit"></i></span></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputName" class="col-sm-3 col-form-label text-right required">Company Logo</label>
						<div class="col-sm-9">
							<input type="hidden" name="oldLogo" value="{{$configration['logo']}}">
							<div class="input-group d-flex align-items-center">
								<img style="width: 50px;" src="{{asset('images/'.$configration['logo'])}}" alt="">
								<input type="file" name="logo">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputName" class="col-sm-3 col-form-label text-right required">About Company</label>
						<div class="col-sm-9">
							{{-- <input type="text" name="userName" class="form-control" id="inputName" value="{{$configration['appName']}}" required> --}}
							<div class="input-group d-flex align-items-center">
								<textarea name="about" class="form-control  inputText" id="" cols="30" rows="10" required readonly>{{$configration['about']}}</textarea>
								<div class="input-group-append">
									<span class="input-group-text" id="basic-addon2"><span class="editIcon" style="cursor: pointer;"><i class="fas fa-edit"></i></span></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection