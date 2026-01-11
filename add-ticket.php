<?php
include 'db.php';
session_start();
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }

if($_POST){
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    mysqli_query($conn,"INSERT INTO tickets (user_id,title,description,status) VALUES ($user_id,'$title','$description','$status')");
    header("Location: dashboard.php");
    exit;
}
include 'header.php';

?>
<div class="row justify-content-center">
  <div class="col-md-7">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3 class="mb-3">Add Ticket</h3>
        <form method="post">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option>Open</option>
              <option>In Progress</option>
              <option>Done</option>
            </select>
          </div>
          <button class="btn btn-primary">Create</button>
          <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
