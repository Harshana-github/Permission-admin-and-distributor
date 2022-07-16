<?php

use Stripe\Terminal\Location;

if(isset($_POST['check'])){
$con = mysqli_connect("localhost","root","","testlinux");
$role = $_POST['role'];
$zone_add = $_POST['zone_add'];
$zone_view = $_POST['zone_view'];
$region_add = $_POST['region_add'];
$region_view = $_POST['region_view'];
$territory_add = $_POST['territory_add'];
$territory_view = $_POST['territory_view'];
$product_add = $_POST['product_add'];
$product_view = $_POST['product_view'];
$user_add = $_POST['user_add'];
$user_view = $_POST['user_view'];
$po_add = $_POST['po_add'];
$po_view = $_POST['po_view'];


// $q1 = "INSERT INTO permission (role,zone_add,zone_view,region_add,region_view,territory_add,territory_view,product_add,product_view,user_add,user_view,po_add,po_view) VALUES ('$role','$zone_add','$zone_view','$region_add','$region_view','$territory_add','$territory_view','$product_add','$product_view','$user_add','$user_view','$po_add','$po_view')";
$q1 = "UPDATE permission
        SET zone_add='$zone_add',
            zone_view='$zone_view',
            region_add='$region_add',
            region_view='$region_view',
            territory_add='$territory_add',
            territory_view='$territory_view',
            product_add='$product_add',
            product_view='$product_view',
            user_add='$user_add',
            user_view='$user_view',
            po_add='$po_add',
            po_view='$po_view'
        WHERE role='$role'";
$run = mysqli_query($con,$q1);
}

?>

<?php
// if(isset($_POST['zone_add'])){
//     $role = "Distributor";
//     $con = mysqli_connect("localhost","root","","testlinux");
//     $q2 = "SELECT zone_add FROM permission WHERE role='$role'";
//     $run1 = mysqli_query($con,$q2);
    

//     while($row = mysqli_fetch_assoc($run1)) {
//        $zone_add = $row["zone_add"];
//       }
//     if($zone_add == 1){
//         header("Location: zone.php");
//         die;
//     }else{
//         header("Location: denied.php");
//         die;
//     }
// }
?>