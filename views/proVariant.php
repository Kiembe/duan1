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
                    <div class="quanlity">
                        <label for="quanlity">Số Lượng :</label>
                        <input type="number" name="quality" min="1" max="50" placeholder="1">
                    </div>
                    
                    <div class="act">
                        <input type="submit" name="add" value="Mua Ngay">
                        <input type="hidden" name="idSto" value="<?=$variantOne['id_storage']?>">
                        <input type="hidden" name="proName" value="<?=$name?>">
                        <input type="hidden" name="proImg" value="<?=$img?>">
                        <input type="hidden" name="proPrice" value="<?=$variantOne['price']?>">
                        <input type="hidden" name="idProduct" value="<?=$product['id']?>">
                        <input type="hidden" name="idVariant" value="<?=$variantOne['id']?>">
                        <?php
                            if(isset($_SESSION['name']['name'])&&($_SESSION['name']['name'] != "")){
                                echo '<input type="hidden" name="idUser" value="'.$_SESSION['name']['id'].'">';
                            }else{
                                '<input type="hidden" name="idUser" value="0">';
                            }
                        ?>
                    </div>

            <p class="freeShip"><i class="fa-solid fa-truck-fast"></i> Miễn Phí Vận Chuyển</p>

                </div>
            </form>

            <div class="detail">
                <div class="left">
                    <div class="description">
                        <h5>Chi Tiết Sản Phẩm</h5>
                        <div class="content">
                            <?=$product['description']?>
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
                <?php 
                    $list_same = loadhome_products_byId($id_cat);
                    foreach($list_same as $pro){
                        extract($pro);
                        echo '
                            <a href="" class="product">
                                <img src="./uploads/'.$image.'">
                                <div class="detail">
                                    <p class="name">'.$name.'</p>
                                </div>
                            </a>
                        ';
                    }
                ?>
                
                

            </div>
        </div>
            </div>
        </main>