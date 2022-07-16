<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
include 'header.php';
?>    
    <h1>Product Details</h1>
    <table border="2">
        <thead>
            <tr>
                <th>Code</th>
                <th>SKU Code</th>
                <th>SKU Name</th>
                <th>MRP</th>
                <th>Price</th>
                <th>Weight</th>
           
            </tr>
        </thead>
        <tbody>
            <?php
                $table = mysqli_query($connection,"SELECT * FROM product");
                while($row = mysqli_fetch_array($table)){ ?>
                    <tr id="<?php echo $row['sku_id']; ?>">
                        <td><?php echo $row['code'] ?></td>
                        <td><?php echo $row['sku_code'] ?></td>
                        <td><?php echo $row['sku_name'] ?></td>
                        <td><?php echo $row['mrp'] ?></td>
                        <td><?php echo $row['d_price'] ?></td>
                        <td><?php echo $row['weight'] ?></td>
                       
                    </tr>
            <?php    }
            ?>
        </tbody>
    </table>
<?php include 'footer.php' ?>   