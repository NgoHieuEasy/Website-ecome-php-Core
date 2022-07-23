<?php 
	include_once './inc/header.php';
?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>

<?php 
	 $pd=new product();

	if(isset($_POST['submit'])){
		$insertproduct=$pd->insert_product($_POST,$_FILES);
	}
	$fm=new Format();
	$product=new product();
	if(isset($_GET['productId'])){
		$id=$_GET['productId'];
		$delpro=$product->del_product($id);
	}

?>
	   <!------main-content-start-----------> 
		     
		      <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">
					     
					   <div class="table-title">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Danh sách sản phẩm</h2>
							 </div>
							
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							   <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
							   <i class="material-icons">&#xE147;</i>
							   <span>Thêm sản phẩm</span>
							   </a>
							   
							 </div>
					     </div>
					   </div>
					   
					   <table class="table table-striped table-hover">
					      <thead>
						     <tr>
							 <th>ID</th>
							 <th>Tên sản phẩm</th>
							 <th>Giá</th>
							 <th>Ảnh</th>
							 <th>Thể loại</th>
							 <th>Nhãn hiệu</th>
							 <th>Mô tả</th>
							 <th>Kiểu</th>
							 <th>Hành động</th>
							
							 </tr>
						  </thead>
						  
						  <tbody>
						  <?php 
                              
                                $productlist=$product->show_product();
                                $i=0;
                                if($productlist){
                                    while($result=$productlist->fetch_assoc()){
                                        $i++;
				
				            ?>
						      <tr>									
									<td><?php echo $i?></td>
									<td><?php echo $result['productName']?></td>
									<td><?php echo $result['price']?></td>
									<td><img src="uploads/<?php echo $result['image1']?>" width="80"/></td>
									<td><?php echo $result['catName']?></td>
									<td><?php echo $result['brandName']?></td>
									<td><?php echo $fm->textShorten($result['product_desc'],50)?></td>
                                    <td><?php
                                        if($result['type1']==0){
                                            echo 'không nổi bật';
                                        }else{
                                            echo 'nổi bật';
                                        }
                                        ?>
                                    </td>
									<th>
									<a href="productedit.php?productId=<?php echo $result['productId']?>">
									<i class="material-icons edit" data-toggle="tooltip" title="Edit">&#xE254;</i>
									</a>
									<a onclick="return confirm('Bạn có muốn xóa?')" href="?productId=<?php echo $result['productId']?>">
									<i class="material-icons delete" data-toggle="tooltip" title="Delete">&#xE872;</i>
									</a>
									
									</th>
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
					
					
									   <!----add-modal start--------->
		<div class="modal fade" tabindex="-1" id="addEmployeeModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm sản phẩm</h5>
	
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="productlist.php" method="post" enctype="multipart/form-data">
		<div class="modal-body">
			<div class="form-group">
				<label>Tên sản phẩm</label>
				<input type="text" class="form-control" name="productName" >
			</div>
            <div class="form-group">
				<label>Thể loại</label>
                <div>
                <select id="select" name="category">
                    <option>Chọn thể loại</option>
                    <?php
                        $cat=new category();
                        $catlist=$cat->show_category();
                        if($catlist){
                            while($result=$catlist->fetch_assoc()){
                    
                    ?>

                    <option value="<?php echo $result['catId']?>"><?php echo $result['catName']?></option>
                    <?php
                            }
                        }
                    ?>
                    
                </select>
                </div>
                
				
			</div>
            <div class="form-group">
				<label>Nhãn hiệu</label>
                <div>
                <select id="select" name="brand">
                  
                        <option>Chọn nhãn hiệu</option>
						<?php
                        $brand=new brand();
                        $brandlist=$brand->show_brand();
                        if($brandlist){
                            while($result=$brandlist->fetch_assoc()){
                        
                        ?>
                        <option value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>
                    <?php
                            }
                        }

                    ?>
                            
                </select>
                </div>
				
			</div>
            <div class="form-group">
				<label>Mô tả</label>
                <div>
                    <textarea name="product_desc" class="tinymce" cols="40"></textarea>

                </div>
			</div>
            <div class="form-group">
				<label>Giá</label>
				<input type="text" class="form-control" name="price" >
			</div>
            <div class="form-group">
				<label>Ảnh</label>
				<input type="file" name="image"/>
			</div>
            <div class="form-group">
				<label>Kiểu</label>
                <div>
                <select id="select" name="type">
                    <option>Select Type</option>
                    <option value="1">Nổi bật</option>
                    <option value="0">không nổi bật</option>
                </select>
                </div>
               
			</div>
		
		
		</div>


		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
			<input type="submit" name="submit" Value="Thêm" class="btn btn-success"></input>
		</div>
	</form>
    </div>
  </div>
</div>

					   					   
					
</div>
			  </div>
<?php 
	include_once './inc/footer.php';
?>