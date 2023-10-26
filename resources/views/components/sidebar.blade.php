<?php $role = (session('role')); ?>



<!-- Dashboard Icon-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<!-- Student manager Icon-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<!-- Subjects Icon-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<!-- Logout Icon-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<link rel="stylesheet" href={{ asset('css/side_navbar.css') }}>


<div class='sidebar'>
	<form action={{route('dashboard')}} mehtod="get">
		@csrf
		@method('get')
		<button type="submit" class='btn right hint--rounded hint--bounce text-color-main' data-hint='Dashboard'>
			<span class="material-symbols-outlined">
				dashboard
			</span>
			<span class='tab-name'>dashboard</span>
		</button>
	</form>

	<form action={{route('panel.menu.student.menu')}} mehtod="get">
		@csrf
		@method('get')
		<button type="submit" class='btn right hint--rounded hint--bounce text-color-main' data-hint='Student Manager'>
			<span class="material-symbols-outlined">
				recent_actors
			</span>
			<span class='tab-name'>Students</span>
		</button>
	</form>

	<form action="#" mehtod="get">
		@csrf
		@method('get')
		<button type="submit" class='btn right hint--rounded hint--bounce text-color-main' data-hint='Subject Manager'>
			<span class="material-symbols-outlined">
				note_stack_add
			</span>
			<span class='tab-name'>Subjects</span>
		</button>
	</form>

	<form action={{route('lougout.user', ['role' => $role])}} method="post">
		@csrf
		@method('post')
		
		<button type="submit" class='btn right hint--rounded hint--bounce text-color-main' data-hint='Lougout'>
			<span class="material-symbols-outlined">
				logout
			</span>
			<span class='tab-name'>logout</span>
		</button>
	</form>
</div>