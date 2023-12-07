<?php
    if(is_array($info)){
        extract($info);
    }
    include "header.php";
?>
<main class=user_main>
    <h5>Thay Đổi Mật Khẩu</h5>
    <?php if(isset($log)) echo "<p>".$log."</p>"?>
    <form action="./index.php?act=change_pass" method="post" class="board board_pass">
        <div>
            <label for="name">Nhập Mật Khẩu Hiện Tại</label>
            <input class="pass" type="password" name="pass" placeholder="mật khẩu hiện tại" required><i class="fa-solid fa-eye-slash"></i>
        </div>
        <div>
            <label for="email">Nhập Mật Khẩu Mới</label>
            <input class="pass" type="password" name="newPass" placeholder="mật khẩu mới" required><i class="fa-solid fa-eye-slash"></i>
        </div>
        <div>
            <label for="tel">Xác Nhận Mật Khẩu Mới</label>
            <input class="pass" type="password" name="confimPass" placeholder="xác nhận mật khẩu hiện tại" required><i class="fa-solid fa-eye-slash"></i>
        </div>
        <div class="act">
            <input type="submit" name="update" value="Lưu">
            <input type="hidden" name="id" value="<?=$id?>">
        </div>
    </form>
</main>
<script src="./public/js/showPass.js"></script>