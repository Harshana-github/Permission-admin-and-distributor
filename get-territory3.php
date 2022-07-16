<?php
$connection=mysqli_connect("localhost","root","","testlinux");
if((isset($_GET['num1'])))
    {
        $zone = $_GET['num1'];
        $region = $_GET['num2'];

        $query 		= "SELECT * FROM territory WHERE region_code = {$zone} && zone_code = {$region} ";
		$result_set = mysqli_query($connection, $query);
	
		$territory_list = "";
		while ( $result = mysqli_fetch_assoc($result_set) ) {
			$territory_list .= "<option value=\"{$result['territory_code']}\">{$result['territory_name']}</option>";
		}
		echo $territory_list;
    }
?>