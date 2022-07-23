<?php
  include './inc/header.php';
?>
<?php

if(isset($_GET['catid'])){
    $cartid=$_GET['catid'];
    $delcart=$ct->del_cart($cartid);
}

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $quantity=$_POST['quantity'];
    $id=$_POST['cartId'];
    $update_quantity_cart=$ct->updatequantitycart($quantity,$id);
    
}

?>
<?php
if(!isset($_GET['id'])){
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>
<style>
     .button {
        
        border: 1px black solid;
        color: black;
        padding: 5px 13px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
}
.button:hover {
    background-color: var(--black);
    color:white;
}
</style>

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
                                        <th>Hành động</th>
                                      
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
                                                <span class="new__price"><?php echo $fm->format_curency($result_cart['price'])?> VND</span>
                                            </div>
                                        </td>
                                        <td class="product__quantity">
                                            <div class="input-counter">
                                                <div>
                                                    
                                                    <form action="" method="post">
                                                        <input type="hidden" name="cartId" value="<?php echo $result_cart['cartId']?>"/>
                                                        <input class="button"  type="number" name="quantity" min="0" value="<?php echo $result_cart['quantity']?>"/>
                                                        <input class="button" type="submit" name="submit" value="Đồng ý"/>
                                                    </form>
                                                   
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product__subtotal">
                                            <div class="price">
                                                <span class="new__price"><?php echo $fm->format_curency($total=$result_cart['price']*$result_cart['quantity'])?> VND</span>
                                            </div>
                                            
                                        </td>
                                        <td>
                                            <a href="?catid=<?php echo $result_cart['cartId']?>" class="remove__cart-item">
                                                    <svg>
                                                        <use xlink:href="./images/sprite.svg#icon-trash"></use>
                                                    </svg>
                                                </a>
                                        </td>
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

                            <h3>Giỏ hàng</h3>
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
                                    ?> VND</span>
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
								?> VND </span>
                                </li>
                            </ul>
                            <?php
								}else{
									echo 'Giỏ hàng trống';
								}  
					        ?>
                            <a href="payment.php">Tiếp tục</a>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </section>

       
    </main>

   <?php
        include './inc/footer.php';
   ?>