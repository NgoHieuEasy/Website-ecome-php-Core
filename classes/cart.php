<?php 
  
  $filepath=realpath(dirname(__FILE__));
  include_once($filepath.'/../lib/database.php');
  include_once($filepath.'/../helpers/format.php');

?>


<?php

class cart{
    private $db;
    private $fm;

    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }

    public function insert_cart($quantity,$id){
      $quantity=$this->fm->validation($quantity);
      $quantity=mysqli_real_escape_string($this->db->link,$quantity);     
      $id=mysqli_real_escape_string($this->db->link,$id);   
      $sId1=session_id();  

      $query="SELECT * FROM tbl_product WHERE productId='$id'";
      $result=$this->db->select($query)->fetch_assoc();
     
      $image1=$result['image1'];
      $price=$result['price'];
      $productName=$result['productName'];

      // $check_cart="SELECT * FROM tbl_cart WHERE productId='$id' AND sId1='$sId1'";
      // $check_cart = $this->db->select($check_cart);
      // if(check_cart){
      //   $msg="Sản phẩm đã tồn tại giỏ hàng";
      //   return $msg;
      // }else{
        $query_insert="INSERT INTO tbl_cart(productId,quantity,sId1,image1,price,productName) 
        VALUES('$id','$quantity','$sId1','$image1','$price','$productName')";
        $result_insert=$this->db->insert($query_insert);
        if($result_insert){
           header('Location:cart.php');
        }else{
          header('Location:404.php');
        }
     // }


    }

    public function getproductcart(){
      $sId1=session_id();
      $query="SELECT * FROM tbl_cart where sId1='$sId1'";
      $result=$this->db->select($query);
      return $result;
    }

    public function updatequantitycart($quantity,$id){
      $quantity=mysqli_real_escape_string($this->db->link,$quantity); 
      $id=mysqli_real_escape_string($this->db->link,$id); 
      $query="UPDATE tbl_cart SET quantity='$quantity' WHERE cartId='$id'";
      $result=$this->db->update($query);

      if($result){
        header('Location:cart.php');    

      }else{
        $msg="<span>update that bai </span>";
        return $msg;    
      }
    }

    public function del_cart($cartid){
      
      $cartId=mysqli_real_escape_string($this->db->link,$cartid); 
      $query="DELETE FROM tbl_cart  WHERE cartId='$cartId'";
      $result=$this->db->delete($query);

      if($result){
        header('Location:cart.php');
      }else{
        $msg="<span>Xoa that bai </span>";
        return $msg;    
      }

    }

    public function check_cart(){
      $sId1=session_id();
      $query="SELECT * FROM tbl_cart where sId1='$sId1'";
      $result=$this->db->select($query);
      return $result;
    }

    public function dell_all_data_cart(){
      $sId1=session_id();
      $query="DELETE FROM tbl_cart WHERE sId1='$sId1'";
      $result=$this->db->select($query);
      return $result;
    }

    public function insert_order($customer_id){
      $sId1=session_id();
      $query="SELECT * FROM tbl_cart WHERE sId1='$sId1' ";
      $result=$this->db->select($query);

      if($result){
        while($result_cart=$result->fetch_assoc()){
            $productId=$result_cart['productId'];
            $productName=$result_cart['productName'];
            $quantity=$result_cart['quantity'];
            $price=$result_cart['price'] *$quantity;
            $image1=$result_cart['image1'];
            $query_insert="INSERT INTO tbl_order(productId,productName,quantity,price,image1,customer_id) 
            VALUES('$productId','$productName','$quantity','$price','$image1',$customer_id)";
            $insert_order=$this->db->insert($query_insert);
        }
      }

    }
    public function get_amount_price($customer_id){
      $query="SELECT price FROM tbl_order WHERE customer_id='$customer_id'  ";
      $result=$this->db->select($query);
      return $result;

    }

    public function checkorder($chekorderId){
      $query="SELECT * FROM tbl_order WHERE customer_id='$chekorderId'  ";
      $result=$this->db->select($query);
      return $result;

    }

    public function getcartorder($customer_id){
      $query="SELECT * FROM tbl_order WHERE customer_id='$customer_id'  ";
      $result=$this->db->select($query);
      return $result;
    }


    public function get_ordered($customer_id){
    
      $query="SELECT * FROM tbl_order WHERE customer_id='$customer_id'  ";
      $result=$this->db->select($query);
      return $result;
    }

    public function get_inbox_cart(){
      $query="SELECT * FROM tbl_order ORDER BY date_order ";
      $result=$this->db->select($query);
      return $result;
    }

    public function shifted($id,$price,$time){
      $price=mysqli_real_escape_string($this->db->link,$price); 
      $id=mysqli_real_escape_string($this->db->link,$id); 
      $time=mysqli_real_escape_string($this->db->link,$time); 
      $query="UPDATE tbl_order SET
       status1='1' WHERE id='$id' AND price='$price' AND date_order='$time'";
      $result=$this->db->update($query);

      if($result){
        $msg="<span>delete thanh cong </span>";
        return $msg;    
     }else{
        $msg="<span>delete that bai </span>";
        return $msg;    
      }


    }


    public function del_shifted($id,$price,$time){
      $price=mysqli_real_escape_string($this->db->link,$price); 
      $id=mysqli_real_escape_string($this->db->link,$id); 
      $time=mysqli_real_escape_string($this->db->link,$time); 
      $query="DELETE FROM tbl_order  WHERE id='$id' AND price='$price' AND date_order='$time'";
      $result=$this->db->delete($query);

      if($result){
        $msg="<span>delete thanh cong </span>";
        return $msg;    
     }else{
        $msg="<span>delete that bai </span>";
        return $msg;    
      }

    }

  

    public function shifted_confirm($id,$price,$time){
      $price=mysqli_real_escape_string($this->db->link,$price); 
      $id=mysqli_real_escape_string($this->db->link,$id); 
      $time=mysqli_real_escape_string($this->db->link,$time); 
      $query="UPDATE tbl_order SET
       status1='2' WHERE id='$id' AND price='$price' AND date_order='$time' ";
      $result=$this->db->update($query);

      if($result){
        $msg="<span>delete thanh cong </span>";
        return $msg;    
     }else{
        $msg="<span>delete that bai </span>";
        return $msg;    
      }


    }

    public function del_productorder($id){
    
      $query="DELETE FROM tbl_order WHERE id='$id'";
      $result=$this->db->delete($query);
      return $result;
    }


    
}




?>