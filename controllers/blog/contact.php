<?php
session_start();

// If it's a GET request, show the form
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require 'views/blog/contact.view.php';
    exit;
}

// If it's a POST request, process the form
require 'database.php'; // Make sure this defines $conn (PDO)

// Get POST data
$firstName = trim($_POST['first-name'] ?? '');
$lastName = trim($_POST['last-name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

if ($firstName === '') $errors[] = 'First name is required.';
if ($lastName === '') $errors[] = 'Last name is required.';
if ($email === '') {
    $errors[] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email is not valid.';
}
if ($message === '') $errors[] = 'Message is required.';

if (!empty($errors)) {
    $_SESSION['contact_errors'] = $errors;
    $_SESSION['contact_form_data'] = $_POST;
    header('Location: /contact');
    exit;
}

// Save to DB
$stmt = $conn->prepare("INSERT INTO message (first_name, last_name, email, message, submission_date) VALUES (?, ?, ?, ?, NOW())");
$stmt->execute([$firstName, $lastName, $email, $message]);

// Redirect with success
header('Location: /contact?success=1');
exit;
