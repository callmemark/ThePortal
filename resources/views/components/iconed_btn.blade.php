
@if(!isset($extra_class))
	{{$extra_class=null}}
@endif



<button class="theme-iconed-btn d-flex align-items-center justify-content-center {{$extra_class}}" onclick=location.href="{{route($destination)}}">
	<span class="material-symbols-outlined material-icons icon-sm">
		{{$material_icon_name}}
	</span>
	<span>{{$btton_Name}}</span>
</button>


<!--

Call this by 


@(removethis)include("components/iconed_btn", [
	"destination" => "dashboard",
	"material_icon_name" => "credit_score",
	"btton_Name" => "Update Grade",
	"extra_class" => "",

])


-->