<?php
if(isset($_POST['po_add'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT po_add FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $po_add = $row["po_add"];
      }
    if($po_add == 1){
        header("Location: po_add.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>