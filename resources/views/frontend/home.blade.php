@extends('layouts.app')

@section('title', 'Ionic LMS')
@section('content')
	@include('frontend.section.welcome')
	@include('frontend.section.popular-course')
	@include('frontend.section.blog')
@endsection
