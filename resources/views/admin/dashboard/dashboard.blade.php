
<div class="daily-order-section">
	<h5 class="box-title">OVERVIEW</h5>
	<div class="finance-overview row w-100 m-auto justify-content-center">
		<div class="col-md-3">
			<div class="block green">
				<div class="heading d-flex align-items-center justify-content-center">
					Total Product
				</div>
				<div class="num">৳ <span class="countNumber">{{$productSummery['total']}}</span></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="block green">
				<div class="heading d-flex align-items-center justify-content-center">
					Active Product
				</div>
				<div class="num">৳ <span class="countNumber">{{$productSummery['active']}}</span></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="block green">
				<div class="heading d-flex align-items-center justify-content-center">
					InActive Product
				</div>
				<div class="num">৳ <span class="countNumber">{{$productSummery['inactive']}}</span></div>
			</div>
		</div>
	</div>
</div>