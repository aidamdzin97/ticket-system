<?php
include 'db.php';
session_start();
if(!isset($_SESSION['user_id'])){ header("Location: login.php"); exit; }

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

if($role=='admin'){
    $result = mysqli_query($conn,"SELECT * FROM tickets ORDER BY created_at DESC");
}else{
    $result = mysqli_query($conn,"SELECT * FROM tickets WHERE user_id=$user_id ORDER BY created_at DESC");
}
include 'header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2 class="h4 mb-0">Dashboard</h2>
</div>

<div class="card shadow-sm">
  <div class="card-body p-0">
    <table class="table table-striped table-hover mb-0">
      <thead class="table-dark">
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Status</th>
          <th>Created</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row=mysqli_fetch_assoc($result)){ ?>
        <tr>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td><?= htmlspecialchars($row['description']) ?></td>
          <td>
            <?php
              $badge = ['Open'=>'primary','In Progress'=>'warning text-dark','Done'=>'success'];
              $class = $badge[$row['status']] ?? 'secondary';
            ?>
            <span class="badge bg-<?= $class ?>"><?= htmlspecialchars($row['status']) ?></span>
          </td>
          <td><?= htmlspecialchars($row['created_at']) ?></td>
          <td class="text-end">
            <a href="edit-ticket.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-info">Edit</a>
            <?php if($role=='admin'){ ?>
              <a href="delete-ticket.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
            <?php } ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php include 'footer.php'; ?>


