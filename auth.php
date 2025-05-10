<?php
// Admin authentication middleware
// Include this file at the beginning of all admin pages

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in and is an admin
function isAdmin() {
    return isset($_SESSION['user']) 
        && !empty($_SESSION['user']) 
        && isset($_SESSION['user']['is_admin']) 
        && $_SESSION['user']['is_admin'] === true;
}

// Redirect if not authenticated
if (!isAdmin()) {
    // Store original requested URL to redirect back after login
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    
    // Set error message
    $_SESSION['error_message'] = "Please log in to access the admin panel";
    
    // Redirect to login page
    header("Location: /admin");
    exit();
}
