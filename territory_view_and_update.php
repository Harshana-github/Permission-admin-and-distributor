<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
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
//Pass region_code to dropdown menu
$query2 = "SELECT region_code,region_name FROM region";

$result_set2 = mysqli_query($connection,$query2);

$region_list = '';

while ($result2 = mysqli_fetch_assoc($result_set2)) {
    $region_list .="<option value=\"{$result2['region_code']}\">{$result2['region_name']}</option>"; 
}
?>    
    <h1>Territory Details</h1>
    <table border="2">
        <thead>
            <tr>
                <th>Territory Code</th>
                <th>Terrirory Name</th>
                <th>Zone Name</th>
                <th>Region Name</th>
                <th>Action</th>
           
            </tr>
        </thead>
        <tbody>
            <?php
                $table = mysqli_query($connection,"SELECT * FROM territory INNER JOIN region ON territory.region_code=region.region_code
                INNER JOIN zone ON territory.zone_code=zone.zone_code");
                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['territory_code']; ?>">
                        <td><input type="text" value="<?php echo $row['code'] ?>" name="" readonly></td>
                        <td data-target="lastName"><?php echo $row['territory_name'] ?></td>
                        <td data-target="eMail"><?php echo $row['zone_long_description'] ?></td>
                        <td data-target="eMail1"><?php echo $row['region_name'] ?></td>
                        <td><a href="#" data-role="update" data-id="<?php echo $row['territory_code']; ?>" data-toggle="modal" data-target="#myModal"><input type="button" value="update"></a></td>
                       
                    </tr>
            <?php    }
            ?>
        </tbody>
    </table>
    <div class="container">

  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Region Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label>Region Name</label>
            <input type="text" id="lastName" class="form-control">
          </div>
          <div class="form-group">
            <label>Zone</label>
            
            <select name="zone_long_description_drop_down_list" id="eMail">
                        <option value="">Select</option>
                        <?php echo $zone_list; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Region</label>
            
            <select name="zone_long_description_drop_down_list" id="eMail1">
                        <option value="">Select</option>
                        
            </select>
          </div>
          <input type="hidden" id="userId" class="form-control">
        </div>
        <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
        //append values in iput fields
        $(document).on('click','a[data-role=update]',function(){
            var id = $(this).data('id');

            var lastName = $('#'+id).children('td[data-target=lastName]').text();
            var eMail = $('#'+id).children('td[data-target=eMail]').text();
            var eMail1 = $('#'+id).children('td[data-target=eMail1]').text();


            $('#lastName').val(lastName);
            $('#eMail').val(eMail);
            $('#eMail1').val(eMail1);
            $('#userId').val(id);
            $('#myModal').modal('toggle');

        });

        //now create event to get data from fields and update in database
        $('#save').click(function(){
            var id = $('#userId').val();

            var lastName = $('#lastName').val();
            var eMail = $('#eMail').val();
            var eMail1 = $('#eMail1').val();

            $.ajax({
                url : 'conn2.php',
                method : 'POST',
                data : {lastName:lastName,eMail:eMail,eMail1:eMail1,id:id},
                success : function(response){

                    $('#'+id).children('td[data-target=lastName]').text(lastName);
                    $('#'+id).children('td[data-target=eMail]').text(eMail);
                    $('#'+id).children('td[data-target=eMail1]').text(eMail1);
                    $('#myModal').modal('toggle');
                }
            });
            location.reload();
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $("#eMail").on("change", function() {
                                var ZoneCode = $("#eMail").val();
                                var getURL = "get-region.php?zone_code=" + ZoneCode;
                                $.get(getURL, function(data, status) {
                                    $("#region").html(data);
                                });
                            });
                        });
                    </script>
<?php include 'footer.php' ?>   