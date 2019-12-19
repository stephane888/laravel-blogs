<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $page_title ?? 'Laravel' }}</title>

<!-- Google Font: Source Sans Pro -->
<link
	href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
	rel="stylesheet">

<!-- Styles -->
<link
	href="{{ asset('/laravel-blogs/adminTLE/plugins/fontawesome-free/css/all.min.css') }}"
	rel="stylesheet">
<link
	href="{{ asset('/laravel-blogs/adminTLE/dist/css/adminlte.min.css') }}"
	rel="stylesheet">
	<!-- Toastr -->
  <link rel="stylesheet" href="/laravel-blogs/adminTLE/plugins/toastr/toastr.min.css">
<link
	href="{{ asset('/laravel-blogs/adminTLE/css/style.css') }}"
	rel="stylesheet">
	<!-- jQuery -->
  <script src="{{ asset('/laravel-blogs/adminTLE/plugins/jquery/jquery.min.js') }}"></script>

	<!-- Toastr -->
	<script src="{{ asset('/laravel-blogs/adminTLE/plugins/toastr/toastr.min.js') }}"></script>

<!-- style -->
@stack('styles')
</head>
<body class="@yield('body_class', 'hold-transition sidebar-mini') text-sm">

	<div class="wrapper">
		@yield('content')
	</div>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('/laravel-blogs/adminTLE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/laravel-blogs/adminTLE/dist/js/adminlte.min.js') }}"></script>





	<!-- Script -->
	@stack('scripts')
</body>
</html>