<nav>
    <div class="top">
        <h5><span>Cửa Hàng</span><br> Mùa lễ hội đã đến rồi đây. Điều tuyệt vời đang chờ bạn.</h5>
    </div>
    <ul class="bot">
        <?php 
            // var_dump($litCat);
            foreach($listCat as $cat){
                extract($cat);
                echo'
                    <a href="index.php?act=list&id='.$id.'">
                        <li>
                            <img src="./uploads/'.$image.'">
                            <p>'.$name.'</p>
                        </li>
                    </a>
                ';
            }
        ?>

    </ul>
</nav>

<div class="newPro">
    <h5>Sản Phẩm Mới Nhất</h5>
    <div class="slider" id="slider">
        <div class="slide" id="slide">
            
            <?php 
                foreach($listProduct as $pro){
                    extract($pro);
                    $linkPro = "index.php?act=prodetail&id=".$id;
                    echo '
                    <a href="'.$linkPro.'" class="item">
                    <img src="./uploads/'.$image.'">
                    <div class="detail">
                        <div class="infor">
                            <p>'.$name.'</p>
                        </div>
                        <div class="act">
                            <button>Mua</button>
                        </div>
                    </div>
                </a>
                    ';  
                }
            ?>


            <div class="item hide"></div>
            <div class="item hide"></div>
            <div class="item hide"></div>
            <div class="item hide"></div>
        </div>
    </div>
    <button class="ctrl-btn pro-prev"><i class="fa-solid fa-arrow-left"></i></button>
    <button class="ctrl-btn pro-next"><i class="fa-solid fa-arrow-right"></i></button>
</div>

<?php
    foreach($listCat as $cat) {
        extract($cat);
        $listpro = loadhome_products_byId($id);
        echo '
        <div class="'.$name.'">
            <div class="head">
                <h5>'.$name.'</h5>
                <a href="index.php?act=list&id='.$id.'">Xem Tất Cả<i class="fa-solid fa-chevron-right"></i></a>
            </div>
        <div class="products">';?>
        <?php
        foreach($listpro as $pro){
            extract($pro);
            echo '
                <a href="index.php?act=prodetail&id='.$id.'" class="product">
                    <img src="./uploads/'.$image.'">
                    <p>'.$name.'</p>
                </a>
            ';
        }
        echo'</div>';
    }
?>




<footer>

</footer>