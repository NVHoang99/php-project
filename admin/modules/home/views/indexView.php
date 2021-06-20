<?php
get_header();
?>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php require 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách User</h3>
                    <a href="?mod=home&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Công khai</option>
                                <option value="1">Chờ duyệt</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">usersname</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">email</span></td>
                                    <td><span class="thead-text">tuổi</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Giới Tính</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Quyền</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($list_users)) {
                                    $t = $start;
                                    foreach ($list_users as $users) {
                                        $t++;
                                        ?>
                                        <tr>
                                            <td><span class="tbody-text"><?php echo $t ?></h3></span>
                                            <td><span class="tbody-text"><?php echo $users['username'] ?></h3></span>
                                            <td>
                                                <div class="tb-title fl-left">
                                                    <a href="<?php echo '?mod=home&action=edit&id=' . $users['user_id'] ?>" title=""><?php echo $users['fullname'] ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="<?php echo '?mod=home&action=edit&id=' . $users['user_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo '?mod=home&action=delete&id=' . $users['user_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $users['email'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $users['age'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $users['phone_number'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo show_gender($users['gender']) ?></span></td>
                                            <td><span class="tbody-text"><?php echo $users['address'] ?></span></td>
                                            <td><a href="<?php echo '?mod=home&action=edit&id=' . $users['user_id'] ?>" title="" class="tbody-text"><?php echo show_role($users['role']) ?></a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
?>