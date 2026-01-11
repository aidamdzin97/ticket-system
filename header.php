<?php if(session_status()===PHP_SESSION_NONE) session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ticket System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">Ticket System</a>
    <div>
      <?php if(isset($_SESSION['user_id'])){ ?>
        <span class="text-white me-3">Hi, <?= htmlspecialchars($_SESSION['username']) ?> (<?= $_SESSION['role'] ?>)</span>
        <a href="add-ticket.php" class="btn btn-sm btn-outline-light me-2">Add Ticket</a>
        <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
      <?php } ?>
    </div>
  </div>
</nav>

<div class="container">