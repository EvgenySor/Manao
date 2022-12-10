$( document ).ready(function() {
	$('#submitButton').click(function(e){
		e.preventDefault();

		if(isValidInputs()) {
			$.ajax({
				url:     'ajax/register.php',
				type:     "POST",
				dataType: "html",
				data: $("#registerForm").serialize(),
				success: function(response) {
					answer = $.parseJSON(response);
					for (let key in answer) {
						if (key == 'login_error'){
							$('#inputLogin').after(answer[key]);
						}
						if (key == 'email_error'){
							$('#inputEmail').after(answer[key]);
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
    	let confirmPassword = $('#inputConfirmPassword').val();
    	let email = $('#inputEmail').val();
    	let name = $('#inputName').val();
    	let isValid = true;

    	$('small.form-text').hide();

    	// login_input validation
    	if (login.length < 6){
    		$('#inputLogin').after('<small class="form-text">Login must be more than 6 characters</small>');
    		isValid = false;	
    	}

        // space contains
        if (login.match(/ +/g)){
            $('#inputLogin').after('<small class="form-text">Login must not contain a space</small>');
            isValid = false;    
        }

    	//password_input validation
    	if (password.length < 6){
    		$('#inputPassword').after('<small class="form-text">Password must be more than 6 characters</small>');
    		isValid = false;
    	}

        // space contains
        if (password.match(/ +/g)){
            $('#inputPassword').after('<small class="form-text">Password must not contain a space</small>');
            isValid = false;    
        }

    	// Validate letters
    	let regexp = /[a-zа-я]/gi;
    	if(!password.match(regexp)) {
    		$('#inputPassword').after('<small class="form-text">Password must contain letters</small>');
    		isValid = false;
    	} 

    	 // Validate numbers
    	 regexp = /[0-9]/g;
    	 if(!password.match(regexp)) {
    	 	$('#inputPassword').after('<small class="form-text">Password must contain numbers</small>');
    	 	isValid = false;
    	 }

    	 //confirmPasswordInput validate 
    	 if (password !== confirmPassword){
    	 	$('#inputConfirmPassword').after('<small class="form-text">Passwords must match</small>');
    	 	isValid = false;
    	 }
    	 	
    	 //emailInput validate
    	 regexp = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
    	 if(!email.match(regexp)) {
    	 	$('#inputEmail').after('<small class="form-text">Invalid email</small>');
    	 	isValid = false;
    	 }

        // space contains
        if (email.match(/ +/g)){
            $('#inputEmail').after('<small class="form-text">Email must not contain a space</small>');
            isValid = false;    
        }

        console.log(email);

    	 //inputName validation
    	 if(name.length < 2 || name.length > 255){
    	 	$('#inputName').after('<small class="form-text">The name must be longer than 2 and not more than 255 characters</small>');
    	 	isValid = false;
    	 }
    	 	
    	 regexp = /[^a-zа-я]/gi;
    	 if(name.match(regexp)) {
    	 	$('#inputName').after('<small class="form-text">The name must contain only letters</small>');
    	 	isValid = false;
    	 }

         // space contains
        if (name.match(/ +/g)){
            $('#inputName').after('<small class="form-text">Name must not contain a space</small>');
            isValid = false;    
        }

    	 return isValid;
    	}
    });