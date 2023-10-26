@include('components/header')
@include('themes/theme-initializer')
@include('components/sidebar')


<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/content_panel.css') }}">
<link rel="stylesheet" href={{ asset('css/classic_theme.css') }}>


@include('components/panel_header', ["header" => "Student Manager"])
<div class="panel">
	<div class="container-fluid">
		
	</div>
</div>




@include('components/footer')