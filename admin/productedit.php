<?php
include "header.php";
include "slider.php";
include "class/product_class.php"
?>

<?php
$product = new product();
if (isset($_GET['product_id'])|| $_GET['product_id']!=NULL){
    $sanpham_id = $_GET['product_id'];
    }
    $get_sanpham = $product -> get_product($sanpham_id);
    if($get_sanpham){$resul = $get_sanpham ->fetch_assoc();}
  
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	$update_product = $product ->update_product($_POST,$_FILES,$sanpham_id );
}
?>


<div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <input name="product_name" type="text" placeholder="Nhập tên sản phẩm">
                    <select name="cartegory_id" id="">
                        <option value="">--Chọn danh mục--</option>
                        <?php
                        $show_cartegory = $product -> show_cartegory();
                        if($show_cartegory) {while($result = $show_cartegory ->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <select name="brand_id" id="">
                        <option value="">--Chọn loại sản phẩm--</option>
                        <?php
                        $show_brand = $product -> show_brand();
                        if($show_brand) {while($result = $show_brand ->fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <input name="product_price" type="text" placeholder="Giá sản phẩm">
                    <input name="product_price_new" type="text" placeholder="Giá khuyến mãi">
                    <textarea name="product_desc" id="" cols="30" rows="10" placeholder="Mô tả sản phẩm"></textarea>
                    <input name="product_img" type="file">
                    <button type="submit">Thêm</button>
                </form>
            </div>

        </div>
    </section>
</body>
</html>