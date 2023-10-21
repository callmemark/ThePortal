
<?php $theme = "classic";?>

@if($theme == "classic")
	@include('themes/classic-theme')
@endif


@if($theme == "dark")
	@include('themes/dark-theme')
@endif