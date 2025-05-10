<?php

// log the user out and redirect to the login page

// Unset all session variables
$_SESSION = [];

//destroy the session file
session_destroy();

// Clear the session cookie
$params=session_get_cookie_params();

setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'],$params['secure'],$params['httponly']); 

// Redirect to the login page with a success message
session_start();
$_SESSION['success_message'] = "You have been successfully logged out.";
header("Location: /admin");
exit();
