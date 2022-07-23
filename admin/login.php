<?php
	include '../classes/adminlogin.php';
?>
<?php
	$class=new adminlogin();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$adminUser=$_POST['adminUser'];
		$adminPass=$_POST['adminPass'];

		$login_check=$class->login_admin($adminUser,$adminPass);
	}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َAnimated Login Form</title>
    <link rel="stylesheet" href="./css/login.css">
  </head>
  <body>

<form class="box" action="login.php" method="post">
  <h1>Đăng nhập</h1>
  <span><?php
        if(isset($login_check)){
            echo $login_check;
        }

				
	?></span>
  <input type="text" name="adminUser" placeholder="Tên tài khoản">
  <input type="password" name="adminPass" placeholder="Mật khẩu">
  <input type="submit" name="" value="Đăng nhập">
</form>


  </body>
</html>
