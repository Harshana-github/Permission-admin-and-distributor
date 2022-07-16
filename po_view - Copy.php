<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';

include 'header.php';
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
 
    <h1>Purchase Order View</h1>
    <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST">
    
    <label>Region</label><select name="region_name" id="region"><option value="">Select</option><?php echo $region_list; ?></select>
    <label>Territory</label><select name="territory_name" id="territory"><option value="">Select</option></select>
    <label>PO No</label><input type="text" name="po_no" id="myInput" onkeyup="myFunction()" placeholder="Search for PO No.." title="Type in a name">
    <label>From</label><input type="date" name="from_date" id="fnum">
    <label>To</label><input type="date" name="to_date" id="snum">

    <table border="2" id="table">
                        <thead>
                            <tr>
                                <th>PO Number</th>
                                <th>Region</th>
                                <th>Territory</th>
                                <th>Distributor</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Total Amount</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT zone.zone_long_description,region.region_name,territory.territory_name,user.name,addpurchaseorder.po_no,addpurchaseorder.created_at,addpurchaseorder.time,addpurchaseorder.total_price
                            FROM addpurchaseorder
                            INNER JOIN zone ON addpurchaseorder.zone_code=zone.zone_code
                            INNER JOIN region ON addpurchaseorder.region_code=region.region_code
                            INNER JOIN territory ON addpurchaseorder.territory_code=territory.territory_code
                            INNER JOIN user ON addpurchaseorder.distributor=user.id;";
                            $query_run = mysqli_query($connection, $query);


                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $product) {
                                    //echo $zone['zone_code'];
                            ?>
                                    <tr>
                                        <td><?php echo $product['po_no'] ?></td>
                                        <td><?php echo $product['region_name'] ?></td>
                                        <td><?php echo $product['territory_name'] ?></td>
                                        <td><?php echo $product['name'] ?></td>
                                        <td><?php echo $product['created_at'] ?></td>
                                        <td><?php echo $product['time'] ?></td>
                                        <td><?php echo $product['total_price'] ?></td>
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
                    <button type="submit" name="submit" id="export_button" class="btn btn-primary float-right">Download</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script>
        function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
        }
    </script>
        <script>
        $('#snum').on("change",function(){
            var fnum = $('#fnum').val();
            var snum = $('#snum').val();
            $.ajax({
                url:'get-fdate.php',
                data:{num1:fnum,num2:snum},
                success:function(data){
                    $('table').html(data);
                }
            });
        });
    </script>
        <script>
                        $(document).ready(function() {
                            $("#region").on("change", function() {
                                var RegionCode = $("#region").val();
                                var getURL = "get-territoryandtabledata.php?region_code=" + RegionCode;
                                $.get(getURL, function(data, status) {
                                    $("table").html(data);
                                });
                            });
                            $("#region").on("change", function() {
                                var RegionCode = $("#region").val();
                                var getURL = "get-territory.php?region_code=" + RegionCode;
                                $.get(getURL, function(data, status) {
                                    $("#territory").html(data);
                                });
                            });
                            $("#territory").on("change", function() {
                                var TerritoryCode = $("#territory").val();
                                var getURL = "get-tabledata.php?territory=" + TerritoryCode;
                                $.get(getURL, function(data, status) {
                                    $("table").html(data);
                                });
                            });
                        });
                    </script>
                    <script>
                        function html_table_to_excel(type)
                        {
                            var data = document.getElementById('table');

                            var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

                            XLSX.write(file, { bookType: type, bookSST: true, type: 'base64' });

                            XLSX.writeFile(file, 'Purchase_order.' + type);
                        }

                        const export_button = document.getElementById('export_button');

                        export_button.addEventListener('click', () =>  {
                            html_table_to_excel('xlsx');
                        });

                    </script>
<?php include 'footer.php' ?>   