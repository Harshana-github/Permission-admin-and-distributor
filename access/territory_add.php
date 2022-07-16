<?php
if(isset($_POST['territory_add'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT territory_add FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $territory_add = $row["territory_add"];
      }
    if($territory_add == 1){
        header("Location: territory_add.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>