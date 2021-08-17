@extends('admin.layouts.app')
@section('title', __("ArtCam Login"))
@section('body-class', __("admin-login-body"))
@section('admin_content')
<div class="admin-login">
	<div class="admin-login-container">
		<header class="login-header">
			<a href="" data-edition="Community Edition" class="logo">
				<img class="logo-img" src="images/logo.png" alt="ArtCam Logo" title="OneStylife Admin Logo">
			</a>
		</header>
		<div class="admin-content">
			<form  method="post" action="{{route('admin.login.action')}}" id="login-form" autocomplete="off" novalidate="novalidate">
				@csrf
				<fieldset class="form-group admin_fieldset">

					@if(session()->has('warning'))
					<div class="alert alert-warning" role="alert">
						{{ session()->get('warning') }}
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
					<legend>{{ __('Welcome, please sign in') }}</legend>
					@endif
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" value="{{ old('email') }}">
					<div style="height: 28px;"></div>
					<label for="email">Password</label>
					<input type="password" name="password" class="form-control">
				</fieldset>
				<fieldset class="action-bar">
					<div class="forgot-pass-link">
						<a href="">Forgot Your Password?</a>
					</div>
					<div style="height: 28px;"></div>
					<input type="submit" class="action-button" value="{{ __('LOGIN') }}">
				</fieldset>
			</form>
		</div>
	</div>
</div>
<footer class="login-footer">
		<p class="copyright">{{ __('Copyright') }} © 2020-{{date("Y")}} {{ __('Core Internet Technologies Limited All Rights Reserved.') }}</p></footer>
@endsection