<?php include('../header.php') ?>        
<?php include('../db.php') ?>
<h2>Assets</h2>
<?php
    $query = "SELECT * FROM Assets;";
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        exit("Database query ($query) error: ". mysql_error($mysqli));
    }
?>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Name</th>
      <th>AssetID</th>
      <th>Serial Number</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($record = mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?= $record['Name'] ?></td>
          <td><?= $record['AssetID'] ?></td>
          <td><?= $record['SerialNumber'] ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>

<?php include('../footer.php') ?>        
