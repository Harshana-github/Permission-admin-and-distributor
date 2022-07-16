<?php

function access($rank, $redirect = true)
{


    if(isset($_SESSION["ACCESS"]) && !$_SESSION["ACCESS"][$rank])
    {
        if($redirect)
        {
            header("Location: denied.php");
            die;
        }
        return false;
    }
    return true;
}

$_SESSION["ACCESS"]["ADMIN"] = isset($_SESSION['myrank']) && trim($_SESSION['myrank']) == "admin";


$_SESSION["ACCESS"]["USER"] = isset($_SESSION['myrank']) && (trim($_SESSION['myrank']) == "user" || trim($_SESSION['myrank']) == "admin" || trim($_SESSION['myrank']) == "receptionist");


$_SESSION["ACCESS"]["RECEPTIONIST"] = isset($_SESSION['myrank']) && (trim($_SESSION['myrank']) == "receptionist" || trim($_SESSION['myrank']) == "admin");


$_SESSION["ACCESS"]["DISTRIBUTOR"] = isset($_SESSION['myrank']) && (trim($_SESSION['myrank']) == "distributor" || trim($_SESSION['myrank']) == "admin");

