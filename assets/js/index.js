$( document ).ready(function() {
	$('#logoutButton').click(function(e){
		e.preventDefault();

		$.ajax({
			url:     'ajax/logout.php',
			type:     "POST",
			dataType: "html",
			success: function(response) {
				location.reload();
			},
			error: function(response) {
				console.log(response);
			}
		});
	});
})