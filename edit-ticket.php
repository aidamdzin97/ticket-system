<?php
include 'db.php';
session_start();
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }

$ticket_id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

if($role=='admin'){
    $result = mysqli_query($conn,"SELECT * FROM tickets WHERE id=$ticket_id");
}else{
    $result = mysqli_query($conn,"SELECT * FROM tickets WHERE id=$ticket_id AND user_id=$user_id");
}
$ticket = mysqli_fetch_assoc($result);

if($_POST){
    $title = $_POST['title'];
    $description = $_POST['description']; // ambil description dari form

    if($role=='admin'){
        $status = $_POST['status'];
        mysqli_query($conn,"UPDATE tickets SET title='$title', description='$description', status='$status' WHERE id=$ticket_id");
    } else {
        mysqli_query($conn,"UPDATE tickets SET title='$title', description='$description' WHERE id=$ticket_id AND user_id=$user_id");
    }
    header("Location: dashboard.php");
    exit;
}
include 'header.php';
?>

<div class="row justify-content-center">
  <div class="col-md-7">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3 class="mb-3">Edit Ticket</h3>
        <form method="post">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" 
                   value="<?= htmlspecialchars($ticket['title']) ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($ticket['description']) ?></textarea>
          </div>
          <?php if($role=='admin'){ ?>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option <?= $ticket['status']=='Open'?'selected':'';?>>Open</option>
              <option <?= $ticket['status']=='In Progress'?'selected':'';?>>In Progress</option>
              <option <?= $ticket['status']=='Done'?'selected':'';?>>Done</option>
            </select>
          </div>
          <?php } else { ?>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" class="form-control" 
                   value="<?= htmlspecialchars($ticket['status']) ?>" disabled>
          </div>
          <?php } ?>
          <button class="btn btn-primary">Update</button>
          <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>