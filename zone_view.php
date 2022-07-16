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
           
            </tr>
        </thead>
        <tbody>
            <?php
                $table = mysqli_query($connection,"SELECT * FROM zone");
                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['zone_code']; ?>">
                        <td><?php echo $row['zcode'] ?></td>
                        <td><?php echo $row['zone_long_description'] ?></td>
                        <td><?php echo $row['short_description'] ?></td>
                       
                    </tr>
            <?php    }
            ?>
        </tbody>
    </table>
<?php include 'footer.php' ?>   