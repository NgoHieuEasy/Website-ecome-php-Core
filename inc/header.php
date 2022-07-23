<?php
    include 'lib/session.php';
    Session::init();

?>
<?php

	include_once 'lib/database.php';
    include_once 'helpers/format.php';

	spl_autoload_register(function($class){
		include_once 'classes/'.$class.'.php';
	});

	$db=new Database();
	$fm=new Format();
	$ct=new cart();
	$us=new user();
	$cs=new customer();
	$cat=new category();
	$pd=new product();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<style>
  
  .navbar_container{

    animation: animate 2s linear infinite;
    background:pink url(sparkles.png);

  }
@keyframes animate 
{
   0%
   {
       background-position: 0 0;
   }
   100%
   {
       background-position: 0 -64px;
   }

}

  

</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet" />

  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />


  <!-- Carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- Custom StyleSheet -->

  <link rel="stylesheet" href="./css/style.css" />
 

  <title>Happy</title>
</head>

<body>
  
<header id="header" class="header">
    <div class="navigation">
   
      <div class="container navbar_container">
        <nav class="nav">
          <div class="nav__hamburger">
            <svg>
              <use xlink:href="./images/sprite.svg#icon-menu"></use>
            </svg>
          </div>

          <div class="nav__logo">
           
            <a href="/" class="scroll-link">
              <h2 data-text="ShopHappy...">ShopHappy...</h2>
            </a>
          </div>

           <div class="nav__menu">
            <div class="menu__top">
              <span class="nav__category">ShopHappy</span>
              <a href="#" class="close__toggle">
              </a>
            </div>
            <div class="navbar_list">
                
               
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li>
                    <?php
                      if(isset($_GET['customer_id'])){
                        $dellCart=$ct->dell_all_data_cart();
                        Session::destroy();
                      } 
                      ?>  
                    <?php
                      $login_check=Session::get('customer_login');
                      if($login_check==false){
                        echo '<li><a href="login.php">Đăng nhập</a></li>';
                      }else{
                        echo '<li><a href="?customer_id='.Session::get("customer_id").'">Đăng xuất</a></li>';
                      }  
                    ?>
                    </li>
			   
		

                    
                </ul>
           
                
            </div>
          
            
          </div>
        

          <div class="nav__icons">

            
            <a href="#" class="icon__item">
              <svg class="icon__user">
                <use xlink:href="./images/sprite.svg#icon-user"></use>
              </svg>
            </a>
            <a href="cart.php" class="icon__item">
              
              <svg class="icon__cart">
                <use xlink:href="./images/sprite.svg#icon-shopping-basket"></use>
              </svg>
             
              <span id="cart__total"><?php
									$checkcart=$ct->check_cart();
									if($checkcart){
										$sum=Session::get("sum");
										$qty=Session::get("qty");
										echo $qty;
									}else{
										echo '0';
									}
								?></span>
            </a>

           
          </div> 
        </nav>
      </div>
    </div>



   