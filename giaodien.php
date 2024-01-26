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
        <!--bo sung sau-->
    </div>

</header>
<!-------------------------------------header------------------------------------------>

<section id="Slider">
    <div class="aspect-ratio-169">
        <img src="https://media.istockphoto.com/id/1315143958/vi/anh/c%E1%BA%ADn-c%E1%BA%A3nh-hai-c%E1%BA%A7u-th%E1%BB%A7-b%C3%B3ng-%C4%91%C3%A1-ho%E1%BA%B7c-b%C3%B3ng-%C4%91%C3%A1-%C4%91ang-thi-%C4%91%E1%BA%A5u-t%E1%BA%A1i-s%C3%A2n-v%E1%BA%ADn-%C4%91%E1%BB%99ng-trong-%C4%91%C3%A8n-pin.jpg?s=1024x1024&w=is&k=20&c=rvxYw1VyqzYj4yjIiOPGqE8Qg8BTfiCIh7ozrtdPkdY=">
    </div>

</section>

<!------------------------footer---------------------->
<section>
    <div class="in4">
        <li><a href="">Liên hệ</a></li>
        <li><a href="">Fanpage</a></li>
        <li><a href="">Giới thiệu</a></li>
    </div>
</section>
    
</body>
</html>