<?php
    
    include './classes/customer.php';

?>


<?php
	 $cs=new customer();
	
	 if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
        
		 $insertCustomer=$cs->insert_custormer($_POST);
	 }
 

?>


<style>
	.navigation {
  
  		background:pink url('sparkles.png');
	}
</style>
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
                <?php
				if(isset($insertCustomer)){
					echo $insertCustomer;
				}
			?>
                    <h2>Đăng ký</h2>
               
                <form action="" method="POST">
                    <div class="inputBox">
                        <input type="text" name="name1" placeholder="Họ và tên"/>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="city"   placeholder="Thành phố"/>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="zipcode" placeholder="Z-code"/>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" placeholder="Email"/>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="adress" onchange="change_country(this.value)"  placeholder="Địa chỉ"/>
                    </div>
                    <div class="inputBox">
                        <select id="country" name="country" >
                                <option value="null">Chọn thành phố</option>         
                                <option value="hcm">Hồ Chí Minh</option>
                                <option value="bd">Bình Dương</option>
                                <option value="dn">Đà Nẵng</option>
                        </select>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="phone" placeholder="Số điện thoại"/>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="password1"placeholder="Mật khẩu"/>
                    </div>
                    
                    <div class="inputBox">
                        <a href="login.php">Quay lại</a>
                        <input type="submit" name="submit" value="Đăng ký"/>
                    </div>
                  
                </form>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>