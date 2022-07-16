<?php
session_start();
?>
<?php 
require 'access/zone_add.php';
require 'access/zone_view.php';
require 'access/region_add.php';
require 'access/region_view.php';
require 'access/territory_add.php';
require 'access/territory_view.php';
require 'access/product_add.php';
require 'access/product_view.php';
require 'access/user_add.php';
require 'access/user_view.php';
require 'access/po_add.php';
require 'access/po_view.php';
include 'access.php';
access('DISTRIBUTOR');
include 'header.php';
?>  <form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="POST">
    <h1>This is the Distributor page</h1>
    <ul>
        <li>Zone<input type="submit" name="zone_add" value="Add"><input type="submit" name="zone_view" value="view"></li>
        <li>Region<input type="submit" name="region_add" value="Add"><input type="submit" name="region_view" value="view"></li>
        <li>Territory<input type="submit" name="territory_add" value="Add"><input type="submit" name="territory_view" value="view"></li>
        <li>Product<input type="submit" name="product_add" value="Add"><input type="submit" name="product_view" value="view"></li>
        <li>User<input type="submit" name="user_add" value="Add"><input type="submit" name="user_view" value="view"></li>
        <li>PO<input type="submit" name="po_add" value="Add"><input type="submit" name="po_view" value="view"></li>
    </ul>
    </form>
<?php include 'footer.php' ?>   