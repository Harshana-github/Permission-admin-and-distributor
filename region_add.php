<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
include 'header.php';
?>
<?php
    //Code autogenerate region_code
    $query2 = "select * from region order by rcode desc limit 1";
    $result2 = mysqli_query($connection,$query2);
    $row2 = mysqli_fetch_array($result2);
    $lastid2 = $row2['rcode'];
    if($lastid2 == "")
    {
        $RegionCode = "REGION1";
    }
    else
    {
        $RegionCode = substr($lastid2,6);
        $RegionCode = intval($RegionCode);
        $RegionCode = "REGION" . ($RegionCode + 1);
    }
?>
<?php
    //Add region data in to the database
    if(isset($_POST['region']))
    {
        $RegionCode = $_POST['region_code'];
        $RegionName = $_POST['region_name'];
        $ZoneList = $_POST['zone_long_description_drop_down_list'];
        
        if(!$connection)
        {
            die("connection faild " . mysqli_connect_error());
        }
        else
        {
            $sql2 = "insert into region(rcode,region_name,zone_code)VALUES('$RegionCode','$RegionName','$ZoneList')";
            if(mysqli_query($connection,$sql2))
            {
                echo "Record Added";
            }
            else
            {
                echo "Record Failed";
            }
        }
    }
?>
<?php
//Pass zone_code to dropdown menu
$query1 = "SELECT zone_code,zone_long_description FROM zone";

$result_set1 = mysqli_query($connection,$query1);

$zone_list = '';

while($result1 = mysqli_fetch_assoc($result_set1)) {
    $zone_list .="<option value=\"{$result1['zone_code']}\">{$result1['zone_long_description']}</option>"; 
}
?>  
    <h1>Region Add</h1>
    <form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="POST">
        <label>Zone</label>
        <select name="zone_long_description_drop_down_list" id=""><option value="">Select</option><?php echo $zone_list; ?></select><br/>
        <label>Region Code</label>
        <input type="text" name="region_code" id="r_code" style="color:brown" value="<?php echo $RegionCode ;?>" readonly><br>  
        <label>Region Name</label>
        <input type="text" name="region_name" id="region_name"><br>  
        <input type="submit" name="region" value="SAVE">
    </form>
<?php include 'footer.php' ?>   