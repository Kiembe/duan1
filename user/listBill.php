<?php include "header.php" ?>
<main class="user_main">
            <div class="container">
                <h5>Danh Sách Đơn Hàng</h5>
                <table class="board board_bill">
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Sản Phẩm</th>
                        <th>Thời Gian Đặt Hàng</th>
                        <th>Thanh Toán</th>
                        <th>Trạng Thái</th>
                        <th>Chi Tiết</th>
                        <th>Hủy Đơn</th>
                    </tr>
                    <?php 
                        if($listBill != null) {
                            foreach($listBill as $bill){
                                extract($bill);
                                $Bill = load_bill_detail($id);
                                switch($pay_method){
                                    case "1" :
                                        $pay = "COD";
                                        break;
                                    case "2" :
                                        $pay = "Banking";
                                        break;
                                    case "3" :
                                        $pay = "Momo";
                                        break;
                                }
                                switch($bill_status){
                                    case "0" :
                                        $status = "<td>Đang Xử Lý</td>";
                                        break;
                                    case "1" :
                                        $status = "<td>Đã Xác Nhận</td>";
                                        break;
                                    case "2" :
                                        $status = "<td>Đang Vận Chuyển</td>";
                                        break;
                                    case "3" :
                                        $status = '<td style="color:#008000">Hoàn Thành</td>';
                                        break;
                                    case "4" :
                                        $status = '<td style="color:#fd2323f2">Đã Hủy</td>';
                                        break;
                                }
                                $view = "index.php?act=bill_detail&id_user=".$id_user."&id=".$id;
                                if($bill_status == 0 || $bill_status == 1 ){
                                    $cancel = "index.php?act=cancel_bill&id=".$id;
                                    $color = "#fd2323f2";
                                }else{
                                    $cancel = "";
                                    $color = "#32475c3a";
                                }
                                echo '
                                <tr>
                                    <td>'.$bill_code.'</td>
                                    <td>';?>
                                    <?php
                                        foreach($Bill as $bil){
                                            extract($bil);
                                            echo $pro_name."<br>";
                                        } 
                                    
                                    ?>
                                    <?php
                                    echo '</td>
                                    <td>'.$time.'</td>
                                    <td>'.$pay.'</td>
                                    '.$status.'
                                    <td><a href="'.$view.'"><i class="fa-solid fa-eye"></i></a></td>
                                    <td><a href="'.$cancel.'"><i class="fa-solid fa-ban" style="background:'.$color.';"></i></a></td>
                                </tr>
                                ';
                            }
                        }else{
                            echo '
                                <tr>
                                    <td colspan="7">Không Có Đơn Hàng</td>
                                </tr>
                            ';
                        }
                    ?>
                    <!-- <input type="hidden" name="idUser" value=""> -->
                    
                </table>
            </div>
        </main>
    