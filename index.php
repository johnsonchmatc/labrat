<?php include('header.php') ?>        
<?php include('db.php') ?>

<div class="jumbotron">
  <h1>Lab Rat</h1>
  <p>This is a simple asset tracking system.</p>
  <p><a class="btn btn-primary btn-lg">Learn more</a></p>
</div>


<div class="row">
  <div class="panel panel-default col-md-6">
    <div class="panel-heading">Current Checked Out Items</div>
    <div class="panel-body">
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>Name</th>
            <th>AssetID</th>
            <th>Date checked out</th>
            <th>Checked out by</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
            <td>Column content</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="panel panel-default col-md-6">
    <div class="panel-heading">New Items in Inventory</div>

    <?php
        $query = "SELECT * FROM Assets ORDER BY id DESC;";
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            exit("Database query ($query) error: ". mysql_error($mysqli));
        }
    ?>
    <div class="panel-body">
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>Name</th>
            <th>Asset ID </th>
            <th>Serial Number</th>
            <th>Date Added</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($record = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?= $record['Name'] ?></td>
              <td><?= $record['AssetID'] ?></td>
              <td><?= $record['SerialNumber'] ?></td>
              <td><?= $record['CreatedAt'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<?php include('footer.php') ?>        
