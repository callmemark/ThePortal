@include('components/header')
@include('themes/theme-initializer')
@include('components/sidebar')

<link rel="stylesheet" href="{{ asset('css/content_panel.css') }}">
<link rel="stylesheet" href={{ asset('css/classic_theme.css') }}>


<div class="panel">
	<div class="container-fluid">
		@include('components/panel_header', ["header" => "User Dashboard"])
	</div>
</div>	


@include('components/footer')