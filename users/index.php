<?php include('../header.php') ?>        
<?php require_once('../db.php') ?>
<?php
    $query = "SELECT * FROM Users;";
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        exit("Database query ($query) error: ". mysql_error($mysqli));
    }
?>

<div class="row">
  <h2>User Management</h2>
  <p><a href="new.php">Add User</a></p>
</div>
<div class="row">
<table class="table table-striped table-hover col-md-12">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Username</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($record = mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?= $record['FirstName'] ?></td>
          <td><?= $record['LastName'] ?></td>
          <td><?= $record['Username'] ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>
</div>

<?php include('../footer.php') ?>        
