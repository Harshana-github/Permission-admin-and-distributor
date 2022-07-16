<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
include 'header.php';
?>
<?php
    //Code autogenerate territory_code
    $query3 = "select * from territory order by code desc limit 1";
    $result3 = mysqli_query($connection,$query3);
    $row3 = mysqli_fetch_array($result3);
    $lastid3 = $row3['code'];
    if($lastid3 == "")
    {
        $TerritoryCode = "TERRITORY1";
    }
    else
    {
        $TerritoryCode = substr($lastid3,9);
        $TerritoryCode = intval($TerritoryCode);
        $TerritoryCode = "TERRITORY" . ($TerritoryCode + 1);
    }
?>
<?php
    //Add data in to the database
    if(isset($_POST['territory']))
    {
        $TerritoryCode = $_POST['territory_code'];
        $TerritoryName = $_POST['territory_name'];
        $ZoneList = $_POST['zone_long_description_drop_down_list'];
        $RegionList = $_POST['region_name_drop_down_list'];


        if(!$connection)
        {
            die("connection faild " . mysqli_connect_error());
        }
        else
        {
            $sql3 = "insert into territory(code,territory_name,zone_code,region_code)VALUES('$TerritoryCode','$TerritoryName','$ZoneList','$RegionList')";
            if(mysqli_query($connection,$sql3))
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
<?php
//Pass region_code to dropdown menu
$query2 = "SELECT region_code,region_name FROM region";

$result_set2 = mysqli_query($connection,$query2);

$region_list = '';

while ($result2 = mysqli_fetch_assoc($result_set2)) {
    $region_list .="<option value=\"{$result2['region_code']}\">{$result2['region_name']}</option>"; 
}
?>   
    <h1>Territory Add</h1>
    <form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="POST">
        <label>Zone</label>
        <select name="zone_long_description_drop_down_list" id="zone"><option value="">Select</option><?php echo $zone_list; ?></select><br/>
        <label>Region</label>
        <select name="region_name_drop_down_list" id="region"><option value="">Select</option><?php echo $region_list; ?></select><br/>
        <label>Territory Code</label>
        <input type="text" name="territory_code" id="t_code" style="color:brown" value="<?php echo $TerritoryCode;?>" readonly><br>  
        <label>Territory Name</label>
        <input type="text" name="territory_name" id="territory_name"><br>  
        <input type="submit" name="territory" value="SAVE">
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $("#zone").on("change", function() {
                                var ZoneCode = $("#zone").val();
                                var getURL = "get-region.php?zone_code=" + ZoneCode;
                                $.get(getURL, function(data, status) {
                                    $("#region").html(data);
                                });
                            });
                        });
                    </script>
<?php include 'footer.php' ?>   