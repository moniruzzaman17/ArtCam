<div class="footer container-fluid">  <!-- Site footer -->
	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<h6>About</h6>
					<p class="text-justify">{!! $config['about'] !!}</p>
				</div>

				<div class="col-xs-6 col-md-3">
					<h6>Categories</h6>
					<ul class="footer-links">
						@foreach ($categories as $key => $category)
						<li><a href="{{route('category',["type"=>"category","id"=>$category->entity_id])}}">{{$category->name}}</a></li>
						@endforeach
					</ul>
				</div>

				<div class="col-xs-6 col-md-3">
					<h6>Quick Links</h6>
					<ul class="footer-links">
						<li><a href="{{route('about')}}">About Us</a></li>
					</ul>
				</div>
			</div>
			<hr>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<p class="copyright-text">Copyright &copy; {{date('Y')}} All Rights Reserved by 
						<a href="#">Sharwar Zahan</a> & Developed by <a href="">Md. Moniruzzaman</a>.
					</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12">
					<ul class="social-icons">
						<li><a class="facebook" href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						{{-- <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>    --}}
					</ul>
				</div>
			</div>
		</div>
	</footer>
</div>