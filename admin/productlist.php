<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>

<?php
$product = new product();

?>

    <div class="admin-content-right">
            <div class="admin-content-right-cartegory_list">
                <h1>Danh sách sản phẩm</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>ID</th>
                        <!-- <th>Mã</th> -->
                        <th>Danh mục</th>
                        <th>Loại sản phẩm</th>  
                        <th>Giá</th> 
                        <th>Ảnh</th>   
                        <!-- <th>Ảnh sản phẩm</th>     
                        <th>Size sản phẩm</th>                 -->
                        <th>Tùy chỉnh</th>
                    </tr>
                  <?php
                        $show_product = $product ->show_product();
                        if($show_product){$i=0; while($result = $show_product ->fetch_assoc()){$i++;
                                                
                  ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['product_id'] ?></td>
                        <!-- <td> <?php echo $result['product_ma'] ?></td> -->
                        <td> <?php echo $result['product_name']  ?></td>
                        <td> <?php echo $result['brand_name']  ?></td>
                        <td> <?php echo $result['product_price']  ?></td>              
                        <td> <img style="width: 100px; height: 50px" src="uploads/<?php echo $result['product_img'] ?>" ></td>                
                        <!-- <td><a href="anhsanphamlist.php?product_id=<?php echo $result['product_id'] ?>">Xem</a></td>
                        <td><a href="sizesanphamlist.php?product_id=<?php echo $result['product_id'] ?>">Xem</a></td> -->
                        <td><a href="productedit.php?product_id=<?php echo $result['product_id'] ?>">Sửa</a>|
                        <a href="productdelete.php?product_id=<?php echo $result['product_id'] ?>">Xóa</a></td>
                    </tr>
                    <?php
                     }}
                  ?>
                </table>
            </div>

        </div>
    </section>
</body>
</html>