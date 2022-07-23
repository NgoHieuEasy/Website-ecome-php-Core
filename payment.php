<?php
  include './inc/header.php';
?>
<?php
			$login_check=Session::get('customer_login');
				if($login_check==false){
					header('Location:login.php');
				}
?>


    <main id="main">
        <!-- Facility Section -->
        <section class="facility__section section" id="facility">
            <div class="container">
                <div class="facility__contianer">
                    <div class="facility__box">
                        <div class="facility-img__container">
                            <a href="offlinepayment.php">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-home"></use>
                            </svg>
                            </a>
                        </div>
                        <p>Nhận hàng thanh toán</p>
                    </div>

                    <div class="facility__box">
                        <div class="facility-img__container">
                        <a href="orderpaymentonline.php">
                            <svg>
                                <use xlink:href="./images/sprite.svg#icon-credit-card"></use>
                            </svg>
                        </a>
                        </div>
                        <p>Thanh toán VNPay</p>
                    </div>

                    
                </div>
            </div>
        </section>
    </main>

   <?php
        include './inc/footer.php';
   ?>