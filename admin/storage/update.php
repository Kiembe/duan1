<?php 
    if(isset($sto)){
        extract($sto);
    }
?>
<main>
    <div class="container">
        <h5>Thêm Danh Mục Sản Phẩm</h5>
        <form action="index.php?act=update_listSto" method="post" class="board">
            <div class="capacity">
                <label for="">Dung lượng</label><br>
                <input type="text" name="capacity" placeholder="0..." value="<?php if(isset($capacity)&&($capacity != ""))echo $capacity; ?>">
            </div>
            <div class="init">
                <label for="">Tên danh mục</label><br>
                <input type="text" name="unit" placeholder="GB or TB..." value="<?php if(isset($unit)&&($unit != ""))echo $unit; ?>">
            </div>
            <div class="submit">
                <input type="hidden" name="id" value="<?php if(isset($id)&&($id > 0))echo $id; ?>">
                <input type="submit" name="update" value="Cập Nhật">
                <a href="index.php?act=dungluong"><input type="button"value="Quay lại"></a>
            </div>
        </form>
    </div>
</main>