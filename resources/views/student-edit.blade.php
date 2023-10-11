@include('components/header')
@include('components/sidebar')


<style>
	.card{
		border: none;
	}
</style>

<div class='container'>

	<div class='row'>
		<div class='col-md-12'>
			<p class='heading-title'>Edit Student Data</p>
		</div>
	</div>

	<div class='row'>
		<div class='col-md-8'>
			<form action={{route('student.update', ['student' => $student])}} method='post'>
				@csrf
				@method('post')

				<label class='form-label'>First Name</label>
				<input class='form-control' type='text' name='firstname' value={{$student->firstname}}>

				<label class='form-label'>Middle Name</label>
				<input class='form-control' type='text' name='middlename' value={{$student->middlename}}>

				<label class='form-label'>Last Name</label>
				<input class='form-control' type='text' name='lastname' value={{$student->lastname}}>

				<label class='form-label'>Age</label>
				<input class='form-control' type='number' name='age' value={{$student->age}}>

				<h4 class='mt-3'>Gender</h4>
				<select class="form-select" aria-label="Gender" name='gender' value=value={{$student->gender}}>
					@if($student->gender == "Female")
						<option selected>Female</option>
						<option value="Female">Male</option>
					@endif

					@if($student->gender == "Male")
						<option selected>Male</option>
						<option value="Female">Female</option>
					@endif
					
				</select>
				
				<button type='submit' class='btn btn-themed mt-5'>Update Student Data</button>
			</form>
		</div>

		<div class='col-md-4'>

			<div class="card mt-5 lift">
			  <h5 class="card-header text-color-theme background-theme">Cannot Be Undone</h5>
			  <div class="card-body background-theme">
			    <form action={{route('student.delete', ['student' => $student])}} method='post'>
			    	@csrf
			    	@method('post')
					<button type='submit' class='btn btn-danger'>Delete Student Registration</button>
				</form>
			  </div>
			</div>

			<div class="card mt-3 lift">
			  <h5 class="card-header background-theme text-color-theme">Enroll To Subjects</h5>
			  <div class="card-body background-theme">
			    <form action={{route('enrollement.create', ['student' => $student])}} method='post'>
			    	@csrf
			    	@method('post')

			    	<select class="form-select" aria-label="Subjects" name='subject-selected'>
						<option selected>Select Subject</option>
						@foreach($subjects as $subject)
							<option value={{$subject}}>{{$subject->subject}}</option>
						@endforeach
					</select>

					@foreach($errors -> all() as $err)
						<p class='text-error'>{{$err}}</p>
					@endforeach

					@if(session() -> has('error'))
						<p class='text-error'>{{session()->get('error')}}</p>
					@endif
					<button type='submit' class='btn btn-themed mt-3'>Enroll to selected subject</button>
				</form>
			  </div>
			</div>
		</div>
	</div>

	<div class='row'>
		<div class='col-md-12'>
			<p class='heading-secondary text-color-main'>Enrolled Subjects</p>
			<table class='my-table'>
				<tr>
					<th>Subject</th>
					<th>Grade</th>
					<th>Remove</th>
				</tr>
				@foreach($enrolled as $subs_enrolled)
				<tr class='lift'>
					<td>{{$subs_enrolled -> subject}}</td>
					<td>{{$subs_enrolled -> grade}}</td>
					<td>
						<form action={{route('student.unenroll', ['student' => $student, 'subjectid' => $subs_enrolled -> id])}} method='post'>
							@csrf
							@method('post')
							<button class='btn btn-danger' tpe='submit'>Remove</button>
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@include('components/footer')