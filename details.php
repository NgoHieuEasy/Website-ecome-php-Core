<?php
  include './inc/header.php';
?>
<?php
	 if(!isset($_GET['proId']) || $_GET['proId']==NULL){
        echo "<script>window.location='404.php'</script>";
    }else{
		$id=$_GET['proId'];
	}

	if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
        $quantity=$_POST['quantity'];
		$insertcart=$ct->insert_cart($quantity,$id);
    }

?>


 

  <main id="main">
    <div class="container">
      <!-- Products Details -->
      <section class="section product-details__section">
      <?php
				$get_product_detail=$pd->getproductdetail($id);
				if($get_product_detail){
					while($result=$get_product_detail->fetch_assoc()){
			
			?>
      <form method="post" action="">
        <div class="product-detail__container">
          <div class="product-detail__left">
            <div class="details__container--left">
              <div class="product__pictures">
               
                <img class="picture"  src="admin/uploads/<?php echo $result['image1']?>" alt="" />
                  
              
                
              </div>
              
            </div>

            <div class="product-details__btn">
              <a class="add" href="#">
                <span>
                  <svg>
                    <use xlink:href="./images/sprite.svg#icon-cart-plus"></use>
                  </svg>
                </span>
                <input type="submit" style="border:none;background:none;" name="submit" value="Thêm giỏ hàng"/></a>
             
            </div>
          </div>

          <div class="product-detail__right">
            <div class="product-detail__content">
              <h3><?php echo $result['catName']?></h3>
              <div class="price">
                <span class="new__price"><?php echo $fm->format_curency($result['price'])?> VND</span>
              </div>
             
              <p>
              <?php echo $result['product_desc']?>
              </p>
              <div class="product__info-container">
                <ul class="product__info">
    
                  <li>

                    <div class="input-counter">
                      <span>Số lượng</span>
                      <input type="number"  min="1" value="1"  name="quantity" max="10" class="counter-btn">                        
                      
                    </div>
                  </li>

                  
                  <li>
                    <span>Nhãn hiệu:</span>
                    <a href="#"><?php echo $result['brandName']?></a>
                  </li>
                  <li>
                    <span>Thể loại:</span>
                    <a href="#"><?php echo $result['catName']?></a>
                  </li>
                  
                </ul>
               
              </div>
            </div>
          </div>
        </div>      
          </div>
        </div>
        </form>
      </section>
      <?php
				
			}
		}
	
	
	?>

     <!-- Latest Products -->
     <section class="section latest__products">
        <div class="title__container">
          <div class="section__title filter-btn active" data-id="Latest Products">
            <span class="dot"></span>
            <h1 class="primary__title">Sản phẩm nổi bật</h1>
          </div>
        </div>
        <div class="container" data-aos="fade-up" data-aos-duration="1200">
          <div class="glide" id="glide_2">
            <div class="glide__track" data-glide-el="track">
              <ul class="glide__slides latest-center">
              <?php
                $get_product_feature=$pd->getproduct_feathered();
                if($get_product_feature){
                  while($result=$get_product_feature->fetch_assoc()){
				
				?>

                <li class="glide__slide">
                  <div class="product">
                    <div class="product__header">
                      <a href="#"><img src="admin/uploads/<?php echo $result['image1']?>" alt="product"></a>
                    </div>
                    <div class="product__footer">
                      <h3><?php echo $result['productName']?> </h3>
                      
                      <div class="product__price">
                        <h4><?php echo $fm->format_curency($result['price'])?> VND</h4>
                      </div>
                      <!-- <a href="#"><button type="submit" class="product__btn">Chi tiết</button></a> -->
                      <!-- <div class="container_button"> -->
                        <a href="details.php?proId=<?php echo $result['productId'] ?>" class="product__btn1">
                            <span> </span>
                            <span> </span>
                            <span> </span>
                            <span> </span>
                            Xem

                          </a>
                      <!-- </div> -->
                    </div>
                    
                  </div>
                </li>
             
                <?php
                    }
                  }
				      ?>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- Latest Products -->
      <section class="section related__products">
        <div class="title__container">
          <div class="section__title filter-btn active">
            <span class=" dot"></span>
            <h1 class="primary__title">Sản phẩm mới nhất</h1>
          </div>
        </div>
        <div class="container" data-aos="fade-up" data-aos-duration="1200">
          <div class="glide" id="glide_3">
            <div class="glide__track" data-glide-el="track">
              <ul class="glide__slides latest-center">
              <?php
					$get_product_new=$pd->getproduct_new();
					if($get_product_new){
						while($result_new=$get_product_new->fetch_assoc()){
				
				?>
                <li class="glide__slide">
                  <div class="product">
                    <div class="product__header">
                      <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image1']?>" alt="product"></a>
                    </div>
                    <div class="product__footer">
                      <h3><?php echo $result_new['productName']?></h3>
                      
                      <div class="product__price">
                        <h4><?php  echo $fm->format_curency($result_new['price'])?> VND</h4>
                      </div>
                      <!-- <a href="#"><button type="submit" class="product__btn">Chi tiết</button></a> -->
                      <div class="container_button">
                        <a href="details.php?proId=<?php echo $result_new['productId']?>" class="product__btn1">
                            <span> </span>
                            <span> </span>
                            <span> </span>
                            <span> </span>
                            Xem

                          </a>
                      </div>
                    </div>
                    
                  </div>
                 
                </li>
                <?php
						}
					}
				?>
				
                
              </ul>
             </div>

           
          </div>
        </div>
      </section>
    </div>
   

    <?php
        include './inc/footer.php';
   ?>