<?php include('../header.php') ?>        
<?php require_once('../db.php') ?>
<?php 
    if(isset($_GET['error']))
    {
?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Oh snap!</strong> <?= $_GET['error'] ?> 
</div>
<?php
    }

?>
<form class="form-horizontal" action="create.php" method="post" role="form">
  <fieldset>
    <legend>Add new user</legend>

    <div class="form-group">
      <label for="FirstName" class="col-lg-2 control-label">First Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="FirstName" id="FirstName" >
      </div>
    </div>

    <div class="form-group">
      <label for="LastName" class="col-lg-2 control-label">Last Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="LastName" id="LastName" >
      </div>
    </div>

    <div class="form-group">
      <label for="Username" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="Username" id="Username" >
      </div>
    </div>

    <div class="form-group">
      <label for="Password" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="Password" id="Password" >
      </div>
    </div>

    <div class="form-group">
      <label for="PasswordConfirmation" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="PasswordConfirmation" id="PasswordConfirmation" >
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