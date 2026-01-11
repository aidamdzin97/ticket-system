<?php
include 'db.php';
if($_POST){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user'; // default role

    $sql = "INSERT INTO users (username,password,role) VALUES ('$username','$password','$role')";
    if(mysqli_query($conn,$sql)){
        header("Location: login.php");
        exit;
    } else {
        echo "Error: ".mysqli_error($conn);
    }
}
include 'header.php';
?>
<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3 class="mb-3">Register</h3>
        <?php if(isset($error)){ ?><div class="alert alert-warning"><?= htmlspecialchars($error) ?></div><?php } ?>
        <form method="post">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button class="btn btn-success w-100">Create account</button>
        </form>
        <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
