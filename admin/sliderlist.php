<?php 
	include_once './inc/header.php';
?>
<?php include '../classes/product.php';?>

<?php
	$product=new product();

    if(isset($_POST['submit'])){
        $insertSlider=$product->insert_slider($_POST,$_FILES);
    }
	if(isset($_GET['sliderId'])){
		$id=$_GET['sliderId'];
		$delSlider=$product->del_slider($id);
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
							    <h2 class="ml-lg-2">Danh sách slider</h2>
							 </div>
							
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							   <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
							   <i class="material-icons">&#xE147;</i>
							   <span>Thêm slider</span>
							   </a>
							   
							 </div>
					     </div>
					   </div>
					   
					   <table class="table table-striped table-hover">
					      <thead>
						     <tr>
							 <th>ID</th>
							 <th>Tên slider</th>
                            <th>Ảnh slider</th>
                            <th>Kiểu slider</th>
							 <th>Hành động</th>
							
							 </tr>
						  </thead>
						  
						  <tbody>
						  <?php 
                            $sliderList=$product->show_slider();
                            $i=0;
                            if($sliderList){
                                while($result=$sliderList->fetch_assoc()){
                                    $i++;
				
				            ?>
						      <tr>									
									<td><?php echo $i?></td>
									<td><?php echo $result['slider_name']?></td>
									<td><img src="uploads/<?php echo $result['slider_image']?>" height="80" width="80"/></td>
									<td><?php
                                        if($result['type1']==0){
                                            echo 'không nổi bật';
                                        }else{
                                            echo 'nổi bật';
                                        }
                                    ?></td>
									<th>
									<a href="slideredit.php?sliderId=<?php echo $result['id']?>">
									<i class="material-icons edit" data-toggle="tooltip" title="Edit">&#xE254;</i>
									</a>
									<a onclick="return confirm('Bạn có muốn xóa?')" href="?sliderId=<?php echo $result['id']?>">
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
        <h5 class="modal-title">Thêm slider</h5>
	
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="modal-body">
			<div class="form-group">
				<label>Tên slider</label>
				<input type="text" class="form-control" name="slider_name" >
			</div>
            <div class="form-group">
				<label>Ảnh</label>
				<input type="file" name="slider_image"/>
			</div>
            <div class="form-group">
				<label>Kiểu</label>
				<div>
                    <select name="type1">
                        <option value="1">Mở</option>
                        <option value="0">Tắt</option>
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

					   <!----edit-modal end--------->
					   
					   
					   
					   
			
</div>
</div>
			  </div>
<?php 
	include_once './inc/footer.php';
?>