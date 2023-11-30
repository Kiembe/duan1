<?php
    if(is_array($user)){
        extract($user);
    }

    if($role == 1){
        $r = "Quản Trị Viên";
    }else{
        $r = "Người Dùng";
    }
?>
<main>
    <div class="container">
        <h5>Phân Quyền Tài Khoản</h5>
            <form action="index.php?act=role_update" method="post" class="board board_user">
                <div>
                    <p>Tên tài khoản : <span><?=$name?></span></p>
                    <p>Loại tài khoản : <span><?=$r?></span></p>
                </div>
                <div>
                    <label for="">Thay Đổi Quyền Hạn</label><br>
                    <select name="role">
                        <option value="">- Chọn Loại Tài Khoản -</option>
                        <option value="0">Người Dùng</option>
                        <option value="1">Quản Trị Viên</option>
                    </select>
                </div>

                <div class="submit">
                    <input type="hidden" name="id" value="<?php if(isset($id)&&($id > 0))echo $id; ?>">
                    <input type="submit" name="update" value="Cập Nhật">
                    <a href="index.php?act=nguoidung"><input type="button"value="Quay lại"></a>
                </div>
            </form>
    </div>
</main>