
$(document).ready(function(){

		
	 
		$( function() {
			$( "#ride_date" ).datepicker();
		} );


		$("#submit_details").click (function() {
				var error_message = "";
				var missing = "";
				var err_begin = "<div class='alert alert-danger' role='alert'>";
				var err_end = "</div>";
				
											
				if ($("#ride_name").val().length == 0) {
					missing += "<li>Ride Name</li>";
				}
				if ($("#ride_date").val().length == 0) {
					missing += "<li>Ride Date</li>";
				}
				if ($("#start_location").val() == 'X') {
					missing += "<li>Start Location</li>";
				}

				if ($("#start_hour").val() == 99 || $("#start_minutes").val() == 99) {
					missing += "<li>Start Time</li>";
				}
	
								
				//route_link, report_link, ride distance - not required but must be numeric if entered
				if ($("#route_link").val().length > 0 && $.isNumeric($("#route_link").val()) == false) {
					error_message += "<li>Ride with GPS Link must be a number</li>";
				}
				
				if ($("#report_link").val().length > 0 &&$.isNumeric($("#report_link").val()) == false) {
					error_message += "<li>Ride Report URL must be a number</li>";
				}
				
				if ($("#ride_distance").val().length > 0 &&$.isNumeric($("#ride_distance").val()) == false) {
					error_message += "<li>Distance must be a whole number</li>";
				}
				
				if (missing.length > 0) {
					missing = "<p>The following fields are required:<ul>" + missing + "</ul></p>";
				}
				if (error_message.length > 0) {
					error_message = "<p>The following fields have errors:<ul>" + error_message + "</ul></p>";
				}
				
				if ((error_message.length > 0) || (missing.length > 0)) {
					$("#error_message").html(err_begin + missing + error_message + err_end);
					return false;
				}
				else {
					return true;
				}
			});
	
		
});