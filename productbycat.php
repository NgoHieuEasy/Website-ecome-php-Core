<?php
	include 'inc/header.php';


?>
<?php

	if(!isset($_GET['catid']) || $_GET['catid']==NULL){
		echo'.......................';
		echo "<script>window.location='catlist.php'</script>";
	}else{
		$id=$_GET['catid'];
	}

	

?>

 <div class="main">
    <div class="content">
	
    	<div class="content_top">
    		<div class="heading">
			<?php
			$productbyname=$pd->productbyname_font($id);
			if($productbyname){
				while($result_name=$productbyname->fetch_assoc()){	
			?>
    		<h3><?php echo $result_name['catName']?></h3>
			<?php
				}}else{
					echo 'Không có sản phẩm';
				}
			?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <?php
			$productbycat=$pd->productbycat_font($id);
			if($productbycat){
				while($result=$productbycat->fetch_assoc()){	
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image1']?>" alt="" /></a>
					 <h2><?php echo $result['productName']?> </h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],100)?></p>
					 <p><span class="price"><?php echo $result['price']?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']?>" class="details">Details</a></span></div>
				</div>
				<?php
				}
				}
			?>
				
			</div>
			
    </div>
 </div>

 <?php
	include 'inc/footer.php';
?>
