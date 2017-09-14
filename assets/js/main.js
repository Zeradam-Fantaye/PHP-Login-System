//alert("semayat!");

// This is jQuery!!
$(document).on("submit", "form.js-register", function(event) {
	

	event.preventDefault(); //Doesn't really matter. take it or leave it

	// Here, _form contains the entire 
	//<form class="uk-form-stacked js-register"> ... </form> 
	var _form = $(this);

	var _error = $(".js-error", _form);

	var dataObj = {
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val()
	};

	if(dataObj.email.length < 6) {
		_error
			.text("Please enter a valid email address")
			.show();
		return false;

	} else if (dataObj.password.length < 11) {
		_error
			.text("Please enter a passphrase that is at least 11 characters long.")
			.show();
		return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();
	//alert("Yes I am here ... Line 1");
	$.ajax({
		type: 'POST',
		url: '/PHP_Login_and_Registration_System/PHP-Login-System/ajax/register.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})

	.done(function ajaxDone(data) {

		// Whatever data is 
		
		console.log(data);
		if(data.redirect !== undefined) {
			 //alert("Yes I am here ... Line 2");
			 window.location = data.redirect;
		}

		alert(data.name);
	})

	.fail(function ajaxFailed(e) {
		// This failed 
		console.log(e);
	})

	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
	});

	return false;
});
