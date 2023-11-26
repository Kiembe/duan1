<main class="cart">
            <h5>Giỏ Hàng</h5>
            
                <?php
                    if(isset($_SESSION['cart'])&&(count($_SESSION['cart'])>0)){
                        echo '
                        <table class="board">
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Hành Động</th>
                        </tr>
                        ';
                        $i = 1; 
                        foreach($_SESSION['cart'] as $item){
                            $totalPrice =$item[3] * $item[4];
                            echo '
                                <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$item[1].'</td>
                                    <td><img src="'.$item[2].'" width="50px"></td>
                                    <td class="price">'.$item[3].'</td>
                                    <td>'.$item[4].'</td>
                                    <td class="price">'.$totalPrice.'</td>
                                    <td><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                                </tr>
                                
                            ';
                            $i++;
                        }
                        echo '</table>';
                        echo '
                        <div class="action">
                            <a href="#">Thanh Toán</a>
                            <a href="index.php">Tiếp Tục Mua Hàng  </a>
                            <a href="index.php?act=delete_cart">Xóa Giỏ Hàng</a>
                        </div>';
                    }else{
                        echo '<p>Không Có Sản Phẩm Trong Giỏ Hàng! <a href="index.php">Mua Hàng Ngay</a></p>';
                    }
                    ?>
            
        </main>