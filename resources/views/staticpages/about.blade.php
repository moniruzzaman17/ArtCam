@extends('layouts.app')
@section('title', __('About ArtCam'))
@section('body-class', 'artcam-aboutus')

@section('content')
<div class="text-justify p-5">
	<h5>About Us</h5>
	{!! $about !!}
</div>
@endsection