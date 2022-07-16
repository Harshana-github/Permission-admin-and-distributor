<?php
if(isset($_POST['zone_view'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT zone_view FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $zone_view = $row["zone_view"];
      }
    if($zone_view == 1){
        header("Location: zone_view.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>