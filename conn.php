<?php

$connection=mysqli_connect("localhost","root","","testlinux");

if(isset($_POST['eMail'])){

    $lastName = $_POST['lastName'];
    $eMail = $_POST['eMail'];
    $id = $_POST['id'];

    $result = mysqli_query($connection,"UPDATE zone SET zone_long_description='$lastName',short_description='$eMail' WHERE zone_code='$id'");

    if($result){
        echo 'data updated';
    }
}
?>