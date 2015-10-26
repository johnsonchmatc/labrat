<?php include('../header.php') ?>        
<?php require_once('../db.php') ?>


<?php
    $data = array('first_name' => '', 
                  'last_name' => '', 
                  'username' => '', 
                  'password' => '', 
                  'password_confirmation' => '', 
                  'encrypted_password' => '');
                  



    if (isset($_POST['submit'])) {
        $isset_error = false;
        
        if (isset($_POST['FirstName']) && !empty($_POST['FirstName']))
        {
            $data['first_name'] = mysqli_real_escape_string($mysqli, trim($_POST['FirstName']));
        }
        else
        {
            $isset_error = true;
        }

        if (isset($_POST['LastName']) && !empty($_POST['LastName']))
        {
            $data['last_name'] = mysqli_real_escape_string($mysqli, trim($_POST['LastName']));
        }

        if (isset($_POST['Username']) && !empty($_POST['Username']))
        {
            $data['username'] = mysqli_real_escape_string($mysqli, trim($_POST['Username']));
        }

        if (isset($_POST['Password']) && !empty($_POST['Password']))
        {
            $data['password'] = mysqli_real_escape_string($mysqli, trim($_POST['Password']));
        }

        if (isset($_POST['PasswordConfirmation']) && !empty($_POST['PasswordConfirmation']))
        {
            $data['password_confirmation'] = mysqli_real_escape_string($mysqli, trim($_POST['PasswordConfirmation']));
        }
        
        if ($isset_error == true){
            header('Location: new.php?error=missing_data');
        }

        if ($data['password'] != $data['password_confirmation'])
        {
          header('Location: new.php?error=password_match');
        }
        else
        {
            foreach($data as $item)
            {
              if (!isset($item) || empty($item))
              {
                  header('Location: new.php?error=missing_data');
              }
            }  

        }

    }
    else
    {
      //TODO: Send user back to new form with sticky data and error message
    }



    $first_name = $data['first_name']; 
    $last_name = $data['last_name']; 
    $username = $data['username'];
    $password = $data['password'];

    $query = "SELECT * FROM Users where Username = '$username';";
    $duplicate_username_results = mysqli_query($mysqli, $query);
    if (!$duplicate_username_results) {
        echo $query;
        exit("Database query error: ". mysql_error($mysqli));
    }

    $duplicate_usernames = mysqli_fetch_array($duplicate_username_results);

    if (count($duplicate_usernames) > 0)
    {
      header('Location: new.php?error=username');
    }
    else
    {
        $query = "INSERT INTO Users (FirstName, LastName, Username, Password) 
          VALUES ('$first_name', '$last_name', '$username', SHA('$password'));";

        $result = mysqli_query($mysqli, $query);
        if (!$result) {
          echo $query;
          exit("Database query error: ". mysql_error($mysqli));
        }
        else
        {
          header('Location: index.php');
        }
    }

?>

<?php include('../footer.php') ?>        