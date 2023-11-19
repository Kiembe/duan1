<?php 
    if(isset($color)){
        extract($color);
    }
?>
<main>
    <div class="container">
        <h5>Thêm Danh Mục Sản Phẩm</h5>
        <form action="index.php?act=update_listColor" method="post" class="board">
            <div class="capacity">
                <label for="">Tên màu sắc</label><br>
                <input type="text" name="name" placeholder="Xanh, Đỏ ...." value="<?php if(isset($name)&&($name != ""))echo $name; ?>">
            </div>
            <div class="init">
                <label for="">Mã màu sắc</label><br>
                <input type="text" name="code" placeholder="#fff, rgb()...." value="<?php if(isset($code)&&($code != ""))echo $code; ?>">
            </div>
            <div class="submit">
                <input type="hidden" name="id" value="<?php if(isset($id)&&($id > 0))echo $id; ?>">
                <input type="submit" name="update" value="Cập Nhật">
                <a href="index.php?act=mausac"><input type="button"value="Quay lại"></a>
            </div>
        </form>
    </div>
</main>