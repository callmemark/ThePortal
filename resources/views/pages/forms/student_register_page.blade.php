@include('components/header')
@include('themes/theme-initializer')
@include('components/sidebar')


<div class="content-col">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<p class="theme-header-3 mt-5"> Student Registration Form </p>

				@if($errors -> any())
				<div class="error-display">
					<h4>Error:</h4>
					@foreach($errors -> all() as $error)
					<p>{{$error}}</p>
					@endforeach
				</div>
				@endif

				@if(session() -> has('error'))
				<div class="error-display">
					<h4>Error:</h4>
					<p>{{session('error')}}</p>
				</div>
				@endif

				@if(session() -> has('success'))
				<div class="success-display">
					<h4>Success:</h4>
					<p>{{session('success')}}</p>
				</div>
				@endif



				<form action={{route('student.register.store')}} method="post">
					@csrf
					@method("post")

					<p class="theme-header-2 mt-5"> Personal Information </p>
					<div class="row pt-5">
						<div class="col-md-4">
							<label class="form-label">First Name</label>
							<input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" required>
						</div>
						<div class="col-md-4">
							<label class="form-label">Middle Name</label>
							<input type="text" class="form-control" name="middle_name" value="{{old('middle_name')}}" required>
						</div>
						<div class="col-md-4">
							<label class="form-label">Last Name</label>
							<input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" required>
						</div>
					</div>


					<div class="row pt-5">
						<div class="col-md-4">
							<label class="form-label">Age</label>
							<input type="number" class="form-control" name="age" value="{{old('age')}}" required>
						</div>
						<div class="col-md-4">
							<label class="form-label">Birthdate</label>
							<input type="date" class="form-control" name="birthdate" value="{{old('birthdate')}}" required>
						</div>
						<div class="col-md-4">
							<label class="form-label">gender</label>
							<select class="form-select" name="gender">
								<option selected>--Select Gender--</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
					</div>

					<div class="row pt-4">
						<div class="col-md-12">
							<label class="form-label">Home Address</label>
							<input type="text" class="form-control" name="home_address" value="{{old('home-address')}}">
						</div>
					</div>

					<div class="row pt-4">
						<div class="col-md-6">
							<label class="form-label">Personal Email</label>
							<input type="email" class="form-control" name="personal_email" value="{{old('personal_email')}}" required>
						</div>
						<div class="col-md-6">
							<label class="form-label">Contact Number</label>
							<input type="number" class="form-control" name="contact_number" value="{{old('contact_number')}}" required>
						</div>
					</div>

					<p class="theme-header-2 mt-5"> Account Register </p>
					<div class="row">
						<div class="col-md-12">
							<div class="row pt-2">
								<div class="col-md-8">
									<label class="form-label">Institutional Email</label>
									<input type="text" class="form-control" name="school_email" value="{{old('school_email')}}" required>
								</div>
								<div class="col-md-4">
									<label class="form-label">Domain</label>
									<input class="form-control" value=<?= "@institutionalemail.com" ?> disabled>
								</div>
							</div>
						</div>
					</div>

					<label class="form-label mt-3">Password</label>
					<input type="password" class="form-control" name="password" required>

					<label class="form-label">Repeat Password</label>
					<input type="password" class="form-control" name="repeat-password" required>

					<button class="theme-btn-primary theme-btn mt-3"> Submit Registration </button>
				</form> 

			</div>
		</div>
	</div>
</div>


@include('components/footer')