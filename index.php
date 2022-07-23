<?php
  include './inc/header.php';
?>

<style>
  .img_news{
    height: 200px;
  }
  .banner_01{
    height:400px;
    width:300px;
  }
</style>

    <div class="hero">
      <div class="glide" id="glide_1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
          <?php
                    $get_slider_font=$pd->get_slider_font();
                    if($get_slider_font){
                        while($result_slider=$get_slider_font->fetch_assoc()){

                     
                ?> 
                    <?php
                        if($result_slider['type1']==1){

                        
                    
                    ?>
            <li class="glide__slide">
              <div class="hero__center">
                <div class="hero__left">
                  <h1 class=""><?php echo $result_slider['slider_name']?></h1>
                  <p>Bộ sưu tập mới nhất của chúng tôi có nhiều cải tiến</p>
                  <a href="#"><button class="hero__btn">Chi tiết</button></a>
                </div>
                <div class="hero__right">
                  <div class="hero__img-container">
                    <img class="banner_01" src="admin/uploads/<?php echo $result_slider['slider_image']?>" alt="banner2" />
                  </div>
                </div>
              </div>
            </li>
            <?php 
                        }
                    ?>
                    <?php
                       }
                    }
                ?>
           

          </ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
          <button class="glide__bullet" data-glide-dir="=0"></button>
          <button class="glide__bullet" data-glide-dir="=1"></button>
        </div>

        
      </div>
    </div>
  </header>
  <!-- End Header -->

  <!-- Main -->
  <main id="main">
    <div class="container">
      <!-- Collection -->
      <section id="collection" class="section collection">
      <div class="title__container">
          <div class="section__title filter-btn active">
            <span class=" dot"></span>
            <h1 class="primary__title">Sản phẩm theo hãng</h1>
          </div>
        </div>
        <div class="collection__container" data-aos="fade-up" data-aos-duration="1200">
        <?php
                $get_last_dell=$pd->getLastestDell();
                if($get_last_dell){
                    while($resultdell=$get_last_dell->fetch_assoc()){           
           ?>
          <div class="collection__box">
            <div class="img__container">
              <img class="collection_02" src="admin/uploads/<?php echo $resultdell['image1']?>"  alt="">
            </div>

            <div class="collection__content">
              <div class="collection__data">
                <span><?php echo $fm->textShorten($resultdell["product_desc"],100) ?></span>
                <h1><?php echo $resultdell["productName"]?></h1>
                <a href="details.php?proId=<?php echo $resultdell['productId']?>">Thêm giỏ hàng</a>
              </div>
            </div>
          </div>
          <?php
                  }
                }
            ?>
            <?php
                $get_last_ss=$pd->getLastestSS();
                if($get_last_ss){
                    while($resultss=$get_last_ss->fetch_assoc()){           
           ?>

          <div class="collection__box">
            <div class="img__container">
              <img class="collection_01" src="admin/uploads/<?php echo $resultss['image1']?>"alt="">
            </div>
            <div class="collection__content">
              <div class="collection__data">
                <span><?php echo $fm->textShorten($resultss["product_desc"],100) ?></span>
                <h1><?php echo $resultss["productName"]?></h1>
                <a href="details.php?proId=<?php echo $resultss['productId']?>">Thêm giỏ hàng</a>
              </div>
            </div>
          </div>
          <?php
                  }
                }
            ?>	
      </section>
        <!-- Collection -->
      <section id="collection" class="section collection">
        <div class="collection__container" data-aos="fade-up" data-aos-duration="1200">
        <?php
                $get_last_hp=$pd->getLastestHp();
                if($get_last_hp){
                    while($resulthp=$get_last_hp->fetch_assoc()){           
           ?>
          <div class="collection__box">
            <div class="img__container">
              <img class="collection_02" src="admin/uploads/<?php echo $resulthp['image1']?>" alt="">
            </div>

            <div class="collection__content">
              <div class="collection__data">
                <span><?php echo $fm->textShorten($resulthp["product_desc"],100) ?></span>
                <h1><?php echo $resulthp["productName"]?></h1>
                <a href="details.php?proId=<?php echo $resulthp['productId']?>">Thêm giỏ hàng</a>
              </div>
            </div>
          </div>
          <?php
                  }
                }
            ?>	
            <?php
                $get_last_apple=$pd->getLastestApple();
                if($get_last_apple){
                    while($resultap=$get_last_apple->fetch_assoc()){           
           ?>	
          <div class="collection__box">
            <div class="img__container">
              <img class="collection_01" src="admin/uploads/<?php echo $resultap['image1']?>" alt="">
            </div>
            <div class="collection__content">
              <div class="collection__data">
                <span><?php echo $fm->textShorten($resultap["product_desc"],100) ?></span>
                <h1><?php echo $resultap["productName"]?></h1>
                <a href="details.php?proId=<?php echo $resultap['productId']?>">Thêm giỏ hàng</a>
              </div>
            </div>
          </div>
          <?php
                  }
                }
            ?>

      </section>

      <!--  -->
           <!-- Related Products -->
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
                      <h3><?php echo $fm->textShorten($result_new['productName'],50)?></h3>
                      
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
                      <h3><?php echo $fm->textShorten($result['productName'],50)?> </h3>
                      
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
    </div>
   
    <!--New Section  -->
    <section class="section news" id="news">
      <div class="container">
        <div class="title__container">
          <div class="section__titles">
            <div class="section__title active">
              <span class="dot"></span>
              <h1 class="primary__title">Tin tức</h1>
            </div>
          </div>
        </div>
        <div class="news__container">
          <div class="glide" id="glide_5">
            <div class="glide__track" data-glide-el="track">
              <ul class="glide__slides">
                <li class="glide__slide">
                  <div class="new__card">
                    <div class="card__header">
                      <img class="img_news" src="./images/iphone14.jpg" alt="">
                    </div>
                    <div class="card__footer">
                      <h3>Mô hình iPhone 14 xuất hiện tại Việt Nam</h3>
                      <span>Bởi Admin</span>
                      <p>Iphone 14 dự kiến được công bố ngày 13/9, nhưng bốn mô hình được cho là của sản phẩm đã xuất hiện tại Việt Nam trước hai tháng. 
                        Theo giới kinh doanh đồ Apple, đây là mô hình được sử dụng cho các nhà sản xuất linh kiện như ốp lưng hay miếng dán màn hình. Thông thường.</p>
                      <a href="#"><button>Đọc nhiều hơn</button></a>
                    </div>
                  </div>
                </li>
                <li class="glide__slide">
                  <div class="new__card">
                    <div class="card__header">
                      <img class="img_news" src="./images/appwatch.jpg" alt="">
                    </div>
                    <div class="card__footer">
                      <h3>Apple Watch bản thể thao dự kiến giá 900 USD</h3>
                      <span>Bởi Admin</span>
                      <p>Theo chuyên gia Mark Gurman của Bloomberg, Apple sẽ ra mắt ba mẫu đồng hồ thông minh trong năm nay.
                         Ngoài hai model tiêu chuẩn thay thế cho Series 7 năm ngoái,
                         Apple sẽ bổ sung một dòng sản phẩm chuyên về thể thao là Watch Pro.</p>
                      <a href="#"><button>Đọc nhiều hơn</button></a>
                    </div>
                  </div>
                </li>
                <li class="glide__slide">
                  <div class="new__card">
                    <div class="card__header">
                      <img class="img_news" src="./images/chipapple.jpg" alt="">
                    </div>
                    <div class="card__footer">
                      <h3>Apple đối mặt việc tăng giá chip lần hai</h3>
                      <span>Bởi Admin</span>
                      <p>Theo Bloomberg, công ty hóa chất Showa Denko của Nhật Bản,
                         đơn vị cung cấp nguyên liệu chế tạo chip quan trọng của TSMC, 
                         buộc phải nâng giá nguyên liệu do tình trạng khan hiếm toàn cầu.
                          Hideki Somemiya, CFO Showa Denko, cho biết vấn đề lớn nhất trong năm nay 
                         </p>
                      <a href="#"><button>Đọc nhiều hơn</button></a>
                    </div>
                  </div>
                </li>
               
              </ul>
            </div>
          </div>

        </div>
      </div>
    </section>

  

  </main>

    <?php
        include './inc/footer.php';
   ?>