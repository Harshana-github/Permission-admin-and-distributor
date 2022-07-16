<?php
    if((isset($_GET['role'])))
    {
        $conn = mysqli_connect("localhost","root","","testlinux");
        $role = $_GET['role'];
        $q1 = "SELECT * FROM permission WHERE role = '$role'";
        $run = mysqli_query($conn,$q1);

        while($row = mysqli_fetch_assoc($run)){
            // $zone_add = $row['zone_add'];
            // $zone_view = $row['zone_view'];
            // $region_add = $row['region_add'];
            // $region_view = $row['region_view'];
            // $territory_add = $row['territory_add'];
            // $territory_view = $row['territory_view'];
            // $product_add = $row['product_add'];
            // $product_view = $row['product_view'];
            // $user_add = $row['user_add'];
            // $user_view = $row['user_view'];
            // $po_add = $row['po_add'];
            // $po_view = $row['po_view'];
            $rowdata = $row;
        }
        if($rowdata){
            echo json_encode($rowdata);
            
        }else{
            $val=0;
            echo json_encode($rowdata=$val);
        }
        
        ?>
       
        <?php



	} else {
		echo "<option>Error</option>";
	}
?>