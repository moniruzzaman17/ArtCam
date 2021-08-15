@extends('layouts.app')
@section('title', __('ArtCam'))
@section('body-class', 'artcam-home')
@section('content')
@include('catalog.home')
@endsection