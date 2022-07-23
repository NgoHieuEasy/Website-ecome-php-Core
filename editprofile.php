<?php
	include 'inc/header.php';

?>

<?php
			$login_check=Session::get('customer_login');
				if($login_check==false){
					header('Location:login.php');
				}
?>
<?php
    $id=Session::get("customer_id");

	if($_SERVER['REQUEST_METHOD']==='POST'){
       
		$updateprofile=$cs->update_profile($_POST,$id);
    }

?>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 50px;
  margin-top:20px
 
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

<div class="container1">
<?php
                $id=Session::get("customer_id");
                $showcustomer=$cs->show_customer($id);
                if($showcustomer){
                    while($result_cus=$showcustomer->fetch_assoc()){
                
            
            ?>
  <form action="" action="POST">
  <h4><?php 
        if(isset($updateprofile)){
            echo $updateprofile;
        }
    ?></h4>
  <div class="row">
    <div class="col-25">
      <label for="fname">Họ và tên</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" value="<?php echo $result_cus['name1']?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">ZipCode</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" value="<?php echo $result_cus['zipcode']?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fname">Email</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" value="<?php echo $result_cus['email']?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Địa chỉ</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" value="<?php echo $result_cus['adress']?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Số điện thoại</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" value="<?php echo $result_cus['phone']?>">
    </div>
  </div>
 
  <br>
  <div class="row">
    <input type="submit" value="Thay đổi">
  </div>
  </form>
  <?php
                }
                }
            ?>
</div>







<?php
	include 'inc/footer.php';
?>
