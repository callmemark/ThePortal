@include('components/header')
@include('themes/theme-initializer')


<style type="text/css">
	#page-title{
		text-align: center;
		font-size: 5rem;
	}
</style>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<p id="page-title">THE PORTAL</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 d-flex flex-row align-items-center justify-content-center">
			<div class="theme-cardify">
				<p>Admin Account</p>
				<div class="card-cover-image">
					
				</div>
				<form action={{route('login.admim.create')}} method="get">
					@csrf 
					@method('get')
					
					<button class="theme-btn theme-btn-primary">Login Page</button>
				</form>
			</div>	
		</div>

		<div class="col-md-3 d-flex flex-row align-items-center justify-content-center">
			<div class="theme-cardify">
				<p>Student Account</p>
				<div class="card-cover-image">
					
				</div>
				<form action={{route('student.login.create')}} method="get">
					@csrf 
					@method('get')
					
					<button class="theme-btn theme-btn-primary">Login Page</button>
				</form>
			</div>	
		</div>

		<div class="col-md-3 d-flex flex-row align-items-center justify-content-center">
			<div class="theme-cardify">
				<p>Instructor Account</p>
				<div class="card-cover-image">
					
				</div>
				<form action={{route('instructor.login.create')}} method="get">
					@csrf 
					@method('get')
					
					<button class="theme-btn theme-btn-primary">Login Page</button>
				</form>
			</div>	
		</div>

		<div class="col-md-3 d-flex flex-row align-items-center justify-content-center">
			<div class="theme-cardify">
				<p>Parent Account</p>
				<div class="card-cover-image">
					
				</div>
				<form action="#" method="get">
					@csrf 
					@method('get')

					<button class="theme-btn theme-btn-primary">Login Page</button>
				</form>
			</div>	
		</div>
	</div>
</div>


@include('components/footer')