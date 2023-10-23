
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />




<style>
	#sidebar{
		height: 100vh;
		width: 77px;
		position: fixed;
		border-radius: 0 8px 8px 0;
		box-shadow: inset -7px 9px 15px -3px rgba(0,0,0,0.1);
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		z-index: 1;
	}
	.tab-name{
		font-size: 0.6rem;
	}
</style>

<?php 
	
	switch(true){
		case (auth() -> guard('admin') -> user() != null):
			$role = auth() -> guard('admin') -> user() -> role;
			break;
		case (auth() -> guard('student') -> user() != null):
			$role = auth() -> guard('student') -> user() -> role;
			break;
		case (auth() -> guard('parent') -> user() != null):
			$role = auth() -> guard('parent') -> user() -> role;
			break;
		case (auth() -> guard('instructor') -> user() != null):
			$role = auth() -> guard('instructor') -> user() -> role;
			break;
		default:
			$role = 'standby';
	}
	
?>

<div id='sidebar'>


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