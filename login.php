<?php

  require_once('header.php');
  require_once('db.php'); 

  $error_msg = "";

  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {

      $user_username = mysqli_real_escape_string($mysqli, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($mysqli, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {

        //$query = "INSERT INTO Users (FirstName, LastName, Username, Password) 
          //VALUES ('$first_name', '$last_name', '$username', SHA('$encrypted_password'));";

        $query = "SELECT id, Username FROM Users WHERE Username = '$user_username' AND Password = SHA('$user_password');";
        $data = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($data) == 1) {
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
        $error_msg = "Sorry, you must enter your username and password to log in.  $query";
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = "Sorry, you must enter your username and password to log in.  $query";
      }
    }
  }


  if (empty($_SESSION['user_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Log In</legend>
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
      <label for="password">Password:</label>
      <input type="password" name="password" />
    </fieldset>
    <input type="submit" value="Log In" name="submit" />
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
