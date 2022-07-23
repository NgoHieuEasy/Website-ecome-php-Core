<?php include 'inc/header.php';?>

<?php include '../classes/product.php';?>

<?php
    $pd=new product();
  
    if(!isset($_GET['sliderId']) || $_GET['sliderId']==NULL){
        echo "<script>window.location='productlist.php'</script>";
    }else{
        $id=$_GET['sliderId'];
    }

    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
       $updateSlider=$pd->update_slider($_POST,$_FILES,$id);
    }

?>


	   <!------main-content-start-----------> 
       <div>
       <?php
                if(isset($updateSlider)){
                    echo $updateSlider;
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

                            $get_slider_by_id=$pd->getsliderbyid($id);
                            if($get_slider_by_id){
                                while($result_slider=$get_slider_by_id->fetch_assoc()){

                            ?>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tên Slider</label>
                                <input type="text"   name="slider_name" value="<?php echo $result_slider['slider_name']?>" class="form-control" >
                            </div>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Ảnh Slider</label>
                                <img src="uploads/<?php echo $result_slider['slider_image']?>" width="80"/>
                                    <input type="file" name="slider_image"/>
                                 
                            </div>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kiểu</label>
                                <select id="select" name="type1">
                           
                           <?php
                               if($result_slider['type1']==0){
                           ?>
                           <option  value="1">Bật</option>
                           <option selected value="0">Tắt</option>
                           <?php
                               }else{
                           ?>
                               <option selected value="1">bật</option>
                               <option   value="0">Tắt</option>        
                               
                               <?php
                               }
                           ?>
                       </select>
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