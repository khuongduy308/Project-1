<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
$brand = new brand();
if (!isset($_GET['brand_id'])|| $_GET['brand_id']==NULL){
    echo "<script>window.location = 'brand_list.php'</script>";
	 }
else {$brand_id = $_GET['brand_id'];
    }
    $delete_brand = $brand  -> delete_brand($brand_id);
    header('Location:brandlist.php');
?>