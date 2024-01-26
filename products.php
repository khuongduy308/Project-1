<?php
include "class/index.php";
// Session::init();
$index = new index;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./run.css">
    <title>Shop của Duy</title>
</head>
<body>
    <header>
        <div class="logo"><i class="fa-solid fa-cart-shopping"></i></div>
        <div class="menu">
            <ul>
                             <?php
                             $show_danhmuc = $index ->show_danhmuc();
                             if($show_danhmuc){while($result = $show_danhmuc ->fetch_assoc()) {
     
                             
                             ?>
                             <li><?php echo $result['cartegory_name'] ?>
                                 <ul class="top-menu-item">
                                         <?php
                                           $danhmuc_id = $result['cartegory_id'];
                                           $show_loaisanpham = $index ->show_loaisanpham($danhmuc_id);
                                           if($show_loaisanpham){while($result = $show_loaisanpham ->fetch_assoc()) {
                                         ?>
                                         <li><a href="cartegory.php?brand_id=<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></a></li>
                                         <?php
                                          } }
                                         ?>
                                 </ul>
                                 <i class="fas fa-chevron-down"></i>
                             </li>
                             <?php
                             } }
                             ?>
            </ul>
         </div>
        <div class="search">
            <li><input placeholder="Search" type="text"><i class="fa-solid fa-magnifying-glass"></i></li>
        </div>
        <div class="login" >
            <!---bo sung sau-->
        </div>

    </header>

    <!--------------product------------->

     <section class="products">
        <div class="sanpham">
            <div class="sanpham-top">
                <h1>Chi tiết sản phẩm</h1>
            </div>
            <div class="sanpham-main">
                <div class="sanpham-main-left">
                    <img src="images/Chelsea xanh ngoc.jpg" alt="">
                </div>
                <div class="sanpham-main-right">
                    <div class="sanpham-main-right-name">
                        <h2>Áo đá bóng</h2>
                    </div>
                    <div class="sanpham-main-right-infor">
                        <p>Áo bóng đá sân khách CLB Chelsea mùa giải 2023-2024</p>
                    </div>
                    <div class="sanpham-main-right-price">
                        <p>300k</p>
                    </div>
                    <div class="bammua">
                        <button>Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
     </section>

    <!------------------footer---------------------->
    <section>
        <div class="in4">
            <li><a href="">Liên hệ</a></li>
            <li><a href="">Fanpage</a></li>
            <li><a href="">Giới thiệu</a></li>
        </div>
    </section>
</body>
