<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
include 'header.php';
?>
      
    <h1>Zone Details</h1>

    <table border="2">
        <thead>
            <tr>
                <th>Zone Code</th>
                <th>Zone Long Description</th>
                <th>Short Description</th>
                <th>Action</th>
           
            </tr>
        </thead>
        <tbody>
            <?php
                $table = mysqli_query($connection,"SELECT * FROM zone");
                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['zone_code']; ?>">
                        <td><input type="text" value="<?php echo $row['zcode'] ?>" name="zcode[]" readonly></td>
                        <td data-target="lastName"><?php echo $row['zone_long_description'] ?></td>
                        <td data-target="eMail"><?php echo $row['short_description'] ?></td>
                        <td><a href="#" data-role="update" data-id="<?php echo $row['zone_code']; ?>" data-toggle="modal" data-target="#myModal"><input type="button" value="update" name="zone[]"></a></td>
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
          <h4 class="modal-title">Update Zone Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label>Zone Long Description</label>
            <input type="text" id="lastName" class="form-control">
          </div>
          <div class="form-group">
            <label>Short Description</label>
            <input type="text" id="eMail" class="form-control">
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


            $('#lastName').val(lastName);
            $('#eMail').val(eMail);
            $('#userId').val(id);
            $('#myModal').modal('toggle');

            

        });

        //now create event to get data from fields and update in database
        $('#save').click(function(){
            var id = $('#userId').val();

            var lastName = $('#lastName').val();
            var eMail = $('#eMail').val();

            $.ajax({
                url : 'conn.php',
                method : 'POST',
                data : {lastName:lastName,eMail:eMail,id:id},
                success : function(response){

                    $('#'+id).children('td[data-target=lastName]').text(lastName);
                    $('#'+id).children('td[data-target=eMail]').text(eMail);
                    $('#myModal').modal('toggle');
                    location.reload();
                }
                
            });
            
        });
    });
</script>
<?php include 'footer.php' ?>   