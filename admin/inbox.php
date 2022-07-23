<?php include 'inc/header.php';?>


<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../classes/cart.php');
	include_once($filepath.'/../helpers/format.php');
?>

<?php
	$ct=new cart();
		if(isset($_GET['shifid'])){
		$id=$_GET['shifid'];
		$price=$_GET['price'];
		$time=$_GET['time'];

		$shifted=$ct->shifted($id,$price,$time);
		}
	


	if(isset($_GET['delid'])){
		$id=$_GET['delid'];
		$price=$_GET['price'];
		$time=$_GET['time'];

		$delshifted=$ct->del_shifted($id,$price,$time);
	}

?>
          
          <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">
					     
					   <div class="table-title">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Danh sách đặt hàng</h2>
							 </div>
							
							
					     </div>
					   </div>
					   
					   <table class="table table-striped table-hover">
					      <thead>
						     <tr>
							 <th>ID</th>
							 <th>Thời gian</th>
							 <th>Sản phẩm</th>
							 <th>Số lượng</th>
							 <th>Giá</th>
							 <th>ID khách</th>
							 <th>Địa chỉ</th>
							 <th>Hành động</th>
							
							 </tr>
						  </thead>
						  
						  <tbody>
                            <?php
                            $ct=new cart();
                            $fm=new Format();
                                $getInboxCart=$ct->get_inbox_cart();
                                if($getInboxCart){
                                    $i=0;
                                    while($resultInbox=$getInboxCart->fetch_assoc()){
                                        $i++;
                                
                            
                            ?>
						      <tr>									
									<td><?php echo $i?></td>
									<td><?php echo $fm->formatDate($resultInbox['date_order'])?></td>
									<td><?php echo $resultInbox['productName']?></td>
							<td><?php echo $resultInbox['quantity']?></td>
							<td><?php echo $resultInbox['price']?></td>
							<td><?php echo $resultInbox['customer_id']?></td>
							<td><a href="customer.php?customerid=<?php echo $resultInbox['customer_id']?>">Thông tin</a></td>
							<td>
								<?php
									if($resultInbox['status1']=='0'){
								
								?>
									<a href="?shifid=<?php echo $resultInbox['id']?>&price=<?php echo $resultInbox['price']?>
									&time=<?php echo $resultInbox['date_order']?>">Đang xử lí</a>
									<?php
									 }elseif($resultInbox['status1']=='1'){
								?>
								<?php
									echo 'Đã vận chuyển';
								?>
									
								<?php
									 }else{
										
										
								?>
									<a href="?delid=<?php echo $resultInbox['id']?>&price=<?php echo $resultInbox['price']?>
									&time=<?php echo $resultInbox['date_order']?>">Xóa</a>
								<?php
									}
								?>

							</td>
									
							 </tr>
							 
						<?php
								}
							}
						?>
							 
							 
							  
							 
						  </tbody>
						  
					      
					   </table>
					   
					   <div class="clearfix">
					     <div class="hint-text">showing <b>5</b> out of <b>25</b></div>
					     <ul class="pagination">
						    <li class="page-item disabled"><a href="#">Previous</a></li>
							<li class="page-item "><a href="#"class="page-link">1</a></li>
							<li class="page-item "><a href="#"class="page-link">2</a></li>
							<li class="page-item active"><a href="#"class="page-link">3</a></li>
							<li class="page-item "><a href="#"class="page-link">4</a></li>
							<li class="page-item "><a href="#"class="page-link">5</a></li>
							<li class="page-item "><a href="#" class="page-link">Next</a></li>
						 </ul>
					   </div>
			   
					   </div>
					</div>
					
			
</div>
</div>
			  </div>
<?php include 'inc/footer.php';?>
