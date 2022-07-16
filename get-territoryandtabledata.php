<?php
	$connection = mysqli_connect("localhost", "root", "", "testlinux");

	if ( isset($_GET['region_code']) ) {

		$region_code = mysqli_real_escape_string($connection, $_GET['region_code']);
	


        $q = "SELECT zone.zone_long_description,region.region_name,territory.territory_name,user.name,addpurchaseorder.po_no,addpurchaseorder.created_at,addpurchaseorder.time,addpurchaseorder.total_price
        FROM addpurchaseorder
        INNER JOIN zone ON addpurchaseorder.zone_code=zone.zone_code
        INNER JOIN region ON addpurchaseorder.region_code=region.region_code
        INNER JOIN territory ON addpurchaseorder.territory_code=territory.territory_code
        INNER JOIN user ON addpurchaseorder.distributor=user.id WHERE addpurchaseorder.region_code = {$region_code}";
        $query_run=mysqli_query($connection,$q);

        ?>
        <div class="card-body">
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>PO NUMBER</th>
                                    <th>REGION</th>
                                    <th>TERRITORY</th>
                                    <th>DISTRIBUTOR</th>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                    <th>TOTAL AMOUNT</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    

                                    if(mysqli_num_rows($query_run)>0){
                                        foreach($query_run as $purchase_order)
                                        {
                                            //echo $zone['zone_code'];
                                            ?>
                                            <tr>
                                                <td><?=$purchase_order['po_no'] ;?></td>
                                                <td><?=$purchase_order['region_name'] ;?></td>
                                                <td><?=$purchase_order['territory_name'] ;?></td>
                                                <td><?=$purchase_order['name'] ;?></td>
                                                
                                                <td><?=$purchase_order['created_at'] ;?></td>
                                                <td><?=$purchase_order['time'] ;?></td>
                                                <td><?=$purchase_order['total_price'] ;?></td>


                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>

                            </tbody>
                        </table>

                    </div><?php

	} else {
		echo "<option>Error</option>";
	}
?>