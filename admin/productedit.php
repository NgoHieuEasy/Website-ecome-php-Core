<?php 
	include_once './inc/header.php';
?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>

<?php
    $pd=new product();
  
    if(!isset($_GET['productId']) || $_GET['productId']==NULL){
        echo "<script>window.location='productlist.php'</script>";
    }else{
        $id=$_GET['productId'];
    }

    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
       $updateproduct=$pd->update_product($_POST,$_FILES,$id);
    }

?>


	   <!------main-content-start-----------> 
       <div>
       <?php
                if(isset($updateproduct)){
                    echo $updateproduct;
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

                            $get_product_by_id=$pd->getproductbyid($id);
                            if($get_product_by_id){
                                while($result_product=$get_product_by_id->fetch_assoc()){

                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text"  value="<?php echo $result_product['productName']?>" name="productName"  class="form-control" >
                            </div>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Thể loại</label>
                                <div>
                                <select id="select" name="category">
                                    <option>Select Category</option>
                                    <?php
                                        $cat=new category();
                                        $catlist=$cat->show_category();
                                        if($catlist){
                                            while($result=$catlist->fetch_assoc()){
                                    
                                    ?>


                                    <option
                                    <?php if($result['catId']==$result_product['catId']){ echo 'selected';} ?>         
                                    value="<?php echo $result['catId']?>"><?php echo $result['catName']?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                
                            </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nhãn hiệu</label>
                                <div>
                                <select id="select" name="brand">
                                    <?php
                                        $brand=new brand();
                                        $brandlist=$brand->show_brand();
                                        if($brandlist){
                                            while($result=$brandlist->fetch_assoc()){
                                        
                                    ?>
                                        <option>Select Brand</option>
                                        <option
                                        <?php if($result['brandId']==$result_product['brandId']){ echo 'selected';} ?> 
                                        value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?></option>
                                <?php
                                        }
                                    }

                                ?>
                            
                            </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <div>
                                <textarea cols="40" name="product_desc" class="tinymce"><?php echo $result_product['product_desc']?></textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text"  name="price" value="<?php echo $result_product['price']?>" >
                            </div>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kiểu</label>
                                <div>
                                <select id="select" name="type">
                                    <option>Select Type</option>
                                    <?php
                                        if($result_product['type1']==0){
                                    ?>
                                    <option  value="1">Nổi bật</option>
                                    <option selected value="0">không nổi bật</option>
                                    <?php
                                        }else{
                                    ?>
                                        <option selected value="1">Nổi bật</option>
                                        <option   value="0">không nổi bật</option>        
                                        
                                        <?php
                                        }
                            ?>
                        </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Ảnh</label>
                                 <div>
                                     <img src="uploads/<?php echo $result_product['image1']?>" width="80"/>
                                    <input type="file" name="image"/>
                                 </div>
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