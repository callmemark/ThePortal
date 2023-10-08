<style>
	#sidebar{
		height: 100vh;
		width: 50px;
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
</style>


<div id='sidebar'>

	<button onclick='window.location="{{route('dashboard')}}"' class='btn right hint--rounded hint--bounce' data-hint='Dashboard'>
		<span class="material-symbols-outlined">
			dashboard
		</span>
	</button>


	<button onclick='window.location="{{route('student.list')}}"' class='btn right hint--rounded hint--bounce' data-hint='Student List'>
		<span class="material-symbols-outlined">
			groups
		</span>
	</button>

	<span class="material-symbols-outlined">
		
	</span>

	<button onclick='window.location="{{route('student.register.form')}}"' class='btn right hint--rounded hint--bounce' data-hint='Register Student'>
		<span class="material-symbols-outlined">
			group_add
		</span>
	</button>

	<button onclick='window.location="{{route('subject.form')}}"' class='btn right hint--rounded hint--bounce' data-hint='Add Subject'>
		<span class="material-symbols-outlined">
			add_notes
		</span>
	</button>

	<button onclick='window.location="{{route('user.logout')}}"' class='btn right hint--rounded hint--bounce' data-hint='Lougout'>
		<span class="material-symbols-outlined">
			logout
		</span>
	</button>


	
	
	

</div>