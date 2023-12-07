<main>
<?php 
    if(is_array($Bill)){
        extract($Bill);
    }

?>
    <div class="container">
        <h5>Cập Nhật Trạng Thái Đơn Hàng</h5>
        <form action="index.php?act=update_status" method="post" class="board board_bill">
            <p>Mã đơn hàng : <?=$Bill[0]['bill_code']?></p>
            <div class="nameCat">
                <label for="">Trạng Thái :</label><br>
                <?php 
                    if($Bill[0]['bill_status'] == 0){
                        echo '
                            <select name="status">
                                <option value="0">Đang Xử Lý</option>
                                <option value="1">Đã Xác Nhận</option>
                                <option value="2">Đang Vận Chuyển</option>
                                <option value="3">Hoàn Thành</option>
                            </select>
                            </div>
                            <div class="submit">
                                <input type="hidden" name="id" value="'. $Bill[0]['id'] .'">
                                <input type="submit" name="update" value="Cập Nhật">
                                <a href="index.php?act=donhang"><input type="button" value="Quay lại"></a>
                            </div>
                        ';
                    }if($Bill[0]['bill_status'] == 1){
                        echo '
                            <select name="status">
                                <option value="1">Đã Xác Nhận</option>
                                <option value="2">Đang Vận Chuyển</option>
                                <option value="3">Hoàn Thành</option>
                            </select>
                            </div>
                            <div class="submit">
                                <input type="hidden" name="id" value="'. $Bill[0]['id'] .'">
                                <input type="submit" name="update" value="Cập Nhật">
                                <a href="index.php?act=donhang"><input type="button" value="Quay lại"></a>
                            </div>
                        ';
                    }if($Bill[0]['bill_status'] == 2){
                        echo '
                            <select name="status">
                                <option value="2">Đang Vận Chuyển</option>
                                <option value="3">Hoàn Thành</option>
                            </select>
                            </div>
                            <div class="submit">
                                <input type="hidden" name="id" value="'. $Bill[0]['id'] .'">
                                <input type="submit" name="update" value="Cập Nhật">
                                <a href="index.php?act=donhang"><input type="button" value="Quay lại"></a>
                            </div>
                        ';
                    }
                ?>
                
            
        </form>

    </div>
</main>