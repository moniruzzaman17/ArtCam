@extends('admin.index')
@section('title', __('Admin Coupon Grid / ArtCam'))
@section('body-class', 'artcam-coupon-grid')
@section('content')
<div class="grid-head">
	<div style="height: 15px;"></div>
	<div class="head-content row">
		<div class="col-sm-4 text-left d-flex align-items-center">
			<h5>{{ __('Coupons') }}</h5>
		</div>
		<div class="col-sm-8">
			<a href="{{ route('admin.coupon.add',array('session_id'=>session()->getId())) }}" class="btn action-button mr-auto"><i class="fas fa-plus" aria-hidden="true"></i>{{ __(' Add New Coupon') }}</a>
		</div>
	</div>
	<div style="height: 15px;"></div>
	<div class="order-filter-head">
		<div class="grid-filter w-25">
			<div style="height: 30px;"></div>
			<div class="top">
				<form action="" method="post">
					<div class="input-group grid-search-input-group">
						<input type="text" class="form-control search-box" id="adminCouponFilter" placeholder="Start Typing to Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
							{{-- <div class="input-group-append">
								<span class="input-group-text" id="basic-addon">
									<button type="submit" class="search-btn"><i class="fas fa-search" for="#butn"></i></button>
								</span>
							</div> --}}
						</div>
					</form>
				</div>
				{{-- <p>{{count($orders)}} {{__('Records Found')}}</p> --}}
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
	<div class="product-grid-body mt-2">
		<div class="table-responsive">
			<table class="table adminCouponTable">
				<thead>
					<th>{{__('ID')}}</th>
					<th>{{__('Name')}}</th>
					<th>{{__('Product ID')}}</th>
					<th>{{__('Coupon Code')}}</th>
					<th>{{__('Uses Limit')}}</th>
					<th>{{__('Time Used')}}</th>
					<th>{{__('Status')}}</th>
					<th>{{__('Expiration Date')}}</th>
					<th>{{__('Action')}}</th>
				</thead>
				<tbody>
					@foreach ($coupons as $key => $coupon)
					<tr>
						<td>{{$coupon->entity_id}}</td>
						<td>{{$coupon->name}}</td>
						<td>{{$coupon->product_id}}</td>
						<td>{{$coupon->code}}</td>
						<td>{{$coupon->uses_limit}}</td>
						<td>{{$coupon->time_used}}</td>
						<td>{{$coupon->visibility==1 ?'Active':'Inactive'}}</td>
						<td>{{$coupon->expiration_date}}</td>
						<td><a href="{{ route('admin.coupon.update',['session_id'=>session()->getId(), 'id'=>$coupon->entity_id]) }}">{{__('More')}}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@endsection