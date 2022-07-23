<?php 
  
  $filepath=realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');

?>


<?php

class customer{
    private $db;
    private $fm;

    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }

    public function insert_custormer($data){
        $name1=mysqli_real_escape_string($this->db->link,$data['name1']);
        $city=mysqli_real_escape_string($this->db->link,$data['city']);
        $zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
        $email=mysqli_real_escape_string($this->db->link,$data['email']);
        $adress=mysqli_real_escape_string($this->db->link,$data['adress']);
        $country=mysqli_real_escape_string($this->db->link,$data['country']);
        $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
        $password1=mysqli_real_escape_string($this->db->link,$data['password1']);
     
        if($name1==''||$city==''||$zipcode==''||$email==''||$adress==''||$country==''||$phone==''||$password1==''){
        
            $alert="<span class='sucess'>Không được trống</span>";
            return $alert;
        }else{
            $check_email="SELECT * from tbl_customer where email='$email' limit 1";
            $check_email=$this->db->select($check_email);
            if($check_email){
                $alert="<span class='sucess'>Email tồn tại</span>";
                return $alert;
            }else{
                $query="INSERT INTO tbl_customer(name1,city,zipcode,email,adress,country,phone,password1) 
                VALUES('$name1','$city','$zipcode','$email','$adress','$country','$phone','$password1')";
                $result=$this->db->insert($query);
                if($result){
                    header('Location:login.php');
                    $alert="<span class='sucess'>Thêm thành công</span>";
                    return $alert;
                   
                }else{
                    $alert="<span class='error'>Thêm thất bại</span>";
                    return $alert;
                }
            }


        }

    }

    public function login_customer($data){
        $email=mysqli_real_escape_string($this->db->link,$data['email']);
        $password1=mysqli_real_escape_string($this->db->link,$data['password1']);

        if($email==''||$password1==''){
            $alert="<span class='sucess'>Không được trống</span>";
            return $alert;
        }else{
            $check_login="SELECT * from tbl_customer where email='$email' AND password1=$password1 limit 1";
            $check_result=$this->db->select($check_login); 
            if($check_result){
                $value=$check_result->fetch_assoc();
                Session::set('customer_login',true);
                Session::set('customer_id',$value['id']);
                Session::set('customer_name',$value['name']);
                header('Location:index.php');
                

            }else{
                $alert="<span class='sucess'>Tài khoản mật khẩu sai</span>";
                return $alert;
            }
        
        }  
    }

    public function show_customer($id){
        $query="SELECT * from tbl_customer where id='$id' limit 1";
        $result=$this->db->insert($query);
        return $result;

    }


    public function update_profile($data,$id){
        $name1=mysqli_real_escape_string($this->db->link,$data['name1']);
        $zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
        $email=mysqli_real_escape_string($this->db->link,$data['email']);
        $adress=mysqli_real_escape_string($this->db->link,$data['adress']);
        $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
     
        if($name1==''||$zipcode==''||$email==''||$adress==''||$phone==''){
        
            $alert="<span class='sucess'>Không được trống</span>";
            return $alert;
        }else{
            $query="UPDATE tbl_customer SET  name1='$name1',zipcode='$zipcode',email='$email',adress='$adress',
            phone='$phone' WHERE id='$id'"; 
            $result=$this->db->update($query);
            if($result){
                $alert="<span class='sucess'>update thành công</span>";
                return $alert;
            }else{
                $alert="<span class='error'>update thất bại</span>";
                return $alert;
        
            }
        }

    }



}