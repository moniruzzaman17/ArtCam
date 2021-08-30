@extends('layouts.app')
@section('title', __('ArtCam'))
@section('body-class', 'artcam-home')

@section('content')
@include('catalog.home')
<!-- Modal -->
<div class="modal fade" id="downloadwithCouponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Enter Valid Coupon to Download this File</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row">

					<div class="alert alert-danger" id="warning" style="display:none;" role="alert"></div>
					<div class="alert alert-success" id="success" style="display:none;" role="alert"></div>
					<label for="CouponCode" class="col-sm-4 col-form-label text-right required">{{ __('Coupon Code') }}</label>
					<div class="col-sm-8 datarow">
						<input type="hidden" class="productID" readonly>
						<input type="text" class="form-control p-2" id="CouponCode" required>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary verifiedDownloadBtn">Download</button>
			</div>
		</div>
	</div>
</div>
@endsection