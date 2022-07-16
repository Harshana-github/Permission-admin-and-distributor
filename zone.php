<?php
session_start();
?>
<?php 
include 'access.php';
access('DISTRIBUTOR');
include 'header.php';
?>    
    <h1>This is the Zone page</h1>
    <ul>
        <li>Add</li>
        <li><a href="zone.php">View</a></li>
    </ul>
<?php include 'footer.php' ?>   