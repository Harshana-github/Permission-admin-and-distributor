<?php
if(isset($_POST['territory_view'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT territory_view FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $territory_view = $row["territory_view"];
      }
    if($territory_view == 1){
        header("Location: territory_view.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>