<?php 
//Bicycle Ride Journal
//val_ride_details.php
//validate ride details entered for new rides or edited for existing rides

/*
	Validate:
	ride_name is not blank
	ride_date is not blank
	start_time is not blank
	start_location is not blank
	route_link is numeric
	report link is numeric
	distance is numeric
	
	
*/	

	// define variables and set to empty values
	$ride_name 			= "";
	$ride_date 			= "";
	$start_time 		= "";
	$start_ampm 		= "";
	$start_location 	= "";
	$ride_distance		= "";
	$bike 				= "";
	$OHBTC 				= "";
	$BBC		 		= "";
	$PPTC			 	= "";
	$route_link 		= "";
	$route_rating 		= "";
	$report_link 		= "";
	$event 				= "";
	$action_type		= "";
	$ride_id			= "";
	
	//define error_message and start_time error indicator
	$error_message = array();
	$time_err = 0;
	
	function test_input($data) {
			$data = trim($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		//var_dump($_POST);

	// get the data and do initial sanitizing
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$ride_name 			= test_input($_POST["ride_name"]);
		$ride_date 			= test_input($_POST["ride_date"]);
		$start_hour 		= test_input($_POST["start_hour"]);
		$start_minutes 		= test_input($_POST["start_minutes"]);
		$start_ampm 		= test_input($_POST["start_ampm"]);
		$start_location 	= test_input($_POST["start_location"]);
		$ride_distance		= test_input($_POST["ride_distance"]);
		$bike 				= test_input($_POST["bike"]);
		$OHBTC				= test_input($_POST["OHBTC"]);
		$BBC		 		= test_input($_POST["BBC"]);
		$PPTC			 	= test_input($_POST["PPTC"]);
		$route_link 		= test_input($_POST["route_link"]);
		$route_rating 		= test_input($_POST["route_rating"]);
		$report_link 		= test_input($_POST["report_link"]);
		$event 				= test_input($_POST["event"]);
		$action_type 		= test_input($_POST["action_type"]);
		$ride_id	 		= test_input($_POST["ride_id"]);
		
	
		// Validate required fields
		if (strlen($ride_name) == 0) {
			$error_message[] = "Ride Name is required.";
		}
		if (strlen($ride_date) == 0) {
			$error_message[] = "Ride Date is required.";
		}
		if (strlen($start_location) == 0 || $start_location == 'X') {
			$error_message[] = "Start Location is required.";
		}
		
		if (strlen($start_hour) == 0 || $start_hour == 99 || strlen($start_minutes) == 0 || $start_minutes == 99) {
			$error_message[] = "Start Time is required.";			
		}
		
		if (strlen($start_ampm) == 0) {
			$error_message[] = "Start time - AM or PM is required.";			
		}
		else {
			if ($start_ampm !== 'AM' && $start_ampm !== 'PM') {
				$error_message[] = "Start time - AM or PM is invalid.";
			}
		}
		
		//validate non-required fields that must be numeric if provided route_link, distance, report_link
		if (strlen($route_link) > 0 && !filter_var($route_link, FILTER_VALIDATE_INT)) {
			$error_message[] = "Ride with GPS Link must be a number.";
		}
		if (strlen($ride_distance) > 0 && !filter_var($ride_distance, FILTER_VALIDATE_INT)) {
			$error_message[] = "Distance must be a whole number.";
		}
		if (strlen($report_link) > 0 && !filter_var($report_link, FILTER_VALIDATE_INT)) {
			$error_message[] = "Ride Report URL must be a number.";
		}
		
		//validate action type and ride id
		if ($action_type !== 'new' && $action_type !== 'edit') {
			$error_message[] = "An error occurred with the form submission type.";
		}
		if (is_numeric($ride_id) == false) {
			$error_message[] = "An error occurred with the form submission ID.";
		}
	} // end if request_method = post
	
	
	else {
		$error_message[] = "An error occurred with the form submission.";
	}
	
?>


<?php if (count($error_message) > 0): ?> 
		<!--TEMPORARY error handling - will be changed to return to form to correct the errors-->
		<div style="text-align: center;">
			<h5 class="danger">The following errors have occurred:</h5>
				<?php foreach($error_message as $error): ?>
					<ul>
						<li><?php echo $error ?></li>
					</ul>
				<?php endforeach; ?>
			<p><a href="index.php?act=new">Enter New Ride</a></p>
		</div>
<?php exit(0); endif; ?>


