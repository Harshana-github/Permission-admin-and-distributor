<?php
if(isset($_POST['zone_add'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT zone_add FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $zone_add = $row["zone_add"];
      }
    if($zone_add == 1){
        header("Location: zone_add.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>