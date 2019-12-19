<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 mt-1 mb-2 text-dark">{{ $page_title ?? 'Start page' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $page_title ?? '' }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <section class="content">
			<div class="container-fluid d-inline-block w-100">
			@if(Session::has('success'))
        <script type="text/javascript">
    			toastr.options = {
    					"closeButton": true,
    					  "debug": false,
    					  "newestOnTop": true,
    					  "progressBar": true,
    					  "positionClass": "toast-top-right",
    					  "preventDuplicates": false,
    					  "onclick": null,
    					  "showDuration": "300",
    					  "hideDuration": "1000",
    					  "timeOut": "10000",
    					  "extendedTimeOut": "1000",
    					  "showEasing": "swing",
    					  "hideEasing": "linear",
    					  "showMethod": "fadeIn",
    					  "hideMethod": "fadeOut"
    			}
    			toastr["success"]("{{Session::get('success')}}");
  			</script>
  		@endif

  		{{-- Forms for content type --}}
			@if(!empty($formAddContentType))
				@component('HtmlComponents::HtmlComponents.Bootstrap4.FormHorizontal',
				[
					'inputs'=>$formAddContentType,
				] )
				@endcomponent

			{{-- Forms for articles --}}
			@elseif(!empty($formAddContents))
				@component('HtmlComponents::HtmlComponents.Bootstrap4.FormHorizontal',
				[
					'inputs'=>$formAddContents,
				] )
				@endcomponent
			@endif

			{{-- Builder content --}}
			@include('LaravelBlogs::adminlte.contentBuilder')

			</div>
    </section>
</div>
<!-- /.Content Wrapper -->