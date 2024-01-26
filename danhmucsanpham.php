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
    <!------------------danhmucsanpham-------------->
    <section class="cartegory">
        <div class="container">
            <div class="container headline">
                <button><span>Bộ lọc</span><i class="fa-solid fa-sort-down"></i></button>
            </div>
            <div class="container headline">
                <select name="" id="">
                    <option value="">Sắp xếp</option>
                    <option value="">Giá cao nhất</option>
                    <option value="">Giá thấp nhất</option>
                </select>
            </div>
        </div>
    <div class="danhsach">   
        <div class="danhmuc">
            <img src="images/Chelsea xanh ngoc.jpg" alt="">
            <h1>Áo bóng đá chính hãng</h1>
            <p>300k</p>
        </div>
        <div class="danhmuc">
            <img src="images/gang tay thu mon Wika Neon vang.jpg" alt="">
            <h1>Găng tay chuyên nghiệp</h1>
            <p>300k</p>
        </div>
        <div class="danhmuc">
            <img src="images/giày bóng đá.jpg" alt="">
            <h1>Giày bóng đá chính hãng</h1>
            <p>300k</p>
        </div>
        <div class="danhmuc">
            <img src="images/quả bóng.jpg" alt="">
            <h1>Bóng siêu xịn</h1>
            <p>300k</p>
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
