@extends('LaravelBlogs::LaravelBlogs.layout.app')
@section('content')

	@include('LaravelBlogs::adminlte/Navbar')

	@include('LaravelBlogs::adminlte/aside')

  @include('LaravelBlogs::adminlte/content')

  @include('LaravelBlogs::adminlte/aside-control-sidebar')

  @include('LaravelBlogs::adminlte/footer')
@endsection