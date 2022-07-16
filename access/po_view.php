<?php
if(isset($_POST['po_view'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT po_view FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $po_view = $row["po_view"];
      }
    if($po_view == 1){
        header("Location: po_view.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>