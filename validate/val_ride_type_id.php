<?php
//Bicycle Ride Journal
//val_ride_type_id.php
//validate input data for ride details form -- type (new or edit) and ride_id if editing existing ride. 


	$input_error = false;

	//get the activity type for the form - new or edit
	if (isset($_REQUEST['act'])) {
		$type = htmlentities($_REQUEST['act']);
		
		if ($type != 'new' && $type != 'edit') {
			//invalid value
			$input_error = true;
		}
	}
	else {
	//type not present in url or form variable
		$input_error = true;
	}
	
	if ($type == 'new') {
		//no ride_id exists yet - set a dummy value
		$ride_id = -1;
	}
	else  {
		//type is edit
		//ride_id should have been passed
		if (isset($_REQUEST['ride_id'])) {
			$ride_id = htmlentities($_REQUEST['ride_id']);
			if(is_numeric($ride_id) == false) {
				$input_error = true;
			}
		}
		else {
			//ride id is not present in url or form variable
			$input_error = true;
		}
	}	
	
	//if ($input_error) {
		//redirect to error page
	//	header('Location: view/error.php');
	//}
	
?>

<?php if ($input_error): ?> 
		<!--TEMPORARY error handling - will be enhanced later-->
		<div style="text-align: center;">
			<h5 class="danger">An error has occurred:</h5>
			Data needed to process the request contained an error.
			<p><a href="index.php?act=home">Home</a></p>
		</div>
<?php exit(0); endif; ?>