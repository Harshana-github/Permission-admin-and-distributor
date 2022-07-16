<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
include 'header.php';
?>    
    <h1>User Details</h1>
    <table border="2">
        <thead>
            <tr>
                <th>Name</th>
                <th>NIC</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>E-mail</th>
                <th>Gender</th>

            </tr>
        </thead>
        <tbody>
            <?php
                $distributor = "distributor";
                $table = mysqli_query($connection,"SELECT * FROM user WHERE rank='$distributor'");
                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['id']; ?>">
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['nic'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['mobile'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['gender'] ?></td>

                       
                    </tr>
            <?php    }
            ?>
        </tbody>
    </table>
<?php include 'footer.php' ?>   