<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
access('DISTRIBUTOR');
include 'header.php';
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
//Code autogenerate zone_code
$query = "select * from addpurchaseorder order by po_no desc limit 1";
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['po_no'];
if($lastid == "")
{
    $po_no = "TEP1";
}
else
{
    $po_no = substr($lastid,3);
    $po_no = intval($po_no);
    $po_no = "TEP" . ($po_no + 1);
}
?>
<?php
    //Add data in to the database
    if(isset($_POST['addpurchas']))
    {

        $sku_id = $_POST['sku_id'];
        $avilable_qty = $_POST['weight'];
        $total_price = $_POST['total'];

        $sum = 0;

        foreach($sku_id as $index => $qty){
            //echo $qty."Hi".$avilable_qty[$index]."<br>";
            
            $id = $qty;
            $total = $total_price[$index];
            $now_qty = $avilable_qty[$index];


            $sum+=(int)$total;

            

            $q1 = "UPDATE product SET weight='$now_qty' WHERE sku_id='$id'";
            $run_query = mysqli_query($connection,$q1);



        }
            $zone_name = $_POST['zone_long_description'];
            $region_name = $_POST['region_name'];
            $territory_name = $_POST['territory_name'];
            $date = $_POST['date'];
            $po_no = $_POST['po_no'];
            $distributor = $_POST['distributor_list'];
            $remark = $_POST['remark'];

            $sql = "insert into addpurchaseorder(zone_code,region_code,territory_code,created_at,po_no,distributor,remark,total_price)VALUES('$zone_name','$region_name','$territory_name','$date','$po_no','$distributor','$remark','$sum')";
            $run_query1 = mysqli_query($connection,$sql);

    }

?>   
    <h1>Purchase Order Add</h1>
    <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label>Zone</label><select name="zone_long_description" id="zone"><option value="">Select</option><?php echo $zone_list; ?></select>
    <label>Region</label><select name="region_name" id="region"><option value="">Select</option></select>
    <label>Territory</label><select name="territory_name" id="territory"><option value="">Select</option></select>
    <label>Distributor</label><select name="distributor_list" id="distributor"><option value="">Select</option>Select</select>
    <label>Date</label><input type="text" name="date" id="date" value="<?php echo date("Y-m-d"); ?>" readonly>
    <label>PO No</label><input type="text" name="po_no" id="code" style="color:brown" value="<?php echo $po_no; ?>" readonly>
    <label>Remark</label><input type="text" name="remark"></br></br>
    <table border="2" id="table">
                        <thead>
                            <tr>
                                <th>SKU CODE</th>
                                <th>SKU NAME</th>
                                <th>UNIT PRICE</th>
                                <th>AVB QTY</th>
                                <th>ENTER QTY</th>
                                <th>UNITS</th>
                                <th>TOTAL PRICE</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM product";
                            $query_run = mysqli_query($connection, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $product) {
                                    //echo $zone['zone_code'];
                            ?>
                                    <tr>
                                        <td><input type="text" class="form-control" name="sku_id[]" value="<?= $product['sku_id']; ?>" readonly></td>
                                        <td><?= $product['sku_name']; ?></td>
                                        <td><input type="text" class="price form-control" name="d_price[]" value="<?= $product['d_price']; ?>"readonly></td>
                                        <td><input type="text" class="avbQty form-control" name="weight[]" value="<?php echo $product['weight'] ?>" readonly></td>
                                        <td><input type="text" class="qty form-control" name="qty[]"></td>
                                        <td></td>
                                        <td><input type="text" class="total form-control" name="total[]" readonly></td>

                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<h5> No Record Found </h5>";
                            }
                            ?>

                        </tbody>
                    </table><br/>
                    <input type="submit" name="addpurchas" value="ADD PO">
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
                            $("#region").on("change", function() {
                                var RegionCode = $("#region").val();
                                var getURL = "get-territory.php?region_code=" + RegionCode;
                                $.get(getURL, function(data, status) {
                                    $("#territory").html(data);
                                });
                            });
                            $("#zone").on("change", function() {
                                var ZoneCode = $("#zone").val();
                                var getURL = "get-territory2.php?zone_code=" + ZoneCode;
                                $.get(getURL, function(data, status) {
                                    $("#territory").html(data);
                                });
                            });
                            $("#territory").on("change", function() {
                                var TerritoryCode = $("#territory").val();
                                var getURL = "get-distributor.php?territory=" + TerritoryCode;
                                $.get(getURL, function(data, status) {
                                    $("#distributor").html(data);
                                });
                            });
                        });
                    </script>
                    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
                    <script>
                        (function() {

                            $("table").on("keyup", "input", function() {
                                var row = $(this).closest("tr");
                                var qty = row.find(".qty").val();
                                var price = row.find(".price").val();
                                var avbQty = row.find(".avbQty").val();
                                if (qty) {
                                    var total = qty * price;
                                    r1 = row.find(".total").val(total);
                                    var now = avbQty - qty;
                                    r2 = row.find(".avbQty").val(now);

                                }

                            });
                        })();
                    </script>
<?php include 'footer.php' ?>   