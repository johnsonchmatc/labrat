<?php include('../header.php') ?>        
<?php include('../db.php') ?>

<?php
    $show_form = false;
    if (isset($_POST['submit'])) {
        $temp_file = $_FILES['BulkAssetFile']['tmp_name'];
        $row = 1;

        if (($handle = fopen($temp_file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                $asset_id = $data[0];
                $asset_name =  addslashes($data[1]);
                $serial_number = addslashes($data[2]);
                $description = $data[3];

                $query = "INSERT INTO Assets (AssetID, SerialNumber, Name, Description) 
                                 VALUES ('$asset_id', '$serial_number', '$asset_name', '$description');";
                $result = mysqli_query($mysqli, $query);
                if (!$result) {
                    echo $query;
                    exit("Database query error: ". mysqli_error($mysqli));
                }
                $row++;
            }
            fclose($handle);
        }
        //Assume that if we got here we are good to go
        unlink($temp_file);
        header('Location: index.php');
    }
    else
    {
      $show_form = true;
    }
?>

<?php if($show_form) : ?>
    <form class="form-horizontal" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" role="form">
      <fieldset>
        <legend>Bulk Import Assets</legend>

        <div class="form-group">
          <label for="BulkAssetFile" class="col-lg-2 control-label">Bulk Asset Import CSV File</label>
          <div class="col-lg-10">
            <input type="file" class="form-control" name="BulkAssetFile" id="BulkAssetFile" >
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </fieldset>
    </form>
<?php endif ?>

<?php include('../footer.php') ?>        
