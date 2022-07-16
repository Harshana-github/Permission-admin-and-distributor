<?php
if(isset($_POST['region_add'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT region_add FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $region_add = $row["region_add"];
      }
    if($region_add == 1){
        header("Location: region_add.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>