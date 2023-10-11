<?php 
	$role = session() -> get('role');
	if($role == 'admin'){
		$user_data = auth() -> guard('admin') ->user();
	} else if($role == 'student'){
		$user_data = auth() -> guard('student') ->user();
	}
?>

@include('components/header')
@include('components/sidebar')


<div class='mobile-page'>
	<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<p class='heading-title'>User Dashboard</p>
				<p id="user-name">User Name: {{$user_data -> firstname}} {{$user_data -> middlename}} {{$user_data -> lastname}}</p>
				<p id='permission-name'>Permission: {{$user_data -> role}}</p>
			</div>
		</div>

		@if(session()->has('error'))
		<div class='row'>
			<div class='col-md-12'>
				<div class='card cardify'>
					<p class='heading-secondary text-color-error'>Note!</p>
					<p>{{session()->get('error')}}</p>
				</div>
			</div>
		</div>
		@endif

		@if(session()->has('success'))
		<div class='row'>
			<div class='col-md-12'>
				<div class='card cardify'>
					<p class='heading-secondary text-color-main'>Note!</p>
					<p>{{session()->get('success')}}</p>
				</div>
			</div>
		</div>
		@endif

		<div class='row'>
			<div class='col-md-6'>
				<div class='card cardify lift occupy-height flex-center-all-col'>
					<form action={{route('user.update.email', ['user_data' => $user_data])}} method='post'>
						@csrf
						@method('post')

						<p class='heading-secondary'>Change Email</p>
						<label class='form-label'>Current Email</label>
						<input type='email' class='form-control' name='email' required>

						<p class='mt-2'>Enter password to change email</p>
						<label class="form-label">Password</label>
						<input type="password" name="password" class='form-control' required>

						<button type='submit' class='btn btn-themed mt-2'>Change Email</button>

						@foreach($errors->all() as $err)
							<p class='error'><h4>Warning:</h4> {{$err}}</p>
						@endforeach
					</form>
				</div>
			</div>


			<div class='col-md-6'>
				<div class='card cardify lift occupy-height flex-center-all-col'>
					<form action={{route('user.update.password', ['user_data' => $user_data])}} method='post'>
						@csrf
						@method('post')

						<p class='heading-secondary'>Change Password</p>

						<label class='form-label'>Current Email</label>
						<input type='email' class='form-control' name='email' required>

						<label class='form-label'>Old Password</label>
						<input type="password" name="password" class='form-control' required>

						<label class='form-label'>New Password</label>
						<input type="password" name="newpassword" class='form-control' required>

						<label class='form-label'>Repeat New Password</label>
						<input type="password" name="newpassword-repeat" class='form-control' required>

						<button class='btn btn-themed mt-3' type='submit'>Change Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@include('components/footer')
