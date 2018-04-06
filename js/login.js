jQuery(document).ready(function($){
	// Replacing logo's URL
	$('#login h1 a').attr({ 'href' : login_params.site_url });

	// Replace register message
	$('.login-action-register .message.register').text( 'Register to become MDB author' );

	// Adding contextual navigation
	$('.login-action-login form').append('<p class="contextual-nav"><a href="'+ login_params.site_url +'/wp-login.php?action=register">Do not have an account yet? Register and become an author!</a></p>');
	$('.login-action-register form').append('<p class="contextual-nav"><a href="'+ login_params.site_url +'/wp-login.php">Already a Member? Login Here</a></p>');

	// Removing redundant nav link
	$('.login-action-login #nav a:first, .login-action-register #nav a:first').remove();
});