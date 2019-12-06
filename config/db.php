<?php

	//connect to mysql
	//params are the host name, user, password, database name
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	//check the connection
	if(mysqli_connect_errno()) {
		//	error number exists, not connected
		die("Failed to connect to mysql: error number ".mysqli_connect_errno());
	}

?>
