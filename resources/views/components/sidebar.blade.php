<style>
	#sidebar{
		height: 100vh;
		width: 77px;
		position: fixed;
		border-radius: 0 8px 8px 0;
		/*box-shadow: 10px 0px 15px -3px rgba(0,0,0,0.1);*/
		box-shadow: inset -7px 9px 15px -3px rgba(0,0,0,0.1);
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		z-index: 1;
	}
	#logo{
		color: #338a7e;
		font-size: 2rem;
		font-weight: bold;
	}
	.tab-name{
		font-size: 0.7rem;
	}
</style>


<?php
	$role = session() -> get('role');
?>

<div id='sidebar'>



	<button onclick='window.location="{{route('dashboard')}}"' class='btn right hint--rounded hint--bounce' data-hint='Dashboard'>
		<span class="material-symbols-outlined ">
			dashboard
		</span>
		<span class='tab-name'>dashboard</span>
	</button>


	@if($role == 'student')
	<button onclick='#' class='btn right hint--rounded hint--bounce' data-hint='show grades'>
		<span class="material-symbols-outlined">
			table_rows
		</span>
		<span class='tab-name'>Grades</span>
	</button>
	@endif


	@if($role == 'admin')
	<button onclick='window.location="{{route('student.list')}}"' class='btn right hint--rounded hint--bounce' data-hint='Student List'>
		<span class="material-symbols-outlined">
			groups
		</span>
		<span class='tab-name'>students</span>
	</button>
	@endif

	@if($role == 'admin')
	<button onclick='window.location="{{route('student.register.form')}}"' class='btn right hint--rounded hint--bounce' data-hint='Register Student'>
		<span class="material-symbols-outlined">
			group_add
		</span>
		<span class='tab-name'>create</span>
	</button>
	@endif

	@if($role == 'admin')
	<button onclick='window.location="{{route('subject.form')}}"' class='btn right hint--rounded hint--bounce' data-hint='Add Subject'>
		<span class="material-symbols-outlined">
			add_notes
		</span>
		<span class='tab-name'>subjects</span>
	</button>
	@endif

	<button onclick='window.location="{{route('user.logout')}}"' class='btn right hint--rounded hint--bounce' data-hint='Lougout'>
		<span class="material-symbols-outlined">
			logout
		</span>
		<span class='tab-name'>logout</span>
	</button>
</div>