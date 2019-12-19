@isset($page_content)

	@foreach($page_content as $section_content)
		@if($section_content['model']=='list')
			@component('HtmlComponents::HtmlComponents.Bootstrap4.ListComplex',
				[
					'ListComplex'=>$section_content,
					'CustomClass'=>(@isset($section_content['CustomClass']))?$section_content['CustomClass']:'mw-1000',
				] )
			@endcomponent
		@endif
	@endforeach

@endisset