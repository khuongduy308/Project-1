<?php
 define('__ROOT__', dirname(dirname(__FILE__))); 
 require_once(__ROOT__.'/admin/database.php');
 require_once(__ROOT__.'/admin/session.php');
 require_once(__ROOT__.'/admin/format.php');
//  include_once '../helper/format.php';
//  include_once '../lib/database.php';
?>

<?php
 class index
 {

    private $db;
    private $fm;

    public function __construct()
    {
        $this ->db = new Database();
        $this ->fm = new Format();
    }
    // public function show_product(){
    //     // $query = "SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC";
    //     $query = "SELECT tbl_baiviet.*, tbl_danhmuc.danhmuc_ten
    //     FROM tbl_baiviet INNER JOIN tbl_danhmuc ON tbl_baiviet.baiviet_danhmuc = tbl_danhmuc.danhmuc_id
    //     ORDER BY tbl_danhmuc.danhmuc_id DESC  ";
    //     $result = $this -> db ->select($query);
    //     return $result;
    // }
    public function show_danhmuc(){
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_loaisanpham($danhmuc_id) {
        $query = "SELECT * FROM tbl_brand  WHERE cartegory_id = '$danhmuc_id' ORDER BY brand_id";
        $result = $this -> db ->select($query);
        return $result;
    }

}

 
?>