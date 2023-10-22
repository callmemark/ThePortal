@include('components/header')
@include('themes/theme-initializer')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p class="theme-header-3">Student Login</p>
			@if($errors -> any())
				<div class="error-display">
					<h4>Error</h4>
					@foreach($errors -> all() as $error)
						<p>{{$error}}</p>
					@endforeach
				</div>
			@endif

			@if(session() -> has('error'))
				<div class="error-display">
					<h4>Error</h4>
					<p>{{session('error')}}</p>
				</div>
			@endif

			<div class="theme-cardify">
				<form action={{route('student.login.auth')}}  method="post">
					@csrf
					@method('post')

					<label class="form-label"> Email </label>
					<input type="email" class="form-control" name="school_email" value="{{old('school_email')}}" required>

					<label class="form-label"> Password </label>
					<input type="password" class="form-control" name="password" value="{{old('password')}}" required>

					<button type="submit" class="theme-btn theme-btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>


@include('components/footer')