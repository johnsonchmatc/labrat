<?php include('../header.php') ?>        
<?php require_once('../db.php') ?>



<form class="form-horizontal" action="create.php" method="post" role="form">
  <fieldset>
    <legend>Add new asset</legend>

    <div class="form-group">
      <label for="AssetName" class="col-lg-2 control-label">Asset Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="AssetName" id="AssetName" >
      </div>
    </div>

    <div class="form-group">
      <label for="AssetID" class="col-lg-2 control-label">Asset ID</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="AssetID" id="AssetID" >
      </div>
    </div>

    <div class="form-group">
      <label for="SerialNumber" class="col-lg-2 control-label">Serial Number</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="SerialNumber" id="SerialNumber" >
      </div>
    </div>

    <div class="form-group">
      <label for="Description" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="Description" name="Description"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

<?php include('../footer.php') ?>        
