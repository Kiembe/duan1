<?php
    if(is_array($addres)){
        extract($addres);
    }
?>
<main class="updateInfo">
    <h5>Cập Nhật Thông Tin Nhận Hàng</h5>
    <div class="board">
    <form action="index.php?act=infoUpdate" method="post" >
        <div>
            <label for="name">Họ Và Tên</label>
            <input required type="text" name="name" placeholder="Nguyễn Văn A" value="<?php if(isset($full_name)) echo $full_name; ?>">
        </div>
        <div>
            <label for="tel">Số Điện Thoại</label>
            <input required type="tel" name="tel" placeholder="03xxxxx954" value="<?php if(isset($tel)) echo $tel; ?>">
        </div>
        <div>
            <label for="name">Địa Chỉ Nhận Hàng</label>
            <input required type="text" name="address" placeholder="Xã - Phường, Quận - Huyện, Tỉnh" value="<?php if(isset($address)) echo $address; ?>">
        </div>
        <div class="act">
            <input type="submit" name="update" value="Lưu">
            <?php
                if(isset($_SESSION['name']['name'])&&($_SESSION['name']['name'] != "")){
                    echo '<input type="hidden" name="idUser" value="'.$_SESSION['name']['id'].'">';
                }else{
                    '<input type="hidden" name="idUser" value="0">';
                }
            ?>
        </div>
    </form>
    </div>
</main>