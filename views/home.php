<nav>
    <div class="top">
        <h5><span>Cửa Hàng</span><br> Mùa lễ hội đã đến rồi đây. Điều tuyệt vời đang chờ bạn.</h5>
    </div>
    <ul class="bot">
        <a href="#">
            <li>
                <img src="./public/img/ip.png">
                <p>iPhone</p>
            </li>
        </a>
        <a href="#">
            <li>
                <img src="./public/img/ipad.png">
                <p>iPad</p>
            </li>
        </a>
        <a href="#">
            <li>
                <img src="./public/img/mac.png">
                <p>MacBook</p>

            </li>
        </a>
        <a href="#">
            <li>
                <img src="./public/img/watch.png">
                <p>Watch</p>

            </li>
        </a>

    </ul>
</nav>

<div class="newPro">
    <h5>Sản Phẩm Mới Nhất</h5>
    <div class="slider" id="slider">
        <div class="slide" id="slide">
            
            <?php 
                foreach($listProduct as $pro){
                    extract($pro);
                    echo '
                    <a href="" class="item">
                    <img src="./uploads/'.$image.'">
                    <div class="detail">
                        <div class="infor">
                            <p>'.$name.'</p>
                            <p>'.$price.'</p>
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

<div class="iPhone">
    <div class="head">
        <h5>iPhone</h5>
        <a href="">Xem Tất Cả<i class="fa-solid fa-chevron-right"></i></a>
    </div>
    <div class="products">
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
    </div>
</div>

<div class="iPad">
    <div class="head">
        <h5>iPad</h5>
        <a href="">Xem Tất Cả<i class="fa-solid fa-chevron-right"></i></a>
    </div>
    <div class="products">
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
    </div>
</div>

<div class="macBook">
    <div class="head">
        <h5>MacBook</h5>
        <a href="">Xem Tất Cả <i class="fa-solid fa-chevron-right"></i></a>
    </div>
    <div class="products">
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
    </div>
</div>

<div class="watch">
    <div class="head">
        <h5>Apple Watch</h5>
        <a href="">Xem Tất Cả <i class="fa-solid fa-chevron-right"></i></a>
    </div>
    <div class="products">
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
        <a href="" class="product">
            <img src="./public/img/ip15.png">
            <p>iPhone 15 Pro</p>
            <p>30.000.000đ</p>
        </a>
    </div>
</div>

<footer>

</footer>