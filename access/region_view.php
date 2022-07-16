<?php
if(isset($_POST['region_view'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT region_view FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $region_view = $row["region_view"];
      }
    if($region_view == 1){
        header("Location: region_view.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>