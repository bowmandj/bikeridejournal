<!-- 
Bicycle Ride Journal
Ride detail for (add new and edit existing rides)
act = new or edit
 -->

<!--queries to get dropdown values will return these arrays: $clubs, $bikes, $starts, $events -->

<?php
//code to validate and create $type and $ride_id vars is in val_ride_type_id.php.

	if ($type == 'new') {
		// set subhead
		$subhead_text = 'Enter the details for a new bike ride';
		// initialize form values
		$ride_name 		= ''; 
		$ride_date 		= '';
		$start_hour 	= '';
		$start_minutes 	= ''; 
		$start_ampm 	= 'AM';
		$start_location	= 'X';
		$bike 			= 'MAD';
		$OHBTC 			= 'N/A';
		$BBC 			= 'N/A';
		$PPTC 			= 'N/A';
		$route_link 	= '';
		$route_rating 	= 1;
		$ride_distance 	= '';
		$report_link 	= '';
		$event 			= 'X';
		
	}
	else  {
	//type is edit
		$subhead_text = 'Edit the details for a previously entered ride';		
	}
	
	function setClubRole($club_name, $button_val, $club_role) {
	/* Determine which radio button for club role (leader, participant, n/a) should be checked when the page loads.
	 Params passed to this function: 
		club_name = the name of the radio button (which is a club name acronym -- OHBTC, BBC, PPTC) 
		the value for a specific button (LEAD, PART, N/A)
		the value of either $OHBTC, $BBC or $PPTC -- these are the club role values from the database (for editing a ride) or set as default above (for a new ride).
	 Compare the value for the button to the value in the variable $OHBTC, $BBC or $PPTC -- if they are equal, the button should be checked. 
	 */
		
		$retval = '';
		if ($button_val == $club_role) {
			$retval = 'checked';
		}
		/*switch($club_name) {
			case 'OHBTC':
				if ($role_val == $club_role) {
					$retval = 'checked';
				}
			break;
			
			case 'BBC':
				if ($role_val == $BBC) {
					$retval = 'checked';
				}
			break;
			
			case 'PPTC': 
				if ($role_val == $PPTC) {
					$retval = 'checked';
				}
			break;
			
			default:
				if ($role_val == 'N/A') {
					$retval = 'checked';
				}
			
		 }*/ //end switch

		return $retval;
	}	

?>		

<h3 class=mb-2>Ride Details</h3>
		
	<h4 class="mb-3"><?php echo $subhead_text; ?></h4>
			
	<div id="error_message" role="alert"> </div>
			
	<p class="mb-2 instruct">* Indicates a required field</p>
				 
		
	<form id="ride_form" method="post" action="index.php?act=save_details">
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="ride_name">Ride Name:<span class="instruct"> *</span></label> 
			</div>
			<div class="col">
				<input type="text" id="ride_name" name="ride_name" class="" value="<?php echo $ride_name; ?>" size="50" maxlength="255">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="ride_date">Ride Date:<span class="instruct"> *</span></label>
			</div>
			<div class="col">		
				<input type="text" id="ride_date" name="ride_date" class="date-picker"  value="<?php echo $ride_date; ?>">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="start_time">Start Time:<span class="instruct"> *</span></label>
			</div>
					
			<div class="col"> 
				<select id="start_hour" name="start_hour" class="">
					<option value="99">Select hour</option>
					<?php 
						for($i = 1; $i <= 12; $i++) {
							if ($i == $start_hour) {
								$dsp_selected = "selected";
							}
							else {
								$dsp_selected = "";
							}
							echo '<option value="'.$i.'" '.$dsp_selected.'>'.$i.'</option>:';				
						}
					?>
				</select>
				<select id="start_minutes" name="start_minutes" class="">
					<option value="99">Select minutes</option>
					<option value="00" <?php if($start_minutes == '00'): ?>selected<?php endif;?>>00</option>
					<option value="15"<?php if($start_minutes == '15'): ?>selected<?php endif;?>>15</option>
					<option value="30" <?php if($start_minutes == '30'): ?>selected<?php endif;?>>30</option>
					<option value="45" <?php if($start_minutes == '45'): ?>selected<?php endif;?>>45</option>
							
				</select>				
				&nbsp; &nbsp;
				<input type="radio" id="start_ampm" name="start_ampm" class="" value="AM" <?php if($start_ampm == 'AM'): ?>checked<?php endif;?>> AM &nbsp; &nbsp;
				<input type="radio" id="start_ampm" name="start_ampm" class="" value="PM" <?php if($start_ampm == 'PM'): ?>checked<?php endif;?>> PM
			</div>
			</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="start_location">Start Location:<span class="instruct"> *</span></label>		
			</div>
			<div class="col">
				<select id="start_location" name="start_location" class="">
					<option value="X">Select a start location</option>
					<?php foreach($starts as $start) : ?>
						<option value="<?php echo $start['location_code']; ?>" <?php if($start['location_code'] == $start_location): ?>selected<?php endif;?>><?php echo $start['location_name']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="ride_distance">Distance (miles):</label>
			</div>
			<div class="col">
				<input type="text" id="ride_distance" name="ride_distance" class=""  value="<?php echo $ride_distance; ?>">
				<br>
				<small class="instruct">Round to the nearest whole number</small>
			</div>				
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="bike">Bike Used:</label>
			</div>
			<div class="col">
				<?php foreach($bikes as $thebike) : ?>
					<input type="radio" id="bike" name="bike" class="" value="<?php echo $thebike['code_value']; ?>" <?php if($thebike['code_value'] == $bike): ?>checked<?php endif;?>> 
					<?php echo $thebike['code_desc']; ?>  &nbsp; &nbsp;
				<?php endforeach; ?>
			</div>
		</div>
		<div class="form-group row">		
			<div class="col-3 text-right">
				<label for="club">Bike Club: </label>
			</div>
				<div class="col">
					<?php foreach($clubs as $club) : ?>
						<div class="row">
							<div class="col-3">
								<?php echo $club['code_desc'].': '; ?>
							</div>
							<div class="col">						
								<input type="radio" id="<?php echo $club['code_value'];?>" name="<?php echo $club['code_value'];?>" value="LEAD" 
									<?php echo setClubRole($club['code_value'], 'LEAD', $OHBTC); ?>> Ride leader  &nbsp; &nbsp;
								<input type="radio" id="<?php echo $club['code_value'];?>" name="<?php echo $club['code_value'];?>" value="PART" 
									<?php echo setClubRole($club['code_value'], 'PART', $BBC); ?>> Participant &nbsp; &nbsp;
								<input type="radio" id="<?php echo $club['code_value'];?>" name="<?php echo $club['code_value'];?>" value="N/A" 
									<?php echo setClubRole($club['code_value'], 'N/A', $PPTC); ?>> N/A 
							</div>
						</div>
					<?php endforeach; ?>
				</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="route_link">Ride with GPS Route:</label>
			</div>
			<div class="col">
				<input type="text" id="route_link" name="route_link" class="" value="<?php if($route_link > 0) : echo $route_link; endif;?>">
				<br>
				<small class="instruct">Enter the route number to append to the url https://ridewithgps.com/routes/</small>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="route_rating">Route Rating:</label>
			</div>
			<div class="col">
				<?php foreach($route_ratings as $theroute_rating) : ?>
					<input type="radio" id="route_rating" name="route_rating" class="" value="<?php echo $theroute_rating['code_value']; ?>" <?php if($theroute_rating['code_value'] == $route_rating): ?>checked<?php endif;?>> 
				<?php echo $theroute_rating['code_desc']; ?>  &nbsp; &nbsp;
				<?php endforeach; ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="report_link">Ride Report URL:</label>
			</div>
			<div class="col">
				<input type="text" id="report_link" name="report_link" class="" value="<?php if($report_link > 0) : echo $report_link;  endif;?>">
				<br>
				<small class="instruct">Enter the report number to append to the url http://ohbike.memberlodge.org/reports/</small>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="event">Event: </label>
			</div>
			<div class="col">
				<select id="event" name="event" class="">
					<?php foreach($events as $theevent) : ?>
						<option value="<?php echo $theevent['event_code'];?>" <?php if($theevent['event_code'] == $event): ?>selected<?php endif;?> > <?php echo $theevent['event_name'];?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<!-- pass the action type (new or edit) -->
		<input type="hidden" id="action_type" name="action_type" value="<?php echo $type ?>">
		<!-- pass the ride number -->
		<input type="hidden" id="ride_id" name="ride_id" value="<?php echo $ride_id ?>">
		<div class="form-group row float-right">
			<input type="submit" name="submit_details" id="submit_details" value="Submit">
		</div>
	</form>
	
	


