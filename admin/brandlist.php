<?php 
	include_once './inc/header.php';
?>
<?php include '../classes/brand.php';?>

<?php 
	$brand=new brand();

	if(isset($_POST['submit'])){
		$brandName=$_POST['brandName'];

		$insertbrand=$brand->insert_brand($brandName);
	}
	if(isset($_GET['delid'])){
        $id=$_GET['delid'];
		$delbrand=$brand->del_brand($id);  
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
							    <h2 class="ml-lg-2">Danh sách thương hiệu</h2>
							 </div>
							
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							   <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
							   <i class="material-icons">&#xE147;</i>
							   <span>Thêm thương hiệu</span>
							   </a>
							   
							 </div>
					     </div>
					   </div>
					   
					   <table class="table table-striped table-hover">
					      <thead>
						     <tr>
							 <th>ID</th>
							 <th>Tên thương hiệu</th>
							 <th>Hành động</th>
							
							 </tr>
						  </thead>
						  
						  <tbody>
						  <?php
							$show_brand=$brand->show_brand();
							if($show_brand){
								$i=0;
								while($result=$show_brand->fetch_assoc()){
									$i++;
							?>
						      <tr>									
									<td><?php echo $i?></td>
									<td><?php echo $result['brandName']?></td>
									<th>
									<a href="brandedit.php?brandid=<?php echo $result["brandId"] ?>">
									<i class="material-icons edit" data-toggle="tooltip" title="Edit">&#xE254;</i>
									</a>
									<a onclick="return confirm('Bạn có muốn xóa?')" href="?delid=<?php echo $result["brandId"] ?>">
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
        <h5 class="modal-title">Thêm danh mục</h5>
	
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="brandlist.php" method="post">
		<div class="modal-body">
			<div class="form-group">
				<label>Tên danh mục</label>
				<input type="text" class="form-control" name="brandName" >
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
			  </div>
<?php 
	include_once './inc/footer.php';
?>