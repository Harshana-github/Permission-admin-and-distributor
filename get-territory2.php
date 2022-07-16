<?php
	$connection = mysqli_connect("localhost", "root", "", "testlinux");

	if ( isset($_GET['zone_code']) ) {

		$zone_code = mysqli_real_escape_string($connection, $_GET['zone_code']);
	
		$query 		= "SELECT * FROM territory WHERE zone_code = {$zone_code}";
		$result_set = mysqli_query($connection, $query);
	
		$territory_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$territory_list .= "<option value=\"{$result['territory_code']}\">{$result['territory_name']}</option>";
		}
		echo $territory_list;
	} else {
		echo "<option>Error</option>";
	}
?>