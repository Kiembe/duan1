
<main class="signIn">
    <h5>Đăng Nhập</h5>
    <form action="index.php?act=signIn" method="post">
        <div class="userName">
            <label for="userName">Tên Đăng Nhập</label>
            <input required type="text" name="userName">
        </div>
        <div class="pass">
            <label for="password">Nhập Mật Khẩu</label>
            <input required type="password" name="password">
        </div>

        <div class="action">
            <input type="submit" name="signIN" value="Đăng Nhập">
        </div>
    </form>
    <?php
        if(isset($log)&&($log!=""))echo "<p>'".$log."'</p>";
    ?>
    <p>Bạn chưa có tài khoản? <a href="index.php?act=sign_up">Đăng Ký Ngay</a></p>
</main>