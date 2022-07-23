<?php 
	include_once './inc/header.php';
?>
<?php include '../classes/category.php';?>
<?php
    $cat=new category();
    
    if(!isset($_GET['catid']) || $_GET['catid']==NULL){
        echo'.......................';
        echo "<script>window.location='catlist.php'</script>";
    }else{
        $id=$_GET['catid'];
    }

    if($_SERVER['REQUEST_METHOD']==='POST'){
		$catName=$_POST['catName'];

		$updateCat=$cat->update_category($catName,$id);
	}
?>

	   <!------main-content-start-----------> 
       <div>
        <?php
                if(isset($updateCat)){
                    echo $updateCat;
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
                            $get_cat_name=$cat->getcatbyId($id);
                            if($get_cat_name){
                                while($result=$get_cat_name->fetch_assoc()){ 
            
                        ?>
                        <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text"  value="<?php echo $result['catName']?>" name="catName"  class="form-control" >
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