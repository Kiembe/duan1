<main >
    <form action="index.php?act=pay" method="post" class="cart">
            <h5>Giỏ Hàng</h5>
                <?php
                    if(isset($listCart)){
                        if(is_array($listCart) && ($listCart != null)){
                            echo '
                            <table class="board">
                            <tr>
                                <th>STT</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình Ảnh</th>
                                <th>Phiên Bản</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                                <th>Hành Động</th>
                            </tr>
                            ';
                            $total = 0;
                            $i = 0; 
                            foreach($listCart as $cart){
                                extract($cart);
                                $totalPrice =$quantity * $price;
                                $total +=$totalPrice;
                                $delete = "index.php?act=deleteOnePro_cart&id=".$id;
                                $i++;
                                echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td>'.$pro_name.'</td>
                                        <td><img src="'.$image.'" width="50px"></td>
                                        <td>' ?>
                                        <?php
                                        foreach($listStorage as $sto){
                                            extract($sto);
                                            if($id == $id_sto){
                                                $storage = ''.$capacity.' '.$unit.'';
                                                echo $storage;
                                            }
                                        }?>
                                    <?php
                                    echo'
                                        </td>
                                        <td class="price">'.$price.'</td>
                                        <td>'.$quantity.'</td>
                                        <td class="price">'.$totalPrice.'</td>
                                        <td><a href="'.$delete.'"><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                                    
                                ';
                            }
                            echo '
                                <tr class="totalPrice">
                                    <td>Tổng Tiền</td>
                                    <td colspan="5"></td>
                                    <td class="price">'.$total.'</td>
                                    <td></td>
                                </tr>
                            </table>';
                            echo '
                            <div class="action">
                                <input type="submit" name="submit" value="Thanh Toán">
                                <a href="index.php">Tiếp Tục Mua Hàng  </a>
                                <a href="index.php?act=delete_cart">Xóa Giỏ Hàng</a>
                                
                            </div>';
                            
                        }else{
                            echo '<p>Không Có Sản Phẩm Trong Giỏ Hàng! <a href="index.php">Mua Hàng Ngay</a></p>';
                        }
                    }
                    
                    ?>
                    <?php
                            if(isset($_SESSION['name']['name'])&&($_SESSION['name']['name'] != "")){
                                echo '<input type="hidden" name="idUser" value="'.$_SESSION['name']['id'].'">';
                            }else{
                                '<input type="hidden" name="idUser" value="0">';
                            }
                        ?>
            </form>
            <?php
             
            ?>
        </main>