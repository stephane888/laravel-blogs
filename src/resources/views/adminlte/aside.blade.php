<!-- aside -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('laravel-blogs/adminTLE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Blogs PRO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    	<!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('laravel-blogs/adminTLE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
            </div>
          </div>
      <!-- Sidebar Menu  -->
    	<nav class="mt-2">
    		@component('HtmlComponents::HtmlComponents.Bootstrap4.NavbarNav',
    		[
    			'items'=>$aside_menu,
    			'navbarNav_class'=>'nav nav-pills nav-sidebar flex-column text-sm nav-legacy ',
    			'navbarNav_attrib'=>'data-widget="treeview" role="menu" data-accordion="false"'
    		] ) @endcomponent
    	</nav>
    </div>
</aside>
<!-- ./aside -->