<?php
include 'access.php';
    $error = "";
    function create_userid()
    {
        $length = rand(4,20);
        $number = "";
        for ($i=0;$i<$length;$i++){
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(!$DB = new PDO("mysql:host=localhost;dbname=testlinux","root",""))
        {
            die ("could not connect to the database");
        }
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
 
        $arr['userid'] = create_userid();
        $condition = true;
        while($condition)
        {
            $query = "SELECT id FROM users where userid = :userid LIMIT 1";
            $stm = $DB->prepare($query);
            if($stm)
            {
                $check = $stm->execute($arr);
                if($check){
                    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                    if(is_array($data) && count($data) > 0)
                    {
                        $arr['userid'] = create_userid();
                        continue;
                    }
                }
            }
            $condition = false;
        }

        $arr['name'] = $_POST['name'];
        $arr['email'] = $_POST['email'];
        $arr['password'] = hash('sha1' , $_POST['password']);
        $arr['rank'] = "user"; //default rank is user
        
        $query = "INSERT INTO users(userid,name,email,password,rank) VALUES (:userid,:name,:email,:password,:rank)";
        $stm = $DB->prepare($query);
        if($stm)
        {
            $check = $stm->execute($arr);
            if(!$check)
            {
                $error = "could not save to database";
            }
            if($error == "")
            {
                header("Location: login.php");
                die;
            }
        }
    }
?>
<?php include 'header.php' ?>    
    <h1>Signup</h1>
    <?php
        if($error != "")
        {
            echo "<br><span style='color:red'>$error</span><br><br>";
        }
    ?>
    <style type="text/css">
        input{
            border-radius: 5px;
            border: solid thin #aaa;
            padding: 10px;
            margin: 4px;
        }
        .button{
            border-radius: 5px;
            border: solid thin #aaa;
            padding: 10px;
            margin: 4px;
            cursor: pointer;
        }
    </style>
    <form method="POST">
        <input class="input" type="text" name="name" placeholder="Name" required><br/>
        <input class="input" type="email" name="email" placeholder="Email" required><br/>
        <input class="input" type="password" name="password" placeholder="Password" required><br/>
        <br/>
        <input class="button" type="submit" value="Signup">
    </form>
<?php include 'footer.php' ?>   