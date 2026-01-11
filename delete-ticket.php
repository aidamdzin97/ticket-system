<?php
include 'db.php';
session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['role']!='admin'){
    echo "Access denied";
    exit;
}
$ticket_id = $_GET['id'];
mysqli_query($conn,"DELETE FROM tickets WHERE id=$ticket_id");
header("Location: dashboard.php");
exit;