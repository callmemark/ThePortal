@include('components/header')
@include('components/sidebar')


<style>
	#subject-table{
		margin-top: 1rem;
	}
</style>

<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<p class='heading-title'>Subjects Manager</p>
		</div>
	</div>

	<div class='row'>
		<div class='col-md-12 lift cardify'>
			<h4 class='mt-5 mb-2'>Add Subjects</h4>
			<form action={{Route('subject.create')}} method='post'>
				@csrf
				@method('post')

				<label class='form-label'>Add Subject</label>
				<input class='form-control' type="text" name='subject' required>

				<label class='form-label'>Unit</label>
				<input class='form-control' type='number' name='unit' required>

				@foreach($errors as $err)
					<p class='error'>$err</p>
				@endforeach

				@if(session() -> has('error'))
					<p class='error'>{{session() -> get('error')}}</p>
				@endif

				@if(session() -> has('success'))
					<p class='success'>{{session() -> get('success')}}</p>
				@endif

				<button class='btn btn-themed mt-2' type='submit'>Add New Subject</button>
			</form>
		</div>
	</div>

	<div class='row'>
		<div class='col-md-12'>
			<p class='heading-secondary'>Subject List</p>
			<table class='my-table' id='subject-table'>
				<tr>
					<th>Subject</th>
					<th>Unit</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach($subjects as $subject)
					<tr class='lift'>
						<td>{{$subject -> subject}}</td>
						<td>{{$subject -> unit}}</td>
						<td>
							<form action={{route('subject.edit', ['subject' => $subject])}} method='get'>
								@csrf
								@method('get')
								<button class='btn btn-themed'>Edit</button>
							</form>
						</td>
						<td>
							<button class='btn btn-danger' data-bs-toggle="modal" data-bs-target="#delete-modal">Delete</button>
							<form action={{route('subject.delete', ['subject' => $subject])}} method='post'>
								@csrf
								@method('post')

								@include('components/confirmation-modal', 
									[	'modal_id' => 'delete-modal',
										'title' => 'Delete Data',
										'message' => 'This action cannot be undone'])
							</form>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>


@include('components/footer')