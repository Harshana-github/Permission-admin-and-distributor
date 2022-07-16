<?php
	$connection = mysqli_connect("localhost", "root", "", "testlinux");

	if ( isset($_GET['territory']) ) {

		$territory_code = mysqli_real_escape_string($connection, $_GET['territory']);
	
		$query 		= "SELECT * FROM user WHERE territory = {$territory_code}";
		$result_set = mysqli_query($connection, $query);
	
		$distributor_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$distributor_list .= "<option value=\"{$result['id']}\">{$result['name']}</option>";
		}
		echo $distributor_list;
	} else {
		echo "<option>Error</option>";
	}
?>