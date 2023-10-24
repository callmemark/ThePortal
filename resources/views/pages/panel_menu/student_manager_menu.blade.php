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






<div class="panel">
	<div class="container-fluid">

		@include('components/panel_header', ["header" => "Student Manager"])

		<div class="subpanel">
			<div class="row">
				<div class="col-md-8">
					<div class="menu_icon_container d-flex justify-content-center">

						@include("components/panel_selection_menu", [
							"destination" => "dashboard",
							"material_icon_name" => "patient_list",
							"btton_Name" => "Student List"
							])

						@include("components/panel_selection_menu", [
							"destination" => "student.register.create",
							"material_icon_name" => "group_add",
							"btton_Name" => "Register New Student"
							])

						@include("components/panel_selection_menu", [
							"destination" => "dashboard",
							"material_icon_name" => "history_edu",
							"btton_Name" => "Enroll Student"
							])

						@include("components/panel_selection_menu", [
							"destination" => "dashboard",
							"material_icon_name" => "credit_score",
							"btton_Name" => "Update Grade"
							])

					</div>
				</div>


				<div class="col-md-4">
					<div class="theme-cardify">
						<h5>Registered Student</h5>
						<h6>5208</h6>
					</div>
					<div class="theme-cardify">
						<h5>Enrolled Student</h5>
						<h6>3208</h6>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>	


@include('components/footer')