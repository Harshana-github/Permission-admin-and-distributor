<?php
session_start();
?>
<?php 

include 'access.php';
access('ADMIN');
include 'header.php';
require 'insert.php';

?>    
    <h1>This is the admin page</h1>

    
    <ul>
        <li>Zone<a href="zone_add.php"><input type="button" value="Add"></a><a href="zone_view_and_update.php"><input type="button" value="View"></a></li>
        <li>Region<a href="region_add.php"><input type="button" value="Add"></a><a href="region_view_and_update.php"><input type="button" value="View"></a></li>
        <li>Territory<a href="territory_add.php"><input type="button" value="Add"></a><a href="territory_view_and_update.php"><input type="button" value="View"></a></li>
        <li>Product<a href="product_add.php"><input type="button" value="Add"></a><a href="product_view.php"><input type="button" value="View"></a></li>
        <li>User<a href="user_add.php"><input type="button" value="Add"></a><a href="user_view.php"><input type="button" value="View"></a></li>
    </ul>
    <form action="<?php isset($_SERVER["PHP_SELF"]);?>" method="POST">
    <p>Permission Group - <select name="role" id="role"><option>Admin</option><option>Distributor</option></select></p>
    <p>Permission</p>
    <table border="2" id="myTable">
        <tr>
            <th>Zone</th>
            <th>Region</th>
            <th>Territory</th>
            <th>Product</th>
            <th>User</th>
            <th>PO</th>
        </tr>
        <tr>
            <td>Add<input type="hidden" name="zone_add" value="0"><input type="checkbox" name="zone_add" value="1" id="zone_add"><br/>
            View<input type="hidden" name="zone_view" value="0"><input type="checkbox" name="zone_view" value="1" id="zone_view"></td>
            <td>Add<input type="hidden" name="region_add" value="0"><input type="checkbox" name="region_add" value="1" id="region_add"><br/>
            View<input type="hidden" name="region_view" value="0"><input type="checkbox" name="region_view" value="1" id="region_view"></td>
            <td>Add<input type="hidden" name="territory_add" value="0"><input type="checkbox" name="territory_add" value="1" id="territory_add"><br/>
            View<input type="hidden" name="territory_view" value="0"><input type="checkbox" name="territory_view" value="1" id="territory_view"></td>
            <td>Add<input type="hidden" name="product_add" value="0"><input type="checkbox" name="product_add" value="1" id="product_add"><br/>
            View<input type="hidden" name="product_view" value="0"><input type="checkbox" name="product_view" value="1" id="product_view"></td>
            <td>Add<input type="hidden" name="user_add" value="0"><input type="checkbox" name="user_add" value="1" id="user_add"><br/>
            View<input type="hidden" name="user_view" value="0"><input type="checkbox" name="user_view" value="1" id="user_view"></td>
            <td>Add<input type="hidden" name="po_add" value="0"><input type="checkbox" name="po_add" value="1" id="po_add"><br/>
            View<input type="hidden" name="po_view" value="0"><input type="checkbox" name="po_view" value="1" id="po_view"></td>
            

        </tr>
    </table><br/>
    <input type="submit" name="check" id="update">
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#role").on("change", function(){
				var roleval = $("#role").val();
				// var getURL     = "get-role.php?role=" + roleval;
				// $.get(getURL, function(data, status){
				// 	$("#myTable").html(data);
				// });
                $.ajax({
                url:'get-role.php',
                dataType:"json",
                data:'role='+roleval,
                cache: false,
                success:function(data){
                    // if(data){
                    //         if(data.free_issues_type==1){
                    //             row.find("#fqty").val(1);
                    //         }else{
                    //             var r = (data.free_purchase_quantity/data.purchase_quantity)*qty;
                    //             row.find("#fqty").val(r);
                    //         }

                        
                    // }
                    if(data){
                        if(data.zone_add==1){
                            // $("#zone_add").html(data);
                            $('#zone_add').prop('checked', true);
                        }else{
                            $('#zone_add').prop('checked', false);
                        }
                        if(data.zone_view==1){
                            // $("#zone_add").html(data);
                            $('#zone_view').prop('checked', true);
                        }else{
                            $('#zone_view').prop('checked', false);
                        }
                        if(data.region_add==1){
                            // $("#zone_add").html(data);
                            $('#region_add').prop('checked', true);
                        }else{
                            $('#region_add').prop('checked', false);
                        }
                        if(data.region_view==1){
                            // $("#zone_add").html(data);
                            $('#region_view').prop('checked', true);
                        }else{
                            $('#region_view').prop('checked', false);
                        }

                        if(data.territory_add==1){
                            // $("#zone_add").html(data);
                            $('#territory_add').prop('checked', true);
                        }else{
                            $('#territory_add').prop('checked', false);
                        }
                        if(data.territory_view==1){
                            // $("#zone_add").html(data);
                            $('#territory_view').prop('checked', true);
                        }else{
                            $('#territory_view').prop('checked', false);
                        }

                        if(data.product_add==1){
                            // $("#zone_add").html(data);
                            $('#product_add').prop('checked', true);
                        }else{
                            $('#product_add').prop('checked', false);
                        }
                        if(data.product_view==1){
                            // $("#zone_add").html(data);
                            $('#product_view').prop('checked', true);
                        }else{
                            $('#product_view').prop('checked', false);
                        }

                        if(data.user_add==1){
                            // $("#zone_add").html(data);
                            $('#user_add').prop('checked', true);
                        }else{
                            $('#user_add').prop('checked', false);
                        }
                        if(data.user_view==1){
                            // $("#zone_add").html(data);
                            $('#user_view').prop('checked', true);
                        }else{
                            $('#user_view').prop('checked', false);
                        }

                        if(data.po_add==1){
                            // $("#zone_add").html(data);
                            $('#po_add').prop('checked', true);
                        }else{
                            $('#po_add').prop('checked', false);
                        }
                        if(data.po_view==1){
                            // $("#zone_add").html(data);
                            $('#po_view').prop('checked', true);
                        }else{
                            $('#po_view').prop('checked', false);
                        }
                    }
                }
                });
			});
		});		
    </script>
    <!-- <script>
        $(document).ready(function(){
            $("#update").on("click", function(){
                var roleval = $("#role").val();
				var zone_add = $("zone_add").val();
                var zone_view = $("zone_view").val();
                var region_add = $("region_add").val();
                var region_view = $("region_view").val();
                var territory_add = $("territory_add").val();
                var territory_view = $("territory_view").val();
                var product_add = $("product_add").val();
                var product_view = $("product_view").val();
                var user_add = $("user_add").val();
                var user_view = $("user_view").val();
                var po_add = $("po_add").val();
                var po_view = $("po_view").val();
				// var getURL     = "get-role.php?role=" + roleval;
				// $.get(getURL, function(data, status){
				// 	$("#myTable").html(data);
				// });
                $.ajax({
                url:'get-update.php',
                dataType:"POST",
                data: {},
                cache: false,
                success:function(data){
                }
                
                });
			});
		});		
    </script> -->

<?php include 'footer.php' ?>   