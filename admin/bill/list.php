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
                                        $status = "Đang Xử Lý";
                                        break;
                                    case "1" :
                                        $status = "Đã Xác Nhận";
                                        break;
                                    case "2" :
                                        $status = "Đang Vận Chuyển";
                                        break;
                                    case "3" :
                                        $status = "Hoàn Thành";
                                        break;
                                }
                                $update = "index.php?act=update_bill&id=".$id;
                                $view = "index.php?act=view_bill&id_user=".$id_user."&id=".$id;
                                echo '
                                <tr>
                                    <td>'.$bill_code.'</td>
                                    <td>'.$time.'</td>
                                    <td>'.$name_user.'</td>
                                    <td>'.$pay.'</td>
                                    <td>'.$status.'</td>
                                    <td><a href="'.$update.'"><i class="fa-regular fa-pen-to-square"></i></a><a href="'.$view.'"><i class="fa-solid fa-eye"></i></a></td>
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
    