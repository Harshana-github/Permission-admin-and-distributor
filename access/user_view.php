<?php
if(isset($_POST['user_view'])){
    $role = "Distributor";
    $con = mysqli_connect("localhost","root","","testlinux");
    $q2 = "SELECT user_view FROM permission WHERE role='$role'";
    $run1 = mysqli_query($con,$q2);
    

    while($row = mysqli_fetch_assoc($run1)) {
       $user_view = $row["user_view"];
      }
    if($user_view == 1){
        header("Location: user_view.php");
        die;
    }else{
        header("Location: denied.php");
        die;
    }
}
?>