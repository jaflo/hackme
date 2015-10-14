$(document).ready(function() {
	$("input[name=color]").spectrum({ // The color-picker
		allowEmpty: true,
		preferredFormat: "hex"
	});
	$(".loginregistertoggle").click(function() { // Switch between login and signup
		$("#login, #signup").toggle();
	});
	$("#updateprofile").submit(function() { // Sanitize HTML in about section
		var clean = $("<div>").text($("textarea[name=about]").val()).html();
		$("textarea[name=about]").val(clean);
	});
});
