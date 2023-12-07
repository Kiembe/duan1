<main>
            <div class="container">
                <h5>Danh Sách Đơn Hàng</h5>
                <table class="board board_bill">
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Thời Gian Đặt Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Phương Thức Thanh Toán</th>
                        <th>Trạng Thái</th>
                        <th>Hành Động</th>
                    </tr>
                    <?php 
                        if($listBill != null) {
                            foreach($listBill as $bill){
                                extract($bill);
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
                                if($bill_status == 0 || $bill_status == 1 || $bill_status == 2 ){
                                    $update = "index.php?act=update_bill&id=".$id;
                                    $color = "";
                                }else{
                                    $color = "#32475c3a";
                                    $update = "";
                                }
                                
                                $view = "index.php?act=view_bill&id_user=".$id_user."&id=".$id;
                                echo '
                                <tr>
                                    <td>'.$bill_code.'</td>
                                    <td>'.$time.'</td>
                                    <td>'.$name_user.'</td>
                                    <td>'.$pay.'</td>
                                    '.$status.'
                                    <td><a href="'.$update.'" style="background:'.$color.'"><i class="fa-regular fa-pen-to-square" ></i></a><a href="'.$view.'"><i class="fa-solid fa-eye"></i></a></td>
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
    