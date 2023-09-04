<?php 
include("conn.php"); 
//error_reporting(0);
//$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
body {
    margin: 0;
    padding: 0;
    background-color: pink;
}

.center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 400px;
    background: skyblue;
    border-radius: 5px;
    border: 2px solid black;
}

.center h1{
    text-align: center;
    padding-bottom: 20px;
    border-bottom: 2px solid black;
}

.form {
    padding-bottom: 15px;
    margin: 0 20px;
    text-align: center;
}

.textfield{
    width: 100%;
    height: 50px;
    font-size: 18px;
    border: 1px solid black;
    border-radius: 5px;
    box-sizing: border-box;
    padding-left: 10px;
    margin: 7px 0;
    background-color: aliceblue;
}

.btn{
    width: 20%;
    height: 25px;
    background-color: blueviolet;
    border-radius: 5px;
    font-size: 10px;
    margin: 7px 0;
    color: white;
    border: 0;
    cursor: pointer;
}

.btn:hover{
    background-color: brown;
}

</style>
<body><div class="center">
    <h1>Sign Up</h1>
    <!--<div class="container">-->
        <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form">
            <div class="input_field">
                <label>Name</label>
                <input type="text" class="input" name="name" required>
            </div>
            <div class="input_field" required>
                <label>E-mail</label>
                <input type="email" class="input" name="email">
            </div>
            <div class="input_field">
                <label>Password</label>
                <input type="password" class="input" name="password" required>
            </div>
            <div class="input_field">
                <input type="submit" value="Submit" class="btn" name="submit">
            </div>
        </div>
</form>
    </div>
</body>
</html>

<?php
    if(isset($_POST['register']))
    {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = md5($_POST['password']);
        
        //Convert array into String
        
    
            if($name !="" && $email !="" && $pwd !=""){
        
                $sql="SELECT * FROM users where email='$email'";
                $result = mysqli_query($conn,$sql);
                $present = mysqli_num_rows($result);
                if($present>0){
                    echo "<script>alert('User already exits')</script>";
                }
                else{
                    $query = "INSERT INTO users(`name`,`email`,`pwd`) VALUES('$name','$email','$pwd')";
                    $data = mysqli_query($conn,$query);
                }

                if($data)
                {
                    echo "Data Inserted Successfully";
                }
                else{
                    echo "Failed";
                }
            }  
    }    
?>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>