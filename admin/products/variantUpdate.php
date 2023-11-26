<?php
if (is_array($product)) {
    extract($product);
}
$idPro = $id;
$proName = $name;
if (is_array($listProDetail)) {
    extract($listProDetail);
}





$imgPath = "../uploads/" . $image;
if (is_file($imgPath)) {
    $img = "<img src='" . $imgPath . "' height='80' >";
} else {
    $img = "no photo";
}
?>
<main>
    <div class="container">
        <h5>Sửa Sản Phẩm</h5>
        <form action="index.php?act=update_variant" method="post" class="board boardVariant"
            enctype="multipart/form-data">
            <div class="cat">
                <select name="id_cat">
                    <option value="0" selected>- Chọn Danh Mục -</option>
                    <?php
                    foreach ($listCategories as $cat) {
                        extract($cat);
                        if ($id_cat != $id) {
                            echo '<option value="' . $id . '">' . $name . '</option>';
                        } else {
                            echo '<option value="' . $id . '" selected >' . $name . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="proName">
                <label>Sản Phẩm</label><br>
                <p><i class="fa-solid fa-angles-right"></i>
                    <?= $proName ?>
                </p>
            </div>

            <table class="capacity">
                <tr>
                    <th>Dung Lượng</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Reset</th>
                </tr>
                <?php
                $i = -1;
                foreach ($listStorage as $sto) {
                    $i++;
                    extract($sto);
                    if(isset($listProDetail[$i]['price']) && isset($listProDetail[$i]['quantity'])){
                        $detailPrice  = $listProDetail[$i]['price'];
                        $detailQuan  = $listProDetail[$i]['quantity'];
                    }else{
                        $detailPrice = "0";
                        $detailQuan  = "0";
                    }
                    if(isset($listProDetail[$i]['id'])){
                        $idDetail = $listProDetail[$i]['id'];
                    }else{
                        $idDetail = 0;
                    }
                    $reset = "index.php?act=reset_variant&idPro='".$idPro."'&id=".$idDetail;
                    
                            echo '
                                <tr>
                                    <td>' . $capacity . ' ' . $unit . '
                                        <input type="hidden" name="id_sto'.$i.'" value="' . $id . '">
                                        <input type="hidden" name="id_detail'.$i.'" value="' . $idDetail . '">
                                    </td>
                                    <td>
                                        <input type="number" name="price' . $i . '" min="0" value="' . $detailPrice . '">
                                    </td>
                                    <td>
                                        <input type="number" name="quantity' . $i . '" min="0" value="' . $detailQuan . '">
                                    </td>
                                    <td>
                                        <a href="'.$reset.'"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                                    </td>
                                </tr>
                            ';
                }
                
                ?>
            </table>

            <div class="submit">
                <input type="hidden" name="id" value="<?= $idPro ?>">
                <input type="submit" name="update" value="Cập Nhật">
                <a href="index.php?act=sanpham"><input type="button" value="Quay Lại"></a>
            </div>
        </form>

    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Dữ liệu từ PHP được chuyển thành JavaScript
        var phpData = <?php echo $des ?>

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                // Đổ dữ liệu từ PHP vào CKEditor bằng phương thức setData
                editor.setData(phpData);
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>