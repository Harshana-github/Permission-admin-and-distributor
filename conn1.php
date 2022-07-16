<?php

$connection=mysqli_connect("localhost","root","","testlinux");

if(isset($_POST['eMail'])){

    $lastName = $_POST['lastName'];
    $eMail = $_POST['eMail'];
    $id = $_POST['id'];

    $result = mysqli_query($connection,"UPDATE region SET region_name='$lastName',zone_code='$eMail' WHERE region_code='$id'");

    if($result){
        echo 'data updated';
    }
}
?>