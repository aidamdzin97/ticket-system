<?php
include 'db.php';
session_start();
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }

include 'header.php';
?>
<div class="text-center py-5">
  <h1 class="display-6">Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
  <p class="lead">You’re logged in as <strong><?= $_SESSION['role'] ?></strong>. Redirecting to your dashboard...</p>
  <div class="mt-4">
    <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
  </div>
</div>

<script>
  // Auto redirect ke dashboard selepas 3 saat
  setTimeout(()=>{ window.location.href='dashboard.php'; }, 3000);
</script>
<?php include 'footer.php'; ?>