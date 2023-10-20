@include('components/header')



<style>
        
	.signin-page{
	    height: 100vh;
	}
	#form-headline{
		font-weight: bolder;
		font-size: 7rem;
	}
	#sub-for4m-headline{
		font-weight: bolder;
		font-size: 3rem;
	}
	.error{
		color: red;
		font-weight: bold;
	}
	a{
		text-decoration: none;
		color: white;
	}
	#landing-page-cover{
		width: 70%;
	}
</style>

<div class='container'>
	<div class='row'>
		<div class='col-md-6 d-flex flex-column align-items-center justify-content-center'>
			<img src={{asset("images/landing_page_cover.svg")}} alt='Landing page cover' id='landing-page-cover'>
			<p id='form-headline' class='text-color-main'><span id='sub-for4m-headline'>The </span> Portal</p>
		</div>

		<div class='col-md-6 signin-page d-flex flex-column align-items-center justify-content-center'>
			<h4>SignUp</h4>

				
				@if($errors -> any())
					@foreach($errors -> all() as $err)
						<div class="card">
							  <h5 class="card-header">Errors</h5>
							  <div class="card-body">
								<p class="card-text error">{{$err}}</p>
							</div>
						</div>
					@endforeach
				@endif

				@if(session() -> has('error'))
					<p class='error'>
						{{session() -> get('error')}}
					</p>
				@endif
			  

			<form action={{route('user.create')}} method='post'>
				@csrf
				@method('post')

				<label class='form-label'>First Name</label>
				<input type='text' class='form-control' name='firstname' required>

				<label class='form-label'>Middle Name</label>
				<input type='text' class='form-control' name='middlename' required>

				<label class='form-label'>Last Name</label>
				<input type='text' class='form-control' name='lastname' required>

				<label class='form-label'>Email</label>
				<input type='email' class='form-control' name='email' required>

				<label class='form-label'>Password</label>
				<input type='password' class='form-control' name='password' required>

				<label class='form-label'>Account Type</label>
				<select class="form-select" aria-label="role" name='role'>
					<option value='student' selected>Student</option>
					<option value="teacher">teacher</option>
					<option value="admin">Admin</option>
				</select>

				<button class='btn btn-themed mt-3' type='submit'>Create Account</button>
				<button class='btn btn-secondary mt-3' type='link'>
				<a href={{route('signin.form')}} /> SignIn </button>
			</form>
		</div>
	</div>
</div>


@include('components/footer')