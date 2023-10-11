@include('components/header')
@include('components/sidebar')

<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<p class='heading-title'>Grades</p>
			<table class='my-table'>
				<tr>
					<td>Subject</td>
					<td>Unit</td>
					<td>Grade</td>
				</tr>

				@foreach($enrolled as $subject_data)
				<tr class='lift soft-corner'>
					<td>{{$subject_data -> subject}}</td>
					<td>{{$subject_data -> unit}}</td>
					<td>{{$subject_data -> grade}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@include('components/footer')