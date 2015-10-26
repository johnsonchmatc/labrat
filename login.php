<?php

  require_once('header.php');
  require_once('db.php'); 

  $error_msg = "";

  if (!isset($_SESSION['user_id'])) 
  {
      if (isset($_POST['submit'])) 
      {

          $user_username = mysqli_real_escape_string($mysqli, trim($_POST['username']));
          $user_password = mysqli_real_escape_string($mysqli, trim($_POST['password']));

          if (!empty($user_username) && !empty($user_password)) 
          {
            $query = "SELECT id, Username FROM Users WHERE Username = '$user_username' AND Password = SHA('$user_password');";
            $data = mysqli_query($mysqli, $query);

              if (mysqli_num_rows($data) == 1) 
              {
                  $row = mysqli_fetch_array($data);
                  $_SESSION['user_id'] = $row['id'];
                  $_SESSION['username'] = $row['Username'];
                  setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    
                  setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  
                  header('Location: ' . SITE_ROOT . '/index.php');
              }
              else {
                 $error_msg = "Sorry, you must enter your username and password to log in.  $query";
              }
          }
          else {
              $error_msg = "Sorry, you must enter your username and password to log in.  $query";
          }
      }
  }


  if (empty($_SESSION['user_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>

<form class="form-horizontal" action="<?= $_SERVER['PHP_SELF']; ?>" method="post" role="form">
  <fieldset>
    <legend></legend>

    <div class="form-group">
      <label for="Username" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
      <input type="text" class="form-control" name="username" id="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" >
      </div>
    </div>

    <div class="form-group">
      <label for="Password" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="password" id="password" >
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Log In</button>
      </div>
    </div>
  </fieldset>
</form>

<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>

<?php
  // Insert the page footer
  require('footer.php');
?>