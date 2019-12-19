<!-- Navbar -->
@component('HtmlComponents::HtmlComponents.Bootstrap4.Navbar',
		[
			'navbar_class' => 'main-header navbar-expand navbar-white navbar-light',
			'show_logo' => false,
			'show_collapse'=> false,
			'show_bugger'=>false,
			'navbar_container'=>false,
		]
	)
    @component('HtmlComponents::HtmlComponents.Bootstrap4.NavbarNav', ['items'=>$items] ) @endcomponent
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <form id="logout-form-adminlte" action="/logout" method="POST" style="display: none;">@csrf</form>
    @php
    $items2=[

    	[
                'title'=>'<i class="fas fa-th-large"></i>',
                'link'=>'#',
                'html'=>true,
                'active'=>false,
                'class'=>'',
                'icon_before'=>'',
                'icon_after'=>'',
                'external'=>false,
                'tag'=>false,
      ],
      [
                'title'=>'<i class="fas fa-power-off text-success"></i>',
                'link'=>'#',
                'html'=>true,
                'active'=>false,
                'class'=>'',
                'icon_before'=>'',
                'icon_after'=>'',
                'external'=>false,
                'tag'=>false,
                'attrib'=>'onclick="event.preventDefault(); document.getElementById(\'logout-form-adminlte\').submit();"'
      ],
    ]
    @endphp
    @component('HtmlComponents::HtmlComponents.Bootstrap4.NavbarNav', ['items'=>$items2, 'navbarNav_class'=>'ml-auto'] ) @endcomponent
	@endcomponent
<!-- ./Navbar -->