<?php

$connection=mysqli_connect("localhost","root","","testlinux");

if(isset($_POST['eMail1'])){

    $lastName = $_POST['lastName'];
    $eMail = $_POST['eMail'];
    $eMail1 = $_POST['eMail1'];
    $id = $_POST['id'];

    $result = mysqli_query($connection,"UPDATE territory SET territory_name='$lastName',zone_code='$eMail',region_code='$eMail1' WHERE territory_code='$id'");

    if($result){
        echo 'data updated';
    }
}
?>