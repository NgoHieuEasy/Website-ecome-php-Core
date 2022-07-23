<?php 
	include_once './inc/header.php';
?>
<?php include '../classes/brand.php';?>

<?php
    $cat=new brand();
    
    if(!isset($_GET['brandid']) || $_GET['brandid']==NULL){
        echo "<script>window.location='brandlist.php'</script>";
    }else{
        $id=$_GET['brandid'];
    }

    if($_SERVER['REQUEST_METHOD']==='POST'){
		$brandName=$_POST['brandName'];

		$updatebrand=$cat->update_brand($brandName,$id);
	}


	

?>

	   <!------main-content-start-----------> 
       <div>
       <?php
            if(isset($updatebrand)){
                echo $updatebrand;
            }
        ?> 
       </div>
		      <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
                                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Chỉnh sửa</h5>
                            
                        </div>
                        <?php 
                            $get_brand_name=$cat->getbrandbyId($id);
                            if($get_brand_name){
                                while($result=$get_brand_name->fetch_assoc()){           
                        ?>
                        <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text"  value="<?php echo $result['brandName']?>" name="brandName"  class="form-control" >
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" value="Sửa" class="btn btn-success"></input>
                        </div>
                                </form>
                        <?php
                             }
                            }
                        ?>
                        </div>
                     </div>
                </div>
            </div>
         </div>
                                    
	

					   <!----edit-modal end--------->
					   
					   
					   
					   
					   
	
<?php 
	include_once './inc/footer.php';
?>