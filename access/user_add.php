<?php
if(isset($_POST['user_add'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT user_add FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $user_add = $row["user_add"];
      }
    if($user_add == 1){
        header("Location: user_add.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>