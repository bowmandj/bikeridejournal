<?php
	//Bicycle Ride Journal
	// get_dropdowns.php
	//queries to get values for form dropdowns
	//bike clubs, bikes, start locations, events
	//returned arrays are $clubs, $bikes, $starts, $events
	
	
	//get bike clubs
	$query_clubs = "SELECT code_value, code_desc
			FROM general_ref
			WHERE code_grp = 'CLUBS'
				AND enabled_yn = 'Y'
			ORDER BY display_order";
	
	//get the result
	$result_clubs = mysqli_query($conn, $query_clubs);
	
	//fetch data into associative array
	$clubs = mysqli_fetch_all($result_clubs, MYSQLI_ASSOC);
	//var_dump($clubs); //debug
	
	
	//get bikes
	$query_bikes = "SELECT code_value, code_desc
			FROM general_ref
			WHERE code_grp = 'BIKES'
				AND enabled_yn = 'Y'
			ORDER BY display_order";
	
	//get the result
	$result_bikes = mysqli_query($conn, $query_bikes);
	
	//fetch data into associative array
	$bikes = mysqli_fetch_all($result_bikes, MYSQLI_ASSOC);
	
	
	//get start locations
	$query_starts = "SELECT location_code, location_name
			FROM start_location_ref
			WHERE enabled_yn = 'Y'
			ORDER BY location_name";
	
	//get the result
	$result_starts = mysqli_query($conn, $query_starts);
	
	//fetch data into associative array
	$starts = mysqli_fetch_all($result_starts, MYSQLI_ASSOC);
	
	
	//get events
	$query_events = "SELECT event_code, event_name
			FROM event_ref
			WHERE enabled_yn = 'Y'
			ORDER BY event_name";
	
	//get the result
	$result_events = mysqli_query($conn, $query_events);
	
	//fetch data into associative array
	$events = mysqli_fetch_all($result_events, MYSQLI_ASSOC);
	
	//get route rating
	$query_route_rate = "SELECT code_value, code_desc
			FROM general_ref
			WHERE code_grp = 'ROUTE_RATE'
				AND enabled_yn = 'Y'
			ORDER BY display_order";
	
	//get the result
	$result_route_rate = mysqli_query($conn, $query_route_rate);
	
	//fetch data into associative array
	$route_ratings = mysqli_fetch_all($result_route_rate, MYSQLI_ASSOC);
	
	
	
	//queries are finished
	//free results from memory
	mysqli_free_result($result_clubs);
	mysqli_free_result($result_bikes);
	mysqli_free_result($result_starts);
	mysqli_free_result($result_events);
	mysqli_free_result($result_route_rate);
	
		
?>