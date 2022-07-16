<?php
if(isset($_POST['product_view'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT product_view FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $product_view = $row["product_view"];
      }
    if($product_view == 1){
        header("Location: product_view.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>