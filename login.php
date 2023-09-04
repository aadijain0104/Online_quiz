<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
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
    width: 100%;
    height: 50px;
    background-color: blueviolet;
    border-radius: 5px;
    font-size: 20px;
    margin: 7px 0;
    color: white;
    border: 0;
    cursor: pointer;
}

.btn:hover{
    background-color: brown;
}

.forget{
    font-size: 16px;
    padding: 4px 0;
}

.link{
    text-decoration: none;
    color: brown;
}

</style>
<body>

  <div class="center">
    <h1>Login</h1>
    <form action="#" method="POST" autocomplete="off">
    <div class="form">
    <input type="text" placeholder="Enter E-mail" class="textfield" name="email" required>

    <input type="password" placeholder="Enter Password" class="textfield" name="password" required>
    
    <div class="forget">
      <input type="submit" class="btn" name="login" value="Login">
      <div class="signup">New Member ?<a href="signup.php" class="link">SignUpHere</a></div>
    </div>
  </div>
</form>
<script>
    function message(){
        alert("Remember your password!!!");
    }
</script>
</body>
</html>

<?php
include("conn.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pwd = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email' && pwd = '$pwd' ";
    $data = mysqli_query($conn,$query);

    $total = mysqli_num_rows($data);
    $get_user_detail = mysqli_fetch_array($data);

    if($total == 1){
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $get_user_detail['id'];
        header('location:test.php');

    }
    else{
        echo "Login Failed";
    }
}
?>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>