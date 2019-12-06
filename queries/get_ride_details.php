<?php
	//Bicycle Ride Journal
	// get_ride_details.php
	//queries to get ride details for display or editing
	
	if ($type == 'edit') {
		//this query will get details for editing the ride - no need to join to ref tables
		
		if ($stmt = mysqli_prepare($conn, "SELECT rd.ride_name, rd.ride_date, rd.start_hour, rd.start_minutes, rd.start_ampm, rd.start_location, rd.bicycle, 
			rd.club_OHBTC, rd.club_BBC, rd.club_PPTC, rd.route_link, rd.route_rating, rd.ride_distance, rd.report_link, rd.event
			FROM ride_details rd 
			WHERE rd.ride_seq_no = ?")) {

			/* bind parameters for markers */
			mysqli_stmt_bind_param($stmt,"i", $ride_id);

			/* execute query */
			mysqli_stmt_execute($stmt);

			/* bind result variables */
			mysqli_stmt_bind_result($stmt, $ride_name, $ride_date, $start_hour, $start_minutes, $start_ampm, $start_location, $bike, $OHBTC_club_role, $BBC_club_role, $PPTC_club_role, $route_link, $route_rating, $ride_distance, $report_link, $event);

			/* fetch value */
			mysqli_stmt_fetch($stmt);
			
			$ride_name = htmlentities($ride_name); 
			$ride_date = htmlentities($ride_date);
			$start_hour = htmlentities($start_hour);
			$start_minutes = htmlentities($start_minutes); 
			$start_ampm = htmlentities($start_ampm);
			$start_location = htmlentities($start_location);
			$bike = htmlentities($bike);
			$OHBTC_club_role = htmlentities($OHBTC_club_role);
			$BBC_club_role = htmlentities($BBC_club_role);
			$PPTC_club_role = htmlentities($PPTC_club_role);
			$route_link = htmlentities($route_link);
			$route_rating = htmlentities($route_rating);
			$ride_distance = htmlentities($ride_distance);
			$report_link = htmlentities($report_link);
			$event = htmlentities($event);

		}
		else {
			echo '<div style="text-align: center;"><h5 class="danger">A database error has occurred.</h5><p><a href="index.php?act=home">Home</a></p></div>';
			die(0);
		}	
	}	

	else {
		//$src=ride_view - this query should join to ref tables to get descriptions for code values
		if ($stmt = mysqli_prepare($conn, 
			"SELECT rd.ride_name, rd.ride_date, rd.start_hour, rd.start_minutes, rd.start_ampm, rd.start_location, rd.bicycle, 
			case when rd.club_OHBTC = 'LEAD' then 'Ride Leader'
				when rd.club_OHBTC = 'PART' then 'Participant'
				else 'N/A'
			end AS OHBTC_club_role, 
			case when rd.club_BBC = 'LEAD' then 'Ride Leader'
				when rd.club_BBC = 'PART' then 'Participant'
				else 'N/A'
			end AS BBC_club_role, 
			case when rd.club_PPTC = 'LEAD' then 'Ride Leader'
				when rd.club_PPTC = 'PART' then 'Participant'
				else 'N/A'
			end AS PPTC_club_role, 
			IFNULL(rd.route_link, 0) AS route_link, rd.route_rating, IFNULL(rd.ride_distance,0) AS ride_distance, IFNULL(rd.report_link, 0) AS report_link, rd.event, gr1.code_desc AS bike_desc, gr2.code_desc AS rr_desc, slr.location_name, er.event_name
			FROM ride_details rd
				INNER JOIN start_location_ref slr ON rd.start_location = slr.location_code
				INNER JOIN event_ref er ON rd.event = er.event_code 
				LEFT OUTER JOIN general_ref gr1 ON rd.bicycle = gr1.code_value 
				LEFT OUTER JOIN general_ref gr2 on rd.route_rating = gr2.code_value
			WHERE rd.ride_seq_no = ? 
				AND gr1.code_grp = 'BIKES'
				AND gr2.code_grp = 'ROUTE_RATE'")) {

			/* bind parameters for markers */
			mysqli_stmt_bind_param($stmt,"i", $ride_id);

			/* execute query */
			mysqli_stmt_execute($stmt);

			/* bind result variables */
			mysqli_stmt_bind_result($stmt, $ride_name, $ride_date, $start_hour, $start_minutes, $start_ampm, $start_location, $bike, $OHBTC_club_role, $BBC_club_role, $PPTC_club_role, $route_link, $route_rating, $ride_distance, $report_link, $event, $bike_desc, $rr_desc, $location_name, $event_name);

			/* fetch value */
			mysqli_stmt_fetch($stmt);

			/* debug code
			echo $ride_name.','.$ride_date.','.$start_hour.','.$start_minutes.','.$start_ampm.','.$start_location.','.$bike.','.$OHBTC_club_role.','.$BBC_club_role.','.$PPTC_club_role.','.$route_link.','.$route_rating.','.$ride_distance.','.$report_link.','.$event.','.$bike_desc.','.$rr_desc.','.$location_name.','.$event_name;
			*/
			
			$ride_name = htmlentities($ride_name); 
			$ride_date = htmlentities($ride_date);
			$start_hour = htmlentities($start_hour);
			$start_minutes = htmlentities($start_minutes); 
			$start_ampm = htmlentities($start_ampm);
			$start_location = htmlentities($start_location);
			$bike = htmlentities($bike);
			$OHBTC_club_role = htmlentities($OHBTC_club_role);
			$BBC_club_role = htmlentities($BBC_club_role);
			$PPTC_club_role = htmlentities($PPTC_club_role);
			$route_link = htmlentities($route_link);
			$route_rating = htmlentities($route_rating);
			$ride_distance = htmlentities($ride_distance);
			$report_link = htmlentities($report_link);
			$event = htmlentities($event);
			$bike_desc = htmlentities($bike_desc);
			$rr_desc = htmlentities($rr_desc);
			$location_name = htmlentities($location_name);
			$event_name = htmlentities($event_name);
		
		
			
		}
		else {
			echo '<div style="text-align: center;"><h5 class="danger">A database error has occurred.</h5><p><a href="index.php?act=home">Home</a></p></div>';
			die(0);
		}	
		
		
	}
	
	/* close statement */
		mysqli_stmt_close($stmt);
	
		//close connection
		mysqli_close($conn);
?>

