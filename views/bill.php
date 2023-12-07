<?php
    if(is_array($addres)){
        extract($addres);
    }
?>
<main class="bill">
            <h5>Thanh Toán</h5>
            <form action="index.php?act=addbill" method="post"  class="board">
                <div class="address">
                    <div>
                        <p>Địa Chỉ Nhận Hàng</p>
                        <?php 
                            if(isset($id_user)){
                                echo '
                                <p>Họ Và Tên :    '.$full_name.'</p>
                                <p>SĐT :    '.$tel.'</p>
                                <p>Địa Chỉ :    '.$address.'</p>
                                </div>
                                <div>
                                <a href="index.php?act=updateInfo">Thay Đổi</a>
                                ';
                            }else{
                                echo '
                                <p>Vui lòng nhập họ tên</p>
                                <p>Vui lòng nhập số điện thoại</p>
                                <p>Vui lòng nhập địa chỉ</p>
                                </div>
                                <div>
                                <a href="index.php?act=addInfo">Thay Đổi</a>
                                ';
                            }
                        
                        ?>
                    

                    </div>
                </div>
                <table >
                    <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Phiên Bản<nav></nav></th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                    <?php
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
                                </tr>
                                
                            ';
                        }
                        echo '
                            <tr class="totalPrice">
                                <td>Tổng Tiền</td>
                                <td colspan="5"></td>
                                <td class="price">'.$total.'</td>   
                            </tr>
                        </table>';
                    ?>
                </table>

                <div class="pay">
                    <div>
                        <p>Phương Thức Thanh Toán</p>
                        <div>
                            <input type="radio" name="pay" value="1" checked>
                            Thanh Thoán Khi Nhận Hàng <br>
                        </div>
                        <div>
                            <input type="radio" name="pay" value="2">
                            Thanh Thoán Qua Ngân Hàng <br>
                        </div>
                        <div>
                            <input type="radio" name="pay" value="3">
                            Thanh Thoán Qua Ví Momo <br>
                        </div>
                    </div>
                    <div class="act">
                        <input type="hidden" name="">
                        <input type="submit" name="add" value="Đặt Hàng">
                        <input type="hidden" name="nameUser" value="<?=$full_name?>">
                        <input type="hidden" name="total" value="<?=$total?>">

                        <?php
                            if(isset($_SESSION['name']['name'])&&($_SESSION['name']['name'] != "")){
                                echo '<input type="hidden" name="idUser" value="'.$_SESSION['name']['id'].'">';
                            }else{
                                '<input type="hidden" name="idUser" value="0">';
                            }
                        ?>
                    </div>
                </div>
                
            </form>
        </main>