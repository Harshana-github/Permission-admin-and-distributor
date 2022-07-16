<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
include 'header.php';
?>    
    <h1>Region Details</h1>
    <table border="2">
        <thead>
            <tr>
                <th>Region Code</th>
                <th>Region Name</th>
                <th>Zone Code</th>
           
            </tr>
        </thead>
        <tbody>
            <?php
                $table = mysqli_query($connection,"SELECT * FROM region INNER JOIN zone ON region.zone_code=zone.zone_code");
                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['region_code']; ?>">
                        <td><?php echo $row['rcode'] ?></td>
                        <td><?php echo $row['region_name'] ?></td>
                        <td><?php echo $row['zone_long_description'] ?></td>
                       
                    </tr>
            <?php    }
            ?>
        </tbody>
    </table>
<?php include 'footer.php' ?>   