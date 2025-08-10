<?php
// Authentication check script
require_once 'config/auth.php';

$auth = new Auth();

// Check if user is logged in
if (!$auth->isLoggedIn()) {
    header('Location: login.html');
    exit;
}

// Get user info for the page
$userInfo = [
    'id' => $_SESSION['user_id'],
    'username' => $_SESSION['username'],
    'email' => $_SESSION['email'],
    'role' => $_SESSION['role'],
    'first_name' => $_SESSION['first_name'],
    'last_name' => $_SESSION['last_name'],
    'full_name' => $_SESSION['first_name'] . ' ' . $_SESSION['last_name']
];

// Make user info available to JavaScript
echo "<script>window.currentUser = " . json_encode($userInfo) . ";</script>";
?>