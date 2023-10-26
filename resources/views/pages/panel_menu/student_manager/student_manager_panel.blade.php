@include('components/header')
@include('themes/theme-initializer')
@include('components/sidebar')

<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/content_panel.css') }}">
<link rel="stylesheet" href={{ asset('css/classic_theme.css') }}>



<!-- Add student Icon -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@64,400,0,0" />


<!-- Studetn List Icon -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


<!-- Enroll Student Icon -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


<!-- Grade Student -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />



@include('components/panel_header', ["header" => "Student Manager"])
<div class="panel">
	<div class="container-fluid">
		<div class="subpanel">
			@include('pages/panel_menu/student_manager/panel_menu')

			@include('pages/forms/student_register_page')
		</div>
	</div>
</div>	


@include('components/footer')