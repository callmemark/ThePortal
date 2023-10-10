@include('components/header')


<style>
	.signin-page{
		height: 100vh;
	}
	#form-headline{
		font-weight: bolder;
		font-size: 5rem;
	}
	#sub-for4m-headline{
		font-weight: bolder;
		font-size: 3rem;
	}
	a{
		text-decoration: none;
		color: white;
	}
	#landing-page-cover{
		width: 70%;
	}
</style>

<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-6 d-flex flex-column align-items-center justify-content-center'>
			<img src={{asset("images/landing_page_cover.svg")}} alt='Landing page cover' id='landing-page-cover'>
			<p id='form-headline' class='text-color-main'><span id='sub-for4m-headline'>The </span> Portal</p>
		</div>

		<div class='col-md-6 signin-page d-flex flex-column align-items-center justify-content-center'>
			<h4 class='text-color-main'>SignIn</h4>
			<div class='err_handler'>
				
				@if($errors -> any())
					@foreach($errors -> all() as $err)
						<p class='text-color-error'>{{$err}}</p>
					@endforeach
				@endif

				@if(session()->has('success'))
					<p >{{session('success')}}</p>
				@endif

				@if(session()->has('error'))
					<p class='text-color-error'>{{session('error')}}</p>
				@endif
				
			</div>
			<form action={{route('user.signin')}} method='post'>
				@csrf
				@method('post')

				<label class='form-label'>Email</label>
				<input type='email' class='form-control' name='email' required>

				<label class='form-label'>Password</label>
				<input type='password' class='form-control' name='password' required>

				<label class='form-label'>Account Type</label>

				<select class="form-select" aria-label="account-type" name='account-type'>
					<option value='student' selected>Student</option>
					<option value="admin">Admin</option>
				</select>

				<button class='btn btn-themed mt-3' type='submit'>SignIn</button>
				<button class='btn btn-secondary mt-3' type='link'>
				<a href={{route('signup.form')}} /> SignUp </button>
			</form>
		</div>
	</div>
</div>


@include('components/footer')