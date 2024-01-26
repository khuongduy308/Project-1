<?php
include "database.php";
?>

<?php
class product {
    private $db;

    public function __construct()
    {
        $this -> db = new Database();
    }
    public function show_cartegory(){
        $query= "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_brand(){
        //$query= "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT tbl_brand.*, tbl_cartegory.cartegory_name
        FROM tbl_brand INNER JOIN tbl_cartegory on tbl_brand.cartegory_id = tbl_cartegory.cartegory_id
        ORDER BY tbl_brand.brand_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }
    public function insert_product() {
        $product_name = $_POST['product_name'];
        $cartegory_id = $_POST['cartegory_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_price_new = $_POST['product_price_new'];
        $product_desc = $_POST['product_desc'];
        $product_img = $_FILES['product_img']['name'];
        move_uploaded_file($_FILES['product_img']['name'],"uploads/".$_FILES['product_img']['name']);

        $query = "INSERT INTO tbl_product (
            product_name,
            cartegory_id,
            brand_id,
            product_price,
            product_price_new,
            product_desc,
            product_img)
            VALUES (
            '$product_name',
            '$cartegory_id',
            '$brand_id',
            '$product_price',
            '$product_price_new',
            '$product_desc',
            '$product_img')";
        $result = $this ->db->insert($query);
        //header('Location:brandlist.php');
        return $result;
    }
    public function show_product(){
        $query = "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name
        FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id
        INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
        ORDER BY tbl_product.product_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_product($product_id){
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function update_product($data,$file,$product_id ) {
        $product_name = $_POST['product_name'];
        $cartegory_id = $_POST['cartegory_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_price_new = $_POST['product_price_new'];
        $product_desc = $_POST['product_desc'];
        $product_img = $_FILES['product_img']['name'];
        $file_ext = strtolower(end($div));
        $sanpham_anh = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = "uploads/".$sanpham_anh;
        
        // move_uploaded_file( $file_temp,$upload_image);
        if(!empty($file_name)&& !empty($filenames))
        {
            
        $query = "UPDATE tbl_product (
            product_name,
            cartegory_id,
            brand_id,
            product_price,
            product_price_new,
            product_desc,
            product_img)
            VALUES (
            '$product_name',
            '$cartegory_id',
            '$brand_id',
            '$product_price',
            '$product_price_new',
            '$product_desc',
            '$product_img')";
        $result = $this ->db->insert($query);
        //header('Location:brandlist.php');
        return $result;
            if($result ) {
                $query = "DELETE  FROM tbl_sanpham_anh WHERE product_id = '$product_id'";
                $result = $this -> db ->delete($query);
                foreach ($filenames as $key => $element) {
                        // move_uploaded_file( $filetmps[$key],"uploads/".$element);
                        $query = "INSERT INTO tbl_sanpham_anh (sanpham_id,sanpham_anh) VALUES ('$product_id','$element')";
                        $result = $this -> db ->insert($query);
                    }
                 }
              header('Location:productlist.php');
              return $result; 
         
              }   
        else {
                $query = "UPDATE tbl_product SET                             
                cartegory_id = '$cartegory_id', 
                brand_id = '$brand_id', 
                product_price = '$product_price',
                product_desc = '$product_desc',
                WHERE product_id = '$product_id'";
                $result = $this ->db ->update($query);
                header('Location:productlist.php');
                return $result; 
        }
        }

        public function delete_product($sanpham_id){
            $query = "DELETE  FROM tbl_product WHERE product_id = '$sanpham_id'";
            $result = $this -> db ->delete($query);
            if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
            else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
          
    
    
        }
        //     public function delete_product_anh($sanpham_id){
        //     $query = "DELETE  FROM tbl_sanpham_anh WHERE sanpham_id = '$sanpham_id'";
        //     $result = $this -> db ->delete($query);
        //     if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        //     else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
          
    
    
        // }































    public function insert_brand($cartegory_id, $brand_name) {
        $query = "INSERT INTO tbl_brand (cartegory_id,brand_name) VALUES ('$cartegory_id','$brand_name')";
        $result = $this ->db->insert($query);
        header('Location:brandlist.php');
        return $result;
    }
    
    
    public function get_brand($brand_id) {
        $query= "SELECT * FROM tbl_brand WHERE brand_id = '$brand_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function update_brand($cartegory_id, $brand_name, $brand_id) {
        $query = "UPDATE tbl_brand SET brand_name = '$brand_name', cartegory_id= '$cartegory_id' WHERE brand_id = '$brand_id'";
        $result = $this ->db->update($query);
        header('Location:brandlist.php');
        return $result;
    }
    public function delete_brand($brand_id){
        $query="DELETE FROM tbl_brand WHERE brand_id='$brand_id'";
        $result = $this ->db->delete($query);
        header('Location:brandlist.php');
        return $result;
    }
}

?>