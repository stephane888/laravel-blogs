@extends('LaravelBlogs::LaravelBlogs.layout.app')
@section('content')

	@include('LaravelBlogs::adminlte/Navbar')

	@include('LaravelBlogs::adminlte/aside')

  @include('LaravelBlogs::adminlte/content')

  @include('LaravelBlogs::adminlte/aside-control-sidebar')

  @include('LaravelBlogs::adminlte/footer')
  @push('styles')
  	<link href="{{ asset('/laravel-blogs/adminTLE/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
  	<link href="{{ asset('/laravel-blogs/adminTLE/plugins/datetimepicker/build/jquery.datetimepicker.min.css') }}" rel="stylesheet">
  @endpush
  @push('scripts')
    <script src="{{ asset('/laravel-blogs/adminTLE/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('/laravel-blogs/adminTLE/plugins/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
      $(function () {
        // Summernote
        $('.textarea').summernote();
        //
        var currentDate = jQuery('.datetimepicker').val();
        jQuery('.datetimepicker').datetimepicker({
					value: currentDate,
					format: 'd/m/Y H:i',
					mask:true,
        });
      })
	</script>
	@endpush
@endsection