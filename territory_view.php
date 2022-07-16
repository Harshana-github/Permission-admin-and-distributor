<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
include 'header.php';
?>    
    <h1>Territory Details</h1>
    <table border="2">
        <thead>
            <tr>
                <th>Territory Code</th>
                <th>Terrirory Name</th>
                <th>Zone Name</th>
                <th>Region Name</th>
           
            </tr>
        </thead>
        <tbody>
            <?php
                $table = mysqli_query($connection,"SELECT * FROM territory INNER JOIN region ON territory.region_code=region.region_code
                INNER JOIN zone ON territory.zone_code=zone.zone_code");
                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['code']; ?>">
                        <td><?php echo $row['code'] ?></td>
                        <td><?php echo $row['territory_name'] ?></td>
                        <td><?php echo $row['zone_long_description'] ?></td>
                        <td><?php echo $row['region_name'] ?></td>
                       
                    </tr>
            <?php    }
            ?>
        </tbody>
    </table>
<?php include 'footer.php' ?>   