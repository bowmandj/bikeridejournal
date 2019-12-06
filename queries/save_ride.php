<?php
//Bicycle Ride Journal
//save_rides.php
//save new or edited ride details -- after validation 

	//if error_message array contains any errors, the script should have stopped and this file should not be called. This is here for insurance.
	if (isset($error_message) AND count($error_message) > 0) {
		header('Location: index.php?act=home');
	}	
	else {
		
		//no validation errors, continue with the query to insert the data
		$ride_name 			= mysqli_real_escape_string($conn, $ride_name);
		$ride_date 			= mysqli_real_escape_string($conn, $ride_date);
		$start_hour 		= mysqli_real_escape_string($conn, $start_hour);
		$start_minutes 		= mysqli_real_escape_string($conn, $start_minutes);
		$start_ampm 		= mysqli_real_escape_string($conn, $start_ampm);
		$start_location 	= mysqli_real_escape_string($conn, $start_location);
		$distance			= mysqli_real_escape_string($conn, $distance);
		$bike 				= mysqli_real_escape_string($conn, $bike);
		$OHBTC_club_role 	= mysqli_real_escape_string($conn, $OHBTC_club_role);
		$BBC_club_role 		= mysqli_real_escape_string($conn, $BBC_club_role);
		$PPTC_club_role 	= mysqli_real_escape_string($conn, $PPTC_club_role);
		$route_link 		= mysqli_real_escape_string($conn, $route_link);
		$route_rating 		= mysqli_real_escape_string($conn, $route_rating);
		$ride_report 		= mysqli_real_escape_string($conn, $ride_report);
		$event 				= mysqli_real_escape_string($conn, $event);
		$action_type		= mysqli_real_escape_string($conn, $action_type);
		$ride_id			= mysqli_real_escape_string($conn, $ride_id);
				
		//change date format from mm/dd/yyyy to yyyy-MM-dd
		$ride_date = date("Y-m-d", strtotime($ride_date));	
				
		if ($action_type == 'new') {
			//new ride details --  add new record to database
									
				// prepare and bind
				$stmt = mysqli_prepare($conn, "INSERT INTO ride_details (ride_name, ride_date, start_hour, start_minutes, start_ampm, start_location, bicycle, club_ohbtc, club_bbc, club_pptc, route_link, route_rating, ride_distance, report_link, event) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				mysqli_stmt_bind_param($stmt,"ssssssssssdiids", $ride_name, $ride_date, $start_hour, $start_minutes, $start_ampm, $start_location, $bike, $OHBTC_club_role, $BBC_club_role, $PPTC_club_role, $route_link, $route_rating, $ride_distance, $report_link, $event);

				/* execute prepared statement */
				mysqli_stmt_execute($stmt);
				
				if (mysqli_stmt_errno($stmt) !== 0) {
					$err_msg = 'The following error occurred: '.mysqli_stmt_error($stmt).'('.mysqli_stmt_errno($stmt).')';
				}
				else {
					$err_msg = '';
					//no error with query so get the ride_seq_no for the inserted recorded
					//mysqli_insert_id() returns ID or 0
					$ride_id = mysqli_insert_id($conn);
				}
				
								
		}
		
		else {
			//editing existing ride details --  update existing record in the database
			
			// prepare and bind
				$stmt = mysqli_prepare($conn, "UPDATE ride_details SET ride_name=?, ride_date=?, start_hour=?, start_minutes=?, start_ampm=?, start_location=?, bicycle=?, club_ohbtc=?, club_bbc=?, club_pptc=?, route_link=?, route_rating=?, ride_distance=?, report_link=?, event=? WHERE ride_seq_no=?");
				mysqli_stmt_bind_param($stmt,"ssssssssssdiidsi", $ride_name, $ride_date, $start_hour, $start_minutes, $start_ampm, $start_location, $bike, $OHBTC_club_role, $BBC_club_role, $PPTC_club_role, $route_link, $route_rating, $ride_distance, $report_link, $event, $ride_id);

				/* execute prepared statement */
				mysqli_stmt_execute($stmt);
				
				if (mysqli_stmt_errno($stmt) !== 0) {
					$err_msg = 'The following error occurred: '.mysqli_stmt_error($stmt).'('.mysqli_stmt_errno($stmt).')';
				}
				else {
					$err_msg = '';
				}
			
		}
	
		//debug code 
		//printf("Error: %d.\n", mysqli_stmt_errno($stmt));
		//printf("Error: %d.\n", mysqli_stmt_error($stmt));
		//printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));

		$stmt->close();
		$conn->close();
		
	}
	
	header('Location: index.php?act=ride_view&ride_id='.$ride_id.'&src=save');
	
	
	/*
	<div style="text-align: center;">
	<?php if (strlen($err_msg == 0)): ?> 
	<!--TEMPORARY  - will be changed to redirect to confirmation page -->
		<h5 >Success! New ride is <?php echo $ride_id; ?></h5>
	<?php else : ?>		
		<div style="text-align: center;">
		<h5 class="danger">The following error has occurred:</h5>
			<p><?php echo $err_msg ?></p>
	<?php endif; ?>
		<p><a href="index.php?act=home">Home</a></p>
	</div>
	*/
?>
	
	