<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    session_unset(); 
    session_destroy(); 
}

header("Location: index.php"); 
exit();
?>
