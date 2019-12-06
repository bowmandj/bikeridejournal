<!-- 
Bicycle Ride Journal
Ride detail for (add new and edit existing rides)
act = new or edit
 -->

<!--queries to get dropdown values will return these arrays: $clubs, $bikes, $starts, $events -->

<?php
//code to validate and create $type and $ride_id vars is in val_ride_type_id.php.

	if ($type == 'new') {
		$subhead_text = 'Enter the details for a new bike ride';
	}
	else  {
	//type is edit
		$subhead_text = 'Edit the details for a previously entered ride';
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
				<input type="text" id="ride_name" name="ride_name" class="" value="" size="50" maxlength="255">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="ride_date">Ride Date:<span class="instruct"> *</span></label>
			</div>
			<div class="col">		
				<input type="text" id="ride_date" name="ride_date" class="date-picker"  value="">
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
							echo '<option value="'.$i.'">'.$i.'</option>:';				
						}
					?>
				</select>
				<select id="start_minutes" name="start_minutes" class="">
					<option value="99">Select minutes</option>
					<option value="00">00</option>
					<option value="15">15</option>
					<option value="30">30</option>
					<option value="45">45</option>
							
				</select>				
				&nbsp; &nbsp;
				<input type="radio" id="start_ampm" name="start_ampm" class="" value="AM" <?php if($type == 'new'): ?>checked<?php endif;?>> AM &nbsp; &nbsp;
				<input type="radio" id="start_ampm" name="start_ampm" class="" value="PM"> PM
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
						<option value="<?php echo $start['location_code']; ?>"><?php echo $start['location_name']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="distance">Distance (miles):</label>
			</div>
			<div class="col">
				<input type="text" id="distance" name="distance" class=""  value="">
				<br>
				<small class="instruct">Round to the nearest whole number</small>
			</div>				
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="bike">Bike Used:</label>
			</div>
			<div class="col">
				<?php foreach($bikes as $bike) : ?>
					<input type="radio" id="bike" name="bike" class="" value="<?php echo $bike['code_value']; ?>" <?php if($type == 'new' && $bike['code_value'] == 'MAD'): ?>checked<?php endif;?>> 
				<?php echo $bike['code_desc']; ?>  &nbsp; &nbsp;
				<?php endforeach; ?>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="club_role">Bike Club: </label>
			</div>
			<div class="col">
				<?php foreach($clubs as $club) : ?>
					<div class="row">
						<div class="col-3">
							<?php echo $club['code_desc'].': '; ?>
						</div>
						<div class="col">						
							<input type="radio" id="<?php echo $club['code_value'].'_club_role';?>" name="<?php echo $club['code_value'].'_club_role';?>" value="LEAD"> Ride leader  &nbsp; &nbsp;
							<input type="radio" id="<?php echo $club['code_value'].'_club_role';?>" name="<?php echo $club['code_value'].'_club_role';?>" value="PART"> Participant &nbsp; &nbsp;
							<input type="radio" id="<?php echo $club['code_value'].'_club_role';?>" name="<?php echo $club['code_value'].'_club_role';?>" value="N/A" <?php if($type == 'new'): ?>checked<?php endif;?>> N/A 
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
				<input type="text" id="route_link" name="route_link" class="" value="">
				<br>
				<small class="instruct">Enter the route number to append to the url https://ridewithgps.com/routes/</small>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="route_rating">Route Rating:</label>
			</div>
			<div class="col">
				<?php foreach($route_ratings as $route_rating) : ?>
					<input type="radio" id="route_rating" name="route_rating" class="" value="<?php echo $route_rating['code_value']; ?>" <?php if($type == 'new' && $route_rating['code_value'] == '1'): ?>checked<?php endif;?>> 
				<?php echo $route_rating['code_desc']; ?>  &nbsp; &nbsp;
				<?php endforeach; ?>
				
				<!-- delete after testing
				<input type="radio" id="route_rating" name="route_rating" class="" value="2"> Great &nbsp;&nbsp;
				<input type="radio" id="route_rating" name="route_rating" class="" value="1" <?php if($type == 'new'): ?>checked<?php endif;?>> Good   &nbsp;&nbsp;
				<input type="radio" id="route_rating" name="route_rating" class="" value="0"> Never again &nbsp;&nbsp;  -->
			</div>
		</div>
		<div class="form-group row">
			<div class="col-3 text-right">
				<label for="ride_report">Ride Report URL:</label>
			</div>
			<div class="col">
				<input type="text" id="ride_report" name="ride_report" class="" value="">
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
					<?php foreach($events as $event) : ?>
						<option value="<?php echo $event['event_code'];?>" <?php if($type == 'new' && $event['event_code'] == 'X'): ?>checked<?php endif;?> > <?php echo $event['event_name'];?></option>
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
	
	


