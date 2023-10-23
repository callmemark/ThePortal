@include('components/header')
@include('themes/theme-initializer')
@include('components/sidebar')


<!-- Add student Icon -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@64,400,0,0" />


<!-- Studetn List Icon -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


<!-- Enroll Student Icon -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


<!-- Grade Student -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />




<div class="content-col">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<p class="theme-header-3">Student Manager Menu</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="menu_icon_container d-flex justify-content-center">

					<form class="theme-panel-menu" action={{route('dashboard')}} mehtod="get">
						@csrf
						@method('get')
						<button type="submit" class='btn theme-menu-icons'>
							<div class="theme-panel-menu-icon">
								<span class="material-symbols-outlined material-icons theme-panel-icon-menu">
									patient_list
								</span>
							</div>
							<p class='theme-panel-menu-label'>Students List</p>
						</button>
					</form>

					<form class="theme-panel-menu" action={{route('dashboard')}} mehtod="get">
						@csrf
						@method('get')
						<button type="submit" class='btn theme-menu-icons'>
							<div class="theme-panel-menu-icon">
								<span class="material-symbols-outlined material-icons theme-panel-icon-menu">
									group_add
								</span>
							</div>
							<p class='theme-panel-menu-label'>Register New Student</p>
						</button>
					</form>

					<form class="theme-panel-menu" action={{route('dashboard')}} mehtod="get">
						@csrf
						@method('get')
						<button type="submit" class='btn theme-menu-icons'>
							<div class="theme-panel-menu-icon">
								<span class="material-symbols-outlined material-icons theme-panel-icon-menu">
									history_edu
								</span>
							</div>
							<p class='theme-panel-menu-label'>Enroll Student</p>
						</button>
					</form>

					<form class="theme-panel-menu" action={{route('dashboard')}} mehtod="get">
						@csrf
						@method('get')
						<button type="submit" class='btn theme-menu-icons'>
							<div class="theme-panel-menu-icon">
								<span class="material-symbols-outlined material-icons theme-panel-icon-menu">
									credit_score
								</span>
							</div>
							<p class='theme-panel-menu-label'>Update Grade</p>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>	


@include('components/footer')