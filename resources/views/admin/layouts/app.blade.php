{{-- geting current local variable --}}
<?php $local= Config::get('app.locale') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="Shop online in Bangladesh" />
	<meta name="keywords" content="Shop online in Bangladesh" />
	<meta name="robots" content="INDEX,FOLLOW" />
	<meta name="title" content="Shop online in Bangladesh with best deals for Grocery" />
	<meta name="viewport" content="width=1024" />
	<meta name="format-detection" content="telephone=no" />
	<title>@yield('title')</title>

	<link href='/img/favicon.png' rel='shortcut icon' type='image/x-icon' />
	<link href='/img/favicon.png' rel='shortcut icon' type='image/png' />
	<link href='/img/favicon.png' rel='apple-touch-icon-precomposed'/>
	<link href='/img/favicon.png' sizes='114x114' rel='apple-touch-icon-precomposed'/>
	<link href='/img/favicon.png' sizes='72x72' rel='apple-touch-icon-precomposed'/>
	<link href='/img/favicon.png' sizes='144x144' rel='apple-touch-icon-precomposed'/>
	<link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/fontawesome.all.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-touch-slider.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/admin/app.css') }}" type="text/css">
	{{-- <link rel="stylesheet" href="{{ asset('css/admin/styles.css') }}" type="text/css"> --}}
	<link rel="stylesheet" href="{{ asset('css/admin/datepicker.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="@yield('body-class')">
	{{-- include main pagecontent --}}
	@yield('admin_content')
	{{-- loading javascript resources --}}
	<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.13.2/TweenMax.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/fontawesome.all.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-touch-slider.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/custom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('js/admin/nicEdit.js') }}"></script>
	{{-- <script type="text/javascript">
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	</script> --}}

</body>
</html>