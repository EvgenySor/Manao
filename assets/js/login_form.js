$( document ).ready(function() {
	$('#submitButton').click(function(e){
		e.preventDefault();

		if(isValidInputs()) {
			$.ajax({
				url:     'ajax/login.php',
				type:     "POST",
				dataType: "html",
				data: $("#loginForm").serialize(),
				success: function(response) {
					answer = $.parseJSON(response);
					for (let key in answer) {
						if (key == 'login_error'){
							$('#inputLogin').after(answer[key]);
						}
						if (key == 'password_error'){
							$('#inputPassword').after(answer[key]);
						}
					}
					if (answer.login){
						location.reload();
					}
				},
				error: function(response) {
					console.log(response);
				}
			});
		}
	});

    function isValidInputs(){
    	let login = $('#inputLogin').val();
    	let password = $('#inputPassword').val();
        let isValid = true;

    	$('small.form-text').hide();

    	// login_input validation
    	if (login.length < 6){
    		$('#inputLogin').after('<small class="form-text">Login must be more than 6 characters</small>');
    		isValid = false;	
    	}

    	//password_input validation
    	if (password.length < 6){
    		$('#inputPassword').after('<small class="form-text">Password must be more than 6 characters</small>');
    		isValid = false;
    	}

    	 return isValid;
    	}
    });