<main>
    <div class="container">
        <h5>Màu Sắc</h5>
        <table class="board board_sto">
            <tr>
                <th>STT</th>
                <th>Tên Màu</th>
                <th>Mã Màu</th>
                <th>Thao Tác</th>
            </tr>
            <?php
            $i = 0;
            if($listColor != null){
                foreach ($listColor as $color) {
                    $i++;
                    extract($color);
                    $update = "index.php?act=update_color&id=" . $id;
                    $delete = "index.php?act=delete_color&id=" . $id;
                    echo '
                                <tr>
                                    <td>' . $i . '</td>
                                    <td>' . $name . '</td>
                                    <td>' . $code . '</td>
                                    <td><a href="' . $update . '"><i class="fa-regular fa-pen-to-square"></i></a><a href="' . $delete . '"><i class="fa-regular fa-trash-can"></i></a></td>
                                </tr>
                                ';
                }
            }else{
                    echo '
                        <tr>
                            <td colspan="4">Không Có " Màu Sắc " Được Thêm</td>
                        </tr>
                    ';
                }
            
            ?>


        </table>

        <div class="action">
            <a href="index.php?act=them_mau_sac"><input type="button" value="Thêm Mới"></a>
        </div>
    </div>
</main>