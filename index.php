<?php 
// This file includes php files to query the database, display output, validate code, etc., based on the value of the act variable passed to it.

	//include config file
	require 'config/config.php';
	
	
	//include the header and navbar
	include 'inc/header.php';
	include 'inc/navbar.php';


	//get action type
	if(isset($_REQUEST['act'])) {
		$act = htmlentities($_REQUEST['act'],ENT_QUOTES);
	}
	else {
		// action type not defined, set to home page
		$act = 'home';
	}
	 
	 switch($act) {
		case 'home':
			// home page: menu
			include 'view/dsp_home.php';
		break;
		
		case 'new':
			// form to add new ride details
			//include validation of data passed to the form
			include 'validate/val_ride_type_id.php';
			//include the file with the database connection code
			include 'config/db.php'; 
			//include queries to get values for dropdowns
			include 'queries/get_dropdowns.php';
			//include the form
			include 'view/dsp_ride_detail_form.php';
		break;
		
		case 'search': 
			// search for existing ride to edit: search form and results
			include 'view/dsp_search_rides.php';
		break;
		
		case 'edit':
			// form to edit existing ride details
			//include validation of data passed to the form
			include 'validate/val_ride_type_id.php';
			//include the file with the database connection code
			include 'config/db.php'; 
			//include queries to get values for dropdowns
			include 'queries/get_dropdowns.php';
			//include query to get existing ride data
			
			//include the form
			include 'view/dsp_ride_detail_form.php';
		break;
		
		case 'save_details':
			//save the data for new or edited rides
			//include server side form validation
			include 'validate/val_ride_details.php';
			//include the file with the database connection code
			include 'config/db.php'; 
			//include query to save data
			include 'queries/save_ride.php';
		break;
		
		case 'ride_view':
			// ride detail display (readonly) - used to confirm saved ride details or view details for a ride selected from the summary report
			//include file to validate input to the page
			include 'validate/val_ride_view.php';
			//include the file with the database connection code
			include 'config/db.php'; 
			//include queries to get ride data
			include 'queries/get_ride_details.php';
			//include display code
			include 'view/dsp_ride_detail_view.php';
		break;
		
		case 'rpt':
			// summary report - ride list
			//include file to validate input to the page
			//include the file with the database connection code
			//iclude 'config/db.php'; 
			//include queries to get data
			//include display code
			include 'view/dsp_report.php';
		break;
		
		case 'err':
			// error page
			include 'view/dsp_error.php';
		break;
		
		default:
			// value of $act is invalid - error
			include 'view/dsp_error.php';
		
	 } //end switch
	 
	//include the footer
	include 'inc/footer.php';
 
 ?>




	
