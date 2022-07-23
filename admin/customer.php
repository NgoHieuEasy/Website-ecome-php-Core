<?php 
	include_once './inc/header.php';
?>

<?php
	$filepath=realpath(dirname(__FILE__));
	include_once($filepath.'/../classes/customer.php');
	include_once($filepath.'/../helpers/format.php');
?>

<?php
    $cs=new customer();
    
    if(!isset($_GET['customerid']) || $_GET['customerid']==NULL){
        echo "<script>window.location='inbox.php'</script>";
    }else{
        $id=$_GET['customerid'];
    }


?>


<!------main-content-start-----------> 
		     
<div class="main-content">
            <div class="row">
            <div class="col-md-12">
                                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin khách hàng</h5>
                    
                </div>
                <?php
                    $get_customer=$cs->show_customer($id);
                    if($get_customer){
                        while($result=$get_customer->fetch_assoc()){

                ?>
                <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text"  value="<?php echo $result['name1']?>"   class="form-control" >
                    </div>
                    
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Thành phố</label>
                        <input type="text"  value="<?php echo $result['city']?>"  class="form-control" >
                    </div>
                    
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Quốc gia</label>
                        <input type="text"  value="<?php echo $result['country']?>"   class="form-control" >
                    </div>
                    
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text"  value="<?php echo $result['adress']?>"   class="form-control" >
                    </div>
                    
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text"  value="<?php echo $result['email']?>"   class="form-control" >
                    </div>
                    
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
                  


<?php include 'inc/footer.php'?>