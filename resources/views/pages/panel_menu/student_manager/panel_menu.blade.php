<div class="row">
	<div class="col-md-12 d-flex align-items-center justify-content-end">
		@include("components/iconed_btn", [
			"destination" => "dashboard",
			"material_icon_name" => "patient_list",
			"btton_Name" => "Student List",
			"extra_class" => "btn-md",
			])

		@include("components/iconed_btn", [
			"destination" => "student.register.create",
			"material_icon_name" => "group_add",
			"btton_Name" => "Register New Student",
			"extra_class" => "btn-md",
			])

		@include("components/iconed_btn", [
			"destination" => "dashboard",
			"material_icon_name" => "history_edu",
			"btton_Name" => "Enroll Student",
			"extra_class" => "btn-md",
			])

		@include("components/iconed_btn", [
			"destination" => "dashboard",
			"material_icon_name" => "credit_score",
			"btton_Name" => "Update Grade",
			"extra_class" => "btn-md",
			])
	</div>
</div>