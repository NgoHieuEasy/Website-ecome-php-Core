<?php
  include './inc/header.php';
?>
<?php
	 if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id=Session::get('customer_id');
		$insertorder=$ct->insert_order($customer_id);
		$del_data=$ct->dell_all_data_cart();
		header('Location:orderdetail.php');
	}

?>



    <main id="main">
        <section class="section cart__area">
            <div class="container">
                <div class="responsive__cart-area">
                    <!-- <form class="cart__form"> -->
                        <div class="cart__table table-responsive">
                        <?php
						if(isset($update_quantity_cart)){
							echo $update_quantity_cart;
						}
                        ?>
                        <?php
                            if(isset($delcart)){
                                echo $delcart;
                            }
                        ?>
                       
                            <table width="100%" class="table">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        
                                      
                                    </tr>
                                </thead>
                                <?php
								$get_product_cart=$ct->getproductcart();

								if($get_product_cart){
									$subtotal=0;
									$qty=0;
									while($result_cart=$get_product_cart->fetch_assoc()){

								
							?>
                              
                                <tbody>
                                    <tr>
                                        <td class="product__thumbnail">
                                            <a href="#">
                                            <img src="admin/uploads/<?php echo $result_cart['image1']?>" alt=""/>
                                            </a>
                                        </td>
                                        <td class="product__name">
                                            <a href="#"><?php echo $result_cart['productName']?></a>
                                
                                        </td>
                                        <td class="product__price">
                                            <div class="price">
                                                <span class="new__price"><?php echo $result_cart['price']?></span>
                                            </div>
                                        </td>
                                        <td class="product__quantity">
                                            <div class="input-counter">
                                                <div> 
                                                <?php echo $result_cart['quantity']?>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product__subtotal">
                                            <div class="price">
                                                <span class="new__price"><?php echo $total=$result_cart['price']*$result_cart['quantity']?></span>
                                            </div>
                                            
                                        </td>
                                        <td>
                                       
                                    </tr>
                                    
                                    
                                </tbody>
                                <?php

                                $subtotal+=$total;
                                $qty+=$result_cart['quantity'];
                                }
                                }

                                ?>
                               
                            </table>
                          
                        </div>

                        <div class="cart__totals">
                            <h3>Thông tin khách hàng</h3>
                            <?php
                                $id=Session::get("customer_id");
                                $showcustomer=$cs->show_customer($id);
                                if($showcustomer){
                                    while($result_cus=$showcustomer->fetch_assoc()){
                                
                            
                            ?>
                            <ul>
                                <li>
                                    Họ và tên:
                                    <span><?php echo $result_cus['name1']?></span>
                                </li>
                                <li>
                                    Thành phố:
                                    <span><?php echo $result_cus['city']?></span>
                                </li>
                                <li>
                                    ZipCode:
                                    <span><?php echo $result_cus['zipcode']?></span>
                                </li>
                                <li>
                                    Email:
                                    <span><?php echo $result_cus['email']?></span>
                                </li>
                                <li>
                                    Địa chỉ:
                                    <span><?php echo $result_cus['adress']?></span>
                                </li>
                                <li>
                                    Số điện thoại:
                                    <span><?php echo $result_cus['phone']?></span>
                                </li>
                            </ul>
                            <?php
                                }}
                            ?>
                                            
                            <a href="editprofile.php">Chỉnh sửa</a>
                        </div>
                       
           

                        <div class="cart__totals">
                        <?php
								$checkcart=$ct->check_cart();
								if($checkcart){
						?>

                           
                            <ul>
                                <li>
                                    Tổng giá
                                    <span class="new__price"><?php
									
                                    echo $subtotal;
                                   Session::set('sum',$subtotal);
                                   Session::set('qty',$qty);
                                    
                                    ?></span>
                                </li>
                                <li>
                                    Thuế:
                                    <span>10%</span>
                                </li>
                                <li>
                                    Tổng cả thuế:
                                    <span class="new__price"><?php
									$vt=$subtotal*0.1;
									$gtotal=$vt+$subtotal;
									echo $gtotal;
								?> </span>
                                </li>
                            </ul>
                            <?php
								}else{
									echo 'Giỏ hàng trống';
								}  
					   ?>
                            <a href="?orderid=order">Đặt hàng</a>
                        </div>
                    <!-- </form> -->
                </div>
                
            </div>
           
        </section>

       
    </main>

   <?php
        include './inc/footer.php';
   ?>