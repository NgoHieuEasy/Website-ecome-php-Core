<?php
  include './inc/header.php';
?>
<?php
	  $login_check=Session::get('customer_login');
	  if($login_check==false){
		  header('Location:login.php');
	  }

?>
<?php
	if(isset($_GET['confirmid'])){
		$id=$_GET['confirmid'];
		$price=$_GET['price'];
		$time=$_GET['time'];

		$shifted_confirm=$ct->shifted_confirm($id,$price,$time);
	}

	if(isset($_GET['idpd'])){
        $idpd=$_GET['idpd'];
		$del_productorder=$ct->del_productorder($idpd);
		
    }
?>
    <main id="main">
        <section class="section cart__area">
            <div class="container">
                <div class="responsive__cart-area">
                    <!-- <form class="cart__form"> -->
                        <div class="cart__table table-responsive">
                            <table width="100%" class="table">
                                <thead>
                                    <tr>
                        
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Ngày đặt</th>
                                        <th>Tình trạng</th>
                                        <th>Hành động</th>
                                      
                                    </tr>
                                </thead>
                                <?php
                                    $customer_id=Session::get('customer_id');
                                    $getordered=$ct->get_ordered($customer_id);


                                    if($getordered){
                                        $i=0;
                                        while($result_cart=$getordered->fetch_assoc()){
                                        $i++;
                                        
							?>
                                <tbody>
                                    <tr>
                                        <td class="product__thumbnail">
                                            <a href="#">
                                            <img src="admin/uploads/<?php echo $result_cart['image1']?>" alt=""/>
                                            </a>
                                        </td>
                                        <td class="product__name">
                                            <?php echo $result_cart['productName']?></a>
                                
                                        </td>
                                        <td class="product__price">
                                            <div class="price">
                                                <span class="new__price"><?php echo $fm->format_curency($result_cart['price'])?> VND</span>
                                            </div>
                                        </td>
                                        <td class="product__price">
                                            <div class="price">
                                                <span class="new__price"><?php echo $result_cart['quantity']?></span>
                                            </div>
                                        </td>
                                        <td class="product__price">
                                            <div class="price">
                                                <span class="new__price"><?php echo $fm->formatDate($result_cart['date_order'])?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                                if($result_cart['status1']=='0'){
                                                    echo 'Đang xử lí...';
                                                }elseif($result_cart['status1']=='1'){
                                            ?>

                                                <a href="?confirmid=<?php echo $result_cart['id'] ?>&price=<?php echo $fm->format_curency($result_cart['price'])?>
                                                &time=<?php echo $result_cart['date_order']?>">Đã nhận hàng</a>
                                            <?php 
                                                }else{
                                                    echo 'Xác nhận';
                                                }
                                            ?>		
							            </td>
                                        <?php
                                            if($result_cart['status1']==0||$result_cart['status1']==1){
                                            
                                            
                                        ?>
                                            <td><?php echo 'N/A'?></td>
								        <?php
									        }elseif($result_cart['status1']==2){

								        ?>

								        <td>
                                        <td>
                                            <a href="?idpd=<?php echo $result_cart['id']?>" class="remove__cart-item">
                                                    <svg>
                                                        <use xlink:href="./images/sprite.svg#icon-trash"></use>
                                                    </svg>
                                                </a>
                                        </td>
                                        <?php 
                                            }
                                        ?>
                                        </tr>
                                        <?php

                                                }
                                            }
                                        
                                        ?>
							

                                       
                                        
                                    </tr>
                                    
                                </tbody>

                               
                            </table>
                        </div>

                       

                       
                    <!-- </form> -->
                </div>
            </div>
        </section>

       
    </main>

   <?php
        include './inc/footer.php';
   ?>