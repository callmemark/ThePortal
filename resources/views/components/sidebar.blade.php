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


<div id='sidebar'>

	<button onclick='' class='btn right hint--rounded hint--bounce text-color-main' data-hint='Dashboard'>
		<span class="material-symbols-outlined ">
			dashboard
		</span>
		<span class='tab-name'>dashboard</span>
	</button>



	<form action={{route('lougout.user')}} method="post">
		@csrf
		@method('post')
		
		<button onclick='' class='btn right hint--rounded hint--bounce text-color-main' data-hint='Lougout'>
			<span class="material-symbols-outlined">
				logout
			</span>
			<span class='tab-name'>logout</span>
		</button>
	</form>
</div>