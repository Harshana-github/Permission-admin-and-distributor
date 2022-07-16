<?php
if(isset($_POST['product_add'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT product_add FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $product_add = $row["product_add"];
      }
    if($product_add == 1){
        header("Location: product_add.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>