<?php
include "header.php";
include "slider.php";
include "class/product_class.php"
?>

<?php
$product = new product();
if (!isset($_GET['product_id'])|| $_GET['product_id']==NULL){
    echo "<script>window.location = 'productlist.php'</script>";
	 }
else {$sanpham_id = $_GET['product_id'];
    }
    $delete_product = $product  -> delete_product($sanpham_id);
    // $delete_product_anh =  $product -> delete_product_anh($sanpham_id);
    header('Location:productlist.php');
?>