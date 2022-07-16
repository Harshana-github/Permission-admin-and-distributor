<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
include 'header.php';
?>
<?php
    //Code autogenerate zone_code
    $query1 = "select * from zone order by zcode desc limit 1";
    $result1 = mysqli_query($connection,$query1);
    $row1 = mysqli_fetch_array($result1);
    $lastid1 = $row1['zcode'];
    if($lastid1 == "")
    {
        $ZoneCode = "ZONE1";
    }
    else
    {
        $ZoneCode = substr($lastid1,4);
        $ZoneCode = intval($ZoneCode);
        $ZoneCode = "ZONE" . ($ZoneCode + 1);
    }
?>
<?php
    //Add zone data in to the database
    if(isset($_POST['zone']))
    {
        $ZoneCode = $_POST['zone_code'];
        $ZoneLongDescription = $_POST['zone_long_description'];
        $ShortDescription = $_POST['short_description'];

        if(!$connection)
        {
            die("connection faild " . mysqli_connect_error());
        }
        else
        {
            $sql1 = "insert into zone(zcode,zone_long_description,short_description)VALUES('$ZoneCode','$ZoneLongDescription','$ShortDescription')";
            if(mysqli_query($connection,$sql1))
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
    <h1>Zone Add</h1>
    <form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="POST">
        <label>Zone code</label>
        <input type="text" name="zone_code" id="code" style="color:brown" value="<?php echo $ZoneCode;?>" readonly><br>  
        <label>Zone Long Description</label>
        <input type="text" name="zone_long_description" id="long_description"><br>  
        <label>Short Description</label>
        <input type="text" name="short_description" id="short_description"><br> 
        <input type="submit" name="zone" value="SAVE">
    </form>
<?php include 'footer.php' ?>   