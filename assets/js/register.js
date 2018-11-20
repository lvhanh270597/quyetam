$(function(){
	$('.errors ul li').hide();

	var full_name_err = false;
	var username_err = false;	
	var password_err = false;	
	
	$('#full_name').on('focusout',function(){		
		check_full_name();
	});

	$('#username').on('focusout',function(){		
		check_username();
	});

	$('#password').on('focusout',function(){
		check_password();
	});

	$('#confirm_password').on('focusout',function(){
		check_password();
	});


	function check_full_name(){
		full_name_err = false;
		full_name = $.trim($('#full_name').val());
	
		if(is_blank(full_name)){
			$('#full_name_err').text("Fullname cannot be blank.").show();	
			$('#full_name_err').addClass("text-danger");		
			full_name_err = true;
		} else {
			$('#full_name_err').hide();
		}
		invalid_input($('#full_name_err'),full_name_err);
	}

	function check_username(){
		username_err = false;
		username = $.trim($('#username').val());
	
		if(is_blank(username)){
			$('#username_err').text("Username cannot be blank.").show();	
			$('#username_err').addClass("text-danger");	
			full_name_err = true;
		} else {
			$('#username_err').hide();
		}
		invalid_input($('#username_err'),username_err);
	}	
	
	function check_password(){
		password_err = false;
		password = $.trim($('#password').val());		

		password_match();
		if(password.length < 8){
			$('#password_err').text("Password should be at least 8 characters").show();
			$('#password_err').addClass("text-danger");	
			password_err = true;
		} 

		if(!password_err){
			$('#password_err').hide();
		}
		invalid_input($('#password_err'),password_err);
		invalid_input($('#confirm_err'),password_err);
	}

	function is_blank(input){
		return (input.length == 0) ? true : false;
	}

	function password_match(){		
		password = $.trim($('#password').val());
		confirm_password = $.trim($('#confirm_password').val());
		if(password != confirm_password){
			$('#password_err').text('Passwords do not match.').show();
			password_err = true;
		} else password_err = false;
	}

	function invalid_input(error_element, has_error){
		if(has_error){
			$(error_element).parent().removeClass('has-success');
			$(error_element).parent().addClass('has-error');
			$(error_element).siblings('.glyphicon').removeClass('glyphicon-ok');
			$(error_element).siblings('.glyphicon').addClass('glyphicon-remove');
		} else {
			$(error_element).parent().removeClass('has-error');
			$(error_element).parent().addClass('has-success');
			$(error_element).siblings('.glyphicon').removeClass('glyphicon-remove');
			$(error_element).siblings('.glyphicon').addClass('glyphicon-ok');
		}

	}

	$('#registration').submit(function(){
		check_full_name();				
		check_username();				
		check_password();
		if(full_name_err || password_err){
			return false;
		}
		return true;
	});

});