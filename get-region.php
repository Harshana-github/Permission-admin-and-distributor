<?php
	$connection = mysqli_connect("localhost", "root", "", "testlinux");

	if ( isset($_GET['zone_code']) ) {

		$zone_code = mysqli_real_escape_string($connection, $_GET['zone_code']);
	
		$query 		= "SELECT * FROM region WHERE zone_code = {$zone_code}";
		$result_set = mysqli_query($connection, $query);
	
		$region_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$region_list .= "<option value=\"{$result['region_code']}\">{$result['region_name']}</option>";
		}
		echo $region_list;
	} else {
		echo "<option>Error</option>";
	}
?>