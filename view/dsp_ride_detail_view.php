<!-- 
Bicycle Ride Journal
Ride Detail View page (readonly)
act = ride_view
 -->

<?php
//code to validate and create $type, $ride_id and $src vars is in val_ride_view.php.

//ADD HTMLENTITIES!!!

	//set subhead based on caller
	if ($src == 'rpt') {
		$subhead_text = 'Ride Details -- click the Edit button to make changes';
	}
	else  {
	//type is save
		$subhead_text = 'Your bike ride was saved successfully';
	}		

	//set complete urls for route and ride report
	if ($route_link > 0) {
		$route_url = 'https://ridewithgps.com/routes/'.$route_link;
	}
	else {
		$route_url = 'N/A';
	}
	
	if ($report_link > 0) {
		$report_url = 'http://ohbike.memberlodge.org/reports/'.$report_link;
	}
	else {
		$report_url = 'N/A';
	}
	
	
	//change date format to mm/dd/yyyy 
	$ride_date = date("m/d/Y", strtotime($ride_date));
	
?>	


<h3 class=mb-2>Ride Details</h3>
	
	<h4 class="mb-3"><?php echo $subhead_text; ?></h4>		 
	
	
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="ride_name">Ride Name:</label> 
			</div>
			<div class="col">
				<?php echo $ride_name; ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="ride_date">Ride Date:</label>
			</div>
			<div class="col">		
				<?php echo $ride_date; ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="start_time">Start Time:</label>
			</div>
			
			<div class="col"> 
				<?php echo $start_hour.':'.$start_minutes.' '.$start_ampm; ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="start_location">Start Location:</label>		
			</div>
			<div class="col">
				<?php echo $location_name; ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="distance">Distance (miles):</label>
			</div>
			<div class="col">
				<?php echo $ride_distance; ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="bike">Bike Used:</label>
			</div>
			<div class="col">
				<?php echo $bike_desc; ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="club_role">Bike Club: </label>
			</div>
			<div class="col">
					<div class="row">
						<div class="col-3">
							Oxon Hill Club: 
						</div>
						<div class="col">						
							<?php echo $OHBTC_club_role; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							Baltimore Bike Club: 
						</div>
						<div class="col">						
							<?php echo $BBC_club_role; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							Potomac Pedalers: 
						</div>
						<div class="col">						
							<?php echo $PPTC_club_role; ?>
						</div>
					</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="route_link">Ride with GPS Route:</label>
			</div>
			<div class="col">
				<?php if($route_url == 'N/A') : ?>
					N/A
				<?php else : ?>
					<a href="<?php echo $route_url ?>" target="_blank"><?php echo $route_url ?></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="route_rating">Route Rating:</label>
			</div>
			<div class="col">
				<?php echo $rr_desc ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="ride_report">Ride Report URL:</label>
			</div>
			<div class="col">
				<?php if($report_url == 'N/A') : ?>
					N/A
				<?php else : ?>
					<a href="<?php echo $report_url ?>" target="_blank"><?php echo $report_url ?></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="event">Event: </label>
			</div>
			<div class="col">
				<?php echo $event_name ?>
			</div>
		</div>
	
	
	<form id="view_form" method="post" action="index.php?act=edit">
		<!-- pass the action type (edit) -->
		<input type="hidden" id="action_type" name="action_type" value="edit">
		<!-- pass the ride number -->
		<input type="hidden" id="ride_id" name="ride_id" value="<?php echo $ride_id ?>">
		<div class="form-group row float-right">
			<input type="submit" name="edit_ride" id="edit_ride" value="Edit this bike ride">
		</div>
	</form>
	
	


