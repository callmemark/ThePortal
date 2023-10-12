@include('components/header')
@include('components/sidebar')


<div class='container'>
	<div class='row'>
		<div class='col-md-12'>
			<p class='heading-title'>Edit Suject</p>

			<form action={{route('subject.update', ['subject' => $subject])}} method='post'>
				@csrf
				@method('post')

				<label class='form-label'>Subject Name</label>
				<input type='text' name='subject' class='form-control' value={{$subject -> subject}}>

				<label class='form-label'>Unit</label>
				<input type='text' name='unit' class='form-control' value={{$subject -> unit}}>

				<button class='btn btn-themed mt-3' type='submit'>Update Subject</button>

			</form>
		</div>
	</div>
</div>


@include('components/footer')