$(document).ready(function() {
	height = $("#cartForm").outerHeight() + 10;
	if (height == 10) {
		$("#innerCart").css('height', 50);
	} else {
		$("#innerCart").css('height', height);
	}

	if (height != 10) {
		$("#footercart").css('top', 424 + height);
	}
});