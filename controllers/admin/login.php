<?php
// Start session at the beginning
session_start();

// Check if already logged in, redirect to admin panel
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    header("Location: /admin/dashboard");
    exit();
}

require 'database.php';

$errors = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim(htmlspecialchars($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';

    // Validate form data
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }

    // If no validation errors, check credentials
    if (empty($errors)) {
        try {
            // Prepare SQL statement
            $stmt = $conn->prepare("SELECT * FROM admin WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify user exists and password is correct
            // for hashed passwords use if ($user && password_verify($password, $user['password'])) 
                if ($user && $password === $user['password']) {
                    // Set session data
                    $_SESSION['user'] = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'is_admin' => true
                    ];
                
                // Set a success message
                $_SESSION['success_message'] = "Welcome back, admin!";
                
                // Redirect to admin dashboard after successful login
                header("Location: /admin/dashboard");
                exit();
            } else {
                // Invalid credentials
                $errors['login'] = 'Invalid email or password';
            }
        } catch (PDOException $e) {
            // Handle database error
            $errors['database'] = 'Database error: ' . $e->getMessage();
        }
    }
}

// Load the login view with any errors
require 'views/admin/login.view.php';
