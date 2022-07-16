<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
include 'header.php';
?>
<?php
    //Code autogenerate sku_id
    $query4 = "select * from product order by code desc limit 1";
    $result4 = mysqli_query($connection,$query4);
    $row4 = mysqli_fetch_array($result4);
    $lastid4 = $row4['code'];
    if($lastid4 == "")
    {
        $SKUID = "SKU1";
    }
    else
    {
        $SKUID = substr($lastid4,3);
        $SKUID = intval($SKUID);
        $SKUID = "SKU" . ($SKUID + 1);
    }
?>
<?php
    //Add product data in to the database
    if(isset($_POST['product']))
    {
        $sku_id = $_POST['sku_id'];
        $sku_code = $_POST['sku_code'];
        $sku_name = $_POST['sku_name'];
        $mrp = $_POST['mrp'];
        $d_price = $_POST['d_price'];
        $weight = $_POST['weight'];
        $volume = $_POST['volume'];

        $ful_sku_name = (strval($sku_name) . " " . strval($weight) . " " . strval($volume));

        $ful_weight = (strval($weight) . " " . strval($volume));


        

        if(!$connection)
        {
            die("connection faild " . mysqli_connect_error());
        }
        else
        {
            $sql5 = "insert into product(code,sku_code,sku_name,mrp,d_price,weight)VALUES('$sku_id','$sku_code','$ful_sku_name','$mrp','$d_price','$ful_weight')";
            if(mysqli_query($connection,$sql5))
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
    <h1>Product Add</h1>
    <form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="POST">
        <label>SKU ID</label>
        <input type="text" name="sku_id" id="sku_id" style="color:brown" value="<?php echo $SKUID ;?>" readonly><br>  
        <label>SKU Code</label>
        <input type="text" name="sku_code" id="sku_code"  required><br>  
        <label>SKU Name</label>
        <input type="text" name="sku_name" id="sku_name" required><br> 
        <label>MRP</label>
        <input type="text" name="mrp" id="mrp" required><br> 
        <label>Distributor Price</label>
        <input type="text" name="d_price" id="d_price" required><br> 
        <label>Weight/Volume</label>
        <input type="text" name="weight" id="weight" required><select name="volume"><option>ML</option><option>G</option></select><br/>
        <input type="submit" name="product" value="SAVE">
    </form>
<?php include 'footer.php' ?>   