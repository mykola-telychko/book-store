$(document).ready(function() {

	//E-mail Ajax Send
	$("#formtwo").submit(function() { //Change
		alert(1);
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "views/busket.php", //Change
			data: th.serialize()
		}).done(function() {
			alert("Thank you!");
			setTimeout(function() {
				// Done Functions
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});

});
