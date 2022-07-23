<?php 
    $filepath=realpath(dirname(__FILE__));
    include_once($filepath.'/../lib/database.php');
    include_once($filepath.'/../helpers/format.php');

?>


<?php


class category{
    private $db;
    private $fm;

    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();
    }

    public function insert_category($catName){
        $catName=$this->fm->validation($catName);

        $catName=mysqli_real_escape_string($this->db->link,$catName);     

        if(empty($catName)){
            
            $alert="<span class='sucess'>Không được trống</span>";
            return $alert;
        }else{
            $query="INSERT INTO tbl_category(catName) VALUES('$catName')";
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

    public function show_category(){
        $query="SELECT * FROM tbl_category order by catId DESC";
        $result=$this->db->insert($query);
        return $result;
    }

    public function update_category($catName,$id){
        $catName=$this->fm->validation($catName);
        $catName=mysqli_real_escape_string($this->db->link,$catName); 
        $id=mysqli_real_escape_string($this->db->link,$id); 

        if(empty($catName)){
            
            $alert="<span class='sucess'>Không được trống</span>";
            return $alert;
        }else{
            $query="UPDATE tbl_category SET catName='$catName' WHERE catId='$id'";
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


    public function del_category($id){
        $query="DELETE FROM  tbl_category  WHERE catId='$id'";
        $result=$this->db->delete($query);
        if($result){
            $alert="<span class='sucess'>Xóa thành công</span>";
            return $alert;
        }else{
            $alert="<span class='error'>Xóa thất bại</span>";
            return $alert;
        }
            

    
    }


    public function getcatbyId($id){
        $query="SELECT * FROM tbl_category WHERE catId='$id'";
        $result=$this->db->select($query);
        return $result;
    }

    public function showCategory_font(){
        $query="SELECT * FROM tbl_category order by catId DESC";
        $result=$this->db->insert($query);
        return $result;
    }

    



}




?>