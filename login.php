<?php
    include 'lib/session.php';
    Session::init();
    include './classes/customer.php';

?>


<?php
    $cs=new customer();
	
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['login'])){
    
        $loginCustomer=$cs->login_customer($_POST);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css" />
</head>
<body>
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="container">
                <div class="form">
                    <h2>Đăng nhập</h2>
                <form  action="" method="POST">
                    <div class="inputBox">
                        <input type="text" name="email" placeholder="email"/>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="password1" placeholder="mật khẩu"/>
                    </div>
                    
                    <div class="inputBox">
                        <input type="submit" name="login"  value="Đăng nhập"/>
                    </div>
                    <p class="forget">Đăng ký tài khoản?<a href="signup.php">Đăng ký</a></p>
                </form>
               
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>