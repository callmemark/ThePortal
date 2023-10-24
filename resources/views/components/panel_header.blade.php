<!-- User Icon Placeholder --> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


<div class="row sticky-top panel-topbar">
	<div class="col-md-6 d-flex align-items-center justify-content-start">
		<p class="theme-section-title title-nm">{{$header}}</p>
	</div>

	<div class="col-md-6 d-flex align-items-center justify-content-end">
		<p class="material-symbols-outlined material-icons theme-panel-icon-user">
			account_circle
		</p>
		<p>{{session('user_data') -> first_name}}</p>
	</div>	
</div>