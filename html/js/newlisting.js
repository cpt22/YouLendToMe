var datefield = document.createElement("input")

datefield.setAttribute("type", "date")

if (datefield.type != "date") { // if browser doesn't support input type="date",
	// load files for jQuery UI Date Picker
	document
			.write('<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n');
	document
			.write('<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n');
}
if (datefield.type != "date") { // if browser doesn't support input type="date",
	// initialize date picker widget:
	$(document).ready(function() {
		$('#startDate').datepicker();
		$('#endDate').datepicker();
	});
}

// document.removeElement(datefield);

$(document).ready(function() {
	function readURL(input) {
		//if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#preview-image').attr('src', e.target.result);
				$('#imagePreview').show();
			}

			reader.readAsDataURL(input.files[0]);
		//}
	}

	$("#inpFile").change(function() {
		console.log("hi");
		readURL(this);
	});
});
