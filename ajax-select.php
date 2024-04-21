<?php
	require_once 'app/connection.php';

	$dStatus = 'Enable';
	if(isset($_POST["dName"]) && !empty($_POST["dName"])){

		$districtSelect = $con->prepare("select * from district where regioName = ? && status = ?  order by districtName ASC ");
         $districtSelect->execute([$_POST["dName"],$dStatus]);

         if ($districtSelect->rowCount() > 0) {
         	echo '<option value="NULL">Select district</option>';

		    while ($disRow = $districtSelect->fetch(PDO::FETCH_OBJ)) {
		?>
		        <option value="<?php echo $disRow->districtName; ?>"><?php echo $disRow->districtName ?></option>
		<?php
		      }
         } 	else  { 
	        echo '<option value="NULL">Select region first</option>';
	    }
	} else {
		echo "this is wrong info displayed here ";
	}

	if(isset($_POST["id"]) && !empty($_POST["id"])){
		$shehiaSelect = $con->prepare("select * from shehia where districtName = ? && status = ?  order by shehiaName ASC ");
        $shehiaSelect->execute([$_POST["id"],$dStatus]);

        if ($shehiaSelect->rowCount() > 0) {
         	echo '<option value="NULL">Select neighborhood</option>';

		    while ($sheRow = $shehiaSelect->fetch(PDO::FETCH_OBJ)) {
		?>
		        <option value="<?php echo $sheRow->shehiaName; ?>"><?php echo $sheRow->shehiaName ?></option>
		<?php
		      }
         } 	else  { 
	        echo '<option value="NULL">Select district first ..</option>';
	    }

	}
