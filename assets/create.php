<?php include('../header.php') ?>        
<?php require_once('../db.php') ?>


<?php
    //Validate data
    if (isset($_POST['submit'])) {
        if (isset($_POST['AssetName'])){
            $asset_name = $_POST['AssetName'];
        }

        if (isset($_POST['AssetID'])){
            $asset_id = $_POST['AssetID'];
        }

        if (isset($_POST['SerialNumber'])){
            $serial_number = $_POST['SerialNumber'];
        }

        if (isset($_POST['Description'])){
            $description = $_POST['Description'];
        }
    }
    else
    {
      //TODO: Send user back to new form with sticky data and error message
    }
      
    if (isset($asset_name) && isset($asset_id) && isset($serial_number) && isset($description)) 
    {
        $time_added = date("Y-m-d H:i:s"); //The business wants the time to show when it was created even in bulk
        $query = "INSERT INTO Assets (AssetID, SerialNumber, Name, Description, CreatedAt) 
                             VALUES ('$asset_id', '$serial_number', '$asset_name', '$description', '$time_added');";
        
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            echo $query;
            exit("Database query error: ". mysql_error($mysqli));
        }
        else
        {
          // We want them to see their post
          header('Location: index.php');
        }
    } 
    else 
    {
      //TODO: Send user back to new form with sticky data and error message
    }
     
?>

<?php include('../footer.php') ?>        
