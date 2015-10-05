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
    <div class="panel-body">
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>Name</th>
            <th>Asset </th>
            <th>Serial Number</th>
            <th>Date Added</th>
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

</div>

<?php include('footer.php') ?>        
