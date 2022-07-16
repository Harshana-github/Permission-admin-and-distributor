<?php
session_start();
?>
<?php 
$connection=mysqli_connect("localhost","root","","testlinux");
include 'access.php';
include 'header.php';
?>

<?php
    //Add user data in to the database
    if(isset($_POST['user']))
    {
        $name = $_POST['name'];
        $nic = $_POST['nic'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $e_mail = $_POST['e_mail'];
        $gender = $_POST['gender'];
        $territory = $_POST['territory_name'];
        $user_name = $_POST['u_name'];
        $password = $_POST['password'];
        $role = "distributor";

        if(!$connection)
        {
            die("connection faild " . mysqli_connect_error());
        }
        else
        {
            $sql4 = "insert into user(name,nic,address,mobile,email,gender,territory,username,password,rank)VALUES('$name','$nic','$address','$mobile','$e_mail','$gender','$territory','$user_name','$password','$role')";
            if(mysqli_query($connection,$sql4))
            {
                echo "Record Added";
            }
            else
            {
                echo "Record Failed";
            }
        }
    }

?> 
<?php
//Pass territory_code to dropdown menu
$query3 = "SELECT territory_code,territory_name FROM territory";

$result_set3 = mysqli_query($connection,$query3);

$territory_list = '';

while ($result3 = mysqli_fetch_assoc($result_set3)) {
    $territory_list .="<option value=\"{$result3['territory_code']}\">{$result3['territory_name']}</option>"; 
}
?>  
    <h1>User Add</h1>
    <form action="<?php echo($_SERVER["PHP_SELF"]);?>" method="POST">
        <label>Name</label>
        <input type="text" name="name" id="name" required><br>  
        <label>NIC</label>
        <input type="text" name="nic" id="nic" required><br>  
        <label>Address</label>
        <input type="text" name="address" id="address" required><br> 
        <label>Mobile</label>
        <input type="text" name="mobile" id="mobile" required><br>
        <label>E-mail</label>
        <input type="text" name="e_mail" id="e_mail"><br>
        <label>Gender</label>
        <select name="gender" id=""><option value="">Select</option><option>Male</option><option>FeMale</option></select><br>
        <label>Territory</label>
        <select name="territory_name" id="territory"><option value="">Select</option><?php echo $territory_list; ?></select><br>
        <label>User Name</label>
        <input type="text" class="form-control" name="u_name" id="u_name" required><br>
        <label>Password</label>
        <input type="password" class="form-control" name="password" id="password" required><br>
        <input type="submit" name="user" value="SAVE">
    </form>
<?php include 'footer.php' ?>   