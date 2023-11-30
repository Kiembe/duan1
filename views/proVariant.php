<?php
    if(is_array($product)){
        extract($product);
    }

    if(is_array($variantOne)){
        extract($variantOne);
    }

    $img = "./uploads/".$image;
?>
<main>
            <form action="index.php?act=add_cart" method="post" class="product">
                <div class="left">
                    <img src="<?=$img?>">
                </div>

                <div class="right">
                    <p class="name"><?=$name?></p>
                    <p class="price"><?=$variantOne['price']?></p>

                    <div class="storage">
                        <p>Dung Lượng :</p>
                    <?php
                        $i=-1;
                        foreach($listVariant as $var){
                            extract($var);
                            $variant = "index.php?act=variantDetail&idpro='".$product['id']."'&id=".$id;
                            $i++;
                            if($listStorage[$i]['id'] == $id_storage ){
                                $capacity = $listStorage[$i]['capacity'];
                                $unit = $listStorage[$i]['unit'];
                                if($price > 0 && $quantity >0){
                                    echo '
                                        <a href="'.$variant.'">'.$capacity.' '.$unit.'</a>
                                    ';
                                }
                            }
                        }
                    ?>
                    </div>

                    <div class="act">
                        <input type="hidden" name="idSto" value="<?=$variantOne['id_storage']?>">
                        <input type="submit" name="add" value="Mua Ngay">
                        <input type="hidden" name="proName" value="<?=$name?>">
                        <input type="hidden" name="proImg" value="<?=$img?>">
                        <input type="hidden" name="proPrice" value="<?=$variantOne['price']?>">
                        <input type="hidden" name="idProduct" value="<?=$product['id']?>">
                        <input type="hidden" name="idVariant" value="<?=$variantOne['id']?>">
                    </div>
                </div>
            </form>

            <div class="detail">
                <div class="left">
                    <div class="description">
                        <h5>Chi Tiết Sản Phẩm</h5>
                        <div class="content">
                            Kích thước màn hình
    
                            6.1 inches
                            Công nghệ màn hình
    
                            Super Retina XDR OLED
                            Camera sau
    
                            Camera chính: 48MP, 24 mm, ƒ/1.78,
                            Camera góc siêu rộng: 12 MP, 13 mm, ƒ/2.2
                            Camera Tele 3x: 12 MP, 77 mm, ƒ/2.8
                            Camera Tele 2x: 12 MP, 48 mm, ƒ/1.78
                            Camera trước
    
                            12MP, ƒ/1.9
                            Chipset
    
                            A17 Pro
                            Dung lượng RAM
    
                            8 GB
                            Bộ nhớ trong
    
                            512 GB
                            Pin
    
                            3274 mAh
                            Thẻ SIM
    
                            2 SIM (nano‑SIM và eSIM)
                            Hệ điều hành
    
                            iOS 17
                            Độ phân giải màn hình
    
                            2556 x 1179 pixels
                            Tính năng màn hình
    
                            Tốc độ làm mới 120Hz
                            460 ppi
                            HDR
                            True Tone
                            Dải màu rộng (P3)
                            Haptic Touch
                            Tỷ lệ tương phản 2.000.000:1
                        </div>
                    </div>
                    
                    <div class="comment">
                        <form action="#">
                            <h5>Bình Luận</h5>
                            <input type="text" name="comment" placeholder="Nhập bình luận tại đây ....">
                            <input type="submit" value="Bình Luận">
                        </form>

                        <div class="listComment">
                            <ul>
                                <li>Điện Thoại Đẹp Quá</li>
                                <li>Điện Thoại Đẹp Quá</li>
                                <li>Điện Thoại Đẹp Quá</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="right">
                    <div class="samePro">
                        <h5>Sản Phẩm Tương Tự</h5>
                        <a href="" class="product">
                            <img src="./public/img/ip15.png" >
                            <div class="detail">
                                <p class="name">iPhone 15 Pro</p>   
                                <p class="price">30.000.000đ</p>
                            </div>
                        </a>
                        <a href="" class="product">
                            <img src="./public/img/ip15.png" >
                            <div class="detail">
                                <p class="name">iPhone 15 Pro</p>   
                                <p class="price">30.000.000đ</p>
                            </div>
                        </a>
                        <a href="" class="product">
                            <img src="./public/img/ip15.png" >
                            <div class="detail">
                                <p class="name">iPhone 15 Pro</p>   
                                <p class="price">30.000.000đ</p>
                            </div>
                        </a>
                        <a href="" class="product">
                            <img src="./public/img/ip15.png" >
                            <div class="detail">
                                <p class="name">iPhone 15 Pro</p>   
                                <p class="price">30.000.000đ</p>
                            </div>
                        </a>
                        <a href="" class="product">
                            <img src="./public/img/ip15.png" >
                            <div class="detail">
                                <p class="name">iPhone 15 Pro</p>   
                                <p class="price">30.000.000đ</p>
                            </div>
                        </a>
                        <a href="" class="product">
                            <img src="./public/img/ip15.png" >
                            <div class="detail">
                                <p class="name">iPhone 15 Pro</p>   
                                <p class="price">30.000.000đ</p>
                            </div>
                        </a>
                        <a href="" class="product">
                            <img src="./public/img/ip15.png" >
                            <div class="detail">
                                <p class="name">iPhone 15 Pro</p>   
                                <p class="price">30.000.000đ</p>
                            </div>
                        </a>
                        
                    </div>
                </div>
            </div>
        </main>