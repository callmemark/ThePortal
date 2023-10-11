@include('components/header')
@include('components/sidebar')



<div class='container'>
	<div class='row'>
		<div class='col-md-12'>

			<p class='heading-title'>Student List</p>
			<table class='my-table'>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Edit</th>
				</tr>

				@foreach($students as $student)
					<tr class='lift'>
						<td>{{$student -> firstname}} {{$student -> middlename}} {{$student -> lastname}}</td>
						<td>{{$student -> age}}</td>
						<td>{{$student -> gender}}</td>
						<td>
							<form action='{{route('student.edit', ['student' => $student])}}' method='get'>
								@csrf
								@method('get')
								<button class='btn btn-themed' type='submit'>Edit</button>
							</form>
						</td>
					</tr>
				@endforeach
			</table>			
		</div>
	</div>
</div>

@include('components/footer')