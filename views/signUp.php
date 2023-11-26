<main class="signUp">
    <h5>Đăng Ký Tài Khoản</h5>
    <form action="index.php?act=signUp" method="post">
        <div class="userName">
            <label for="userName">Tên Đăng Nhập</label>
            <input required type="text" name="userName">
        </div>
        <div class="pass">
            <label for="password">Nhập Mật Khẩu</label>
            <input required type="password" name="password">
        </div>
        <div class="email">
            <label for="email">Nhập Email</label>
            <input required type="email" name="email">
        </div>
        <div class="tel">
            <label for="tel">Nhập Số Điện Thoại</label>
            <input required type="tel" name="tel">
        </div>
        <div class="action">
            <input type="submit" name="signUP" value="Đăng Ký">
        </div>
    </form>
    <p>Bạn đã có tài khoản? <a href="index.php?act=sign_in">Đăng Nhập Ngay</a></p>
</main>