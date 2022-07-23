<?php 
  
  $filepath=realpath(dirname(__FILE__));
  include_once($filepath.'/../lib/database.php');
  include_once($filepath.'/../helpers/format.php');

?>


<?php

class product{
    private $db;
    private $fm;

    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }

    public function insert_product($data,$files){
        $productName=mysqli_real_escape_string($this->db->link,$data['productName']);     
        $brand=mysqli_real_escape_string($this->db->link,$data['brand']);     
        $category=mysqli_real_escape_string($this->db->link,$data['category']);     
        $product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);     
        $price=mysqli_real_escape_string($this->db->link,$data['price']);     
        $type=mysqli_real_escape_string($this->db->link,$data['type']);    


        $permited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_temp=$_FILES['image']['tmp_name'];

        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image="uploads/".$unique_image; 

        if($productName==''||$brand==''||$category==''||$product_desc==''||$price==''||$type==''||$file_name==''){
            
            $alert="<span class='sucess'>Không được trống</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query="INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type1,image1) 
            VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
            $result=$this->db->insert($query);
            if($result){
                $alert="<span class='sucess'>Thêm thành công</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Thêm thất bại</span>";
                return $alert;
            }
            

        }

    }

    public function show_product(){
            $query="SELECT tbl_product.*,tbl_brand.brandName,tbl_category.catName 
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId=tbl_category.catId
            INNER JOIN tbl_brand ON tbl_product.brandId=tbl_brand.brandId
            ORDER BY tbl_product.productId DESC
            ";
      
        //  $query="SELECT * FROM tbl_product order by catId DESC";
        $result=$this->db->insert($query);
        return $result;
    }

    public function update_product($data,$files,$id){
        $productName=mysqli_real_escape_string($this->db->link,$data['productName']);     
        $brand=mysqli_real_escape_string($this->db->link,$data['brand']);     
        $category=mysqli_real_escape_string($this->db->link,$data['category']);     
        $product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);     
        $price=mysqli_real_escape_string($this->db->link,$data['price']);     
        $type=mysqli_real_escape_string($this->db->link,$data['type']);    
      

        $permited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_temp=$_FILES['image']['tmp_name'];

        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image="uploads/".$unique_image; 

        if($productName==''||$brand==''||$category==''||$product_desc==''||$price==''||$type==''){
            
            $alert="<span class='sucess'>Không được trống</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                // if($file_size>20480){
                //     $alert="<span class='sucess'>file ảnh nên nhỏ hơn 2MB</span>";
                //     return $alert;
               // }else
                if(in_array($file_ext,$permited)===false){
                    $alert="<span class='sucess'>Bạn chỉ có thế upload đuôi jpg,jpeg,png,gif</span>";
                    return $alert;

                }
                move_uploaded_file($file_temp,$uploaded_image);
                $query="UPDATE tbl_product SET
                 productName='$productName',
                 brandId='$brand',
                 catId='$category',
                product_desc='$product_desc',
                price='$price',
                type1='$type',
                image1='$unique_image' WHERE productId='$id'";


            }else{
                $query="UPDATE tbl_product SET
                 productName='$productName',
                 brandId='$brand',
                 catId='$category',
                product_desc='$product_desc',
                price='$price',
                type1='$type' WHERE productId='$id'";
               
            }
            $result=$this->db->update($query);
            if($result){
                $alert="<span class='sucess'>Update thành công</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Update thất bại</span>";
                return $alert;
            }
        }

        
    }


    public function del_product($id){
        $query="DELETE FROM  tbl_product  WHERE productId='$id'";
        $result=$this->db->delete($query);
        if($result){
            $alert="<span class='sucess'>Xóa thành công</span>";
            return $alert;
        }else{
            $alert="<span class='error'>Xóa thất bại</span>";
            return $alert;
        }
    }


    public function getproductbyid($id){
        $query="SELECT * FROM tbl_product WHERE productId='$id'";
        $result=$this->db->select($query);
        return $result;
    }

    //// FONT END

    public function getproduct_feathered(){
        $query="SELECT * FROM tbl_product  WHERE type1='1'";
        $result=$this->db->select($query);
        return $result;
    }

    public function get_all_product_new(){      
        $query="SELECT * FROM tbl_product  ORDER BY productId";
        $result=$this->db->select($query);
        return $result;
    }
    public function getproduct_new(){
             
        $sp_fewpage=4;
        if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }  
        $fewpage=($page-1)*$sp_fewpage;    
        $query="SELECT * FROM tbl_product order by productId DESC LIMIT $fewpage,$sp_fewpage";
        $result=$this->db->insert($query);
        return $result;
    }


    // public function getproduct_new(){
    //     $query="SELECT * FROM tbl_product  ORDER BY productId desc LIMIT 4";
    //     $result=$this->db->select($query);
    //     return $result;
    // }

    public function getproductdetail($id){
        $query="SELECT tbl_product.*,tbl_brand.brandName,tbl_category.catName 
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId=tbl_category.catId
        INNER JOIN tbl_brand ON tbl_product.brandId=tbl_brand.brandId
        WHERE tbl_product.productId='$id'";
        $result=$this->db->insert($query);
        return $result;

    }

    public function getLastestDell(){
        $query="SELECT * FROM tbl_product   WHERE brandId='9' order by productId desc LIMIT 1";
        $result=$this->db->select($query);
        return $result;
    
    }

    public function getLastestHp(){
        $query="SELECT * FROM tbl_product   WHERE brandId='10' order by productId desc LIMIT 1";
        $result=$this->db->select($query);
        return $result;
    
    }

    public function getLastestApple(){
        $query="SELECT * FROM tbl_product   WHERE brandId='14' order by productId desc LIMIT 1";
        $result=$this->db->select($query);
        return $result;
    
    }

    public function getLastestSS(){
        $query="SELECT * FROM tbl_product   WHERE brandId='8' order by productId desc LIMIT 1";
        $result=$this->db->select($query);
        return $result;
    
    }
    

    public function productbycat_font($id){
        $query="SELECT * FROM tbl_product WHERE catId='$id' ORDER BY productId desc LIMIT 8";
        $result=$this->db->insert($query);
    
        return $result;
    }
    public function productbyname_font($id){
        $query="SELECT tbl_product.*,tbl_category.catName,tbl_category.catId
         FROM tbl_product,tbl_category WHERE 
        tbl_product.catId=tbl_category.catId AND tbl_product.catId='$id' LIMIT 1";
         $result=$this->db->select($query);
         return $result;

    }
    // inssert slider
    public function insert_slider($data,$files){
        $slider_name=mysqli_real_escape_string($this->db->link,$data['slider_name']);     
        $type1=mysqli_real_escape_string($this->db->link,$data['type1']);     
     
      

        $permited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['slider_image']['name'];
        $file_size=$_FILES['slider_image']['size'];
        $file_temp=$_FILES['slider_image']['tmp_name'];

        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image="uploads/".$unique_image; 

        if($slider_name==''||$type1==''){     
            $alert="<span class='sucess'>Không được trống</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query="INSERT INTO tbl_slider1(slider_name,type1,slider_image) 
            VALUES('$slider_name','$type1','$unique_image')";
            $result=$this->db->insert($query);
            if($result){
                $alert="<span class='sucess'>Thêm thành công</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Thêm thất bại</span>";
                return $alert;
            }
        }

        
    }

    public function show_slider(){
        $query="SELECT * FROM tbl_slider1";
        $result=$this->db->select($query);
        return $result;

    }
    public function del_slider($id){
        $query="DELETE FROM  tbl_slider1  WHERE id='$id'";
        $result=$this->db->delete($query);
        if($result){
            $alert="<span class='sucess'>Xóa thành công</span>";
            return $alert;
        }else{
            $alert="<span class='error'>Xóa thất bại</span>";
            return $alert;
        }
    }

    public function getsliderbyid($id){
        $query="SELECT * FROM tbl_slider1 WHERE id='$id'";
        $result=$this->db->select($query);
        return $result;

    }

    public function update_slider($data,$files,$id){
        $slider_name=mysqli_real_escape_string($this->db->link,$data['slider_name']);     
        $type1=mysqli_real_escape_string($this->db->link,$data['type1']);     
       
        $permited=array('jpg','jpeg','png','gif');
        $file_name=$_FILES['slider_image']['name'];
        $file_size=$_FILES['slider_image']['size'];
        $file_temp=$_FILES['slider_image']['tmp_name'];

        $div=explode('.',$file_name);
        $file_ext=strtolower(end($div));
        $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image="uploads/".$unique_image; 

        if($slider_name==''||$type1==''){
            
            $alert="<span class='sucess'>Không được trống</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
              
                if(in_array($file_ext,$permited)===false){
                    $alert="<span class='sucess'>Bạn chỉ có thế upload đuôi jpg,jpeg,png,gif</span>";
                    return $alert;

                }
                move_uploaded_file($file_temp,$uploaded_image);
                $query="UPDATE tbl_slider1 SET
                 slider_name='$slider_name',
                 type1='$type1',
                slider_image='$unique_image' WHERE id='$id'";


            }else{
                $query="UPDATE tbl_slider1 SET
                slider_name='$slider_name',
                type1='$type1'
                WHERE id='$id'";
               
            }
            $result=$this->db->update($query);
            if($result){
                $alert="<span class='sucess'>Update thành công</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Update thất bại</span>";
                return $alert;
            }
        }

        
    }

    public function get_slider_font(){
        $query="SELECT * FROM tbl_slider1 ";
        $result=$this->db->select($query);
        return $result;

    }
   







}




?>