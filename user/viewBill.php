<?php
    include "header.php";
?>
<main class="user_main">
    <div class="container">
        <h5>Chi Tiết Đơn Hàng</h5>
        <div class="board board_bill_view">
            <table >
                <tr>
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Hình Ảnh</th>
                    <th>Phiên Bản</th>
                    <th>Đơn Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                </tr>
                <?php
                $i = 0;
                $total = 0;
                if ($Bill != null) {
                    foreach ($Bill as $bil) {
                        extract($bil);
                        $totalPrice = $quantity * $price;
                        $total += $totalPrice;
                        $i++;
                        echo '
                                <tr>
                                    <td>' . $i . '</td>
                                    <td>' . $pro_name . '</td>
                                    <td><img src="' . $image . '" width="50px"></td>
                                    <td>' ?>
                        <?php
                        foreach ($listStorage as $sto) {
                            extract($sto);
                            if ($id == $id_sto) {
                                $storage = '' . $capacity . ' ' . $unit . '';
                                echo $storage;
                            }
                        } ?>
                        <?php
                        echo '
                                    </td>
                                    <td>' . $price . '</td>
                                    <td>' . $quantity . '</td>
                                    <td>' . $totalPrice . '</td>
                                </tr>
                                ';
                    }
                    echo '
                            <tr class="totalPrice">
                                <td>Tổng Tiền</td>
                                <td colspan="5"></td>
                                <td class="price">' . $total . '</td>   
                                </tr>
                            </table>';
                } else {
                    echo '
                                <tr>
                                    <td colspan="7">Không Có Đơn Hàng</td>
                                </tr>
                            ';
                }
                ?>


            </table>
        </div>
        <div class="back_bill">
            <a href="index.php?act=check_my_bill">Quay lại</a>
        </div>
    </div>

</main>