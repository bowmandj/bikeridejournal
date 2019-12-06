<?php
//Bicycle Ride Journal
//val_ride_view.php
//validate input data for ride view page -- type (ride_view) and ride_id. 
//used for confirmation of saved ride details or to view details of a ride selected from the summary report.

	$input_error = false;

	//get the activity type for the form - new or edit
	if (isset($_REQUEST['act'])) {
		$type = htmlentities($_REQUEST['act']);
		
		if ($type != 'ride_view') {
			//invalid value
			$input_error = true;
		}
	}
	else {
	//type not present in url or form variable
		$input_error = true;
	}
	
	//get the ride_id
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
	
	//get the caller -- summary report or saved new/edited ride
	if (isset($_REQUEST['src'])) {
		$src = htmlentities($_REQUEST['src']);
		if ($src != 'rpt' && $src != 'save') {
			//invalid value
			$input_error = true;
		}
	}
	else {
		//src is not present in url or form variable
		$input_error = true;
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