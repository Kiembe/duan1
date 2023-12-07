<?php
    if(is_array($info)){
        extract($info);
    }
    include "header.php";

?>
<main class=user_main>
    <h5>Thông Tin Tài Khoản</h5>
    <?php if(isset($log)) echo "<p>".$log."</p>"?>
    <form action="./index.php?act=update_info" method="post" class="board">
        <div>
            <label for="name">Tên Đăng Nhập</label>
            <input type="text" name="name" value="<?=$name?>" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?=$email?>" required>
        </div>
        <div>
            <label for="tel">Số Điện Thoại</label>
            <input type="tel" name="tel" value="0<?=$tel?>" required>
        </div>
        <div class="act">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" name="update" value="Lưu">
        </div>
    </form>
</main>