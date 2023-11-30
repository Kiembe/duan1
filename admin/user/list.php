<main>
    <div class="container">
        <h5>Danh Sách Tài Khoản</h5>
        <table class="board board_user">
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên Đăng Nhập</th>
                <th>Email</th>
                <th>Mật Khẩu</th>
                <th>Role</th>
                <th>Phân Quyền</th>
            </tr>
            <?php
            $i = 0  ;
            if ($listUser != null) {
                foreach ($listUser as $user) {
                    $i++;
                    extract($user);
                    $update = "index.php?act=update_role&id=" . $id;
                    if($role == 1){
                        $r = 'Quản Trị Viên';
                    }else{
                        $r = 'Người Dùng';
                    }
                    echo '
                                    <tr>
                                        <td>' . $i . '</td>
                                        <td>' . $id . '</td>
                                        <td>' . $name . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $password . '</td>
                                        <td>'.$r.'</td>
                                        <td><a href="' . $update . '"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                    </tr>
                                    ';
                }
            } else {
                echo '
                        <tr>
                            <td colspan="4">Không Có " Bộ Nhớ " Được Thêm</td>
                        </tr>
                    ';
            }

            ?>

        </table>
        <div class="action">
        </div>
    </div>
</main>