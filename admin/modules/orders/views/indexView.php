<?php
get_header();
?>

<div id="main-content-wp" class="list-order-page">
    <div class="wrap clearfix">
        <?php require 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                    <a href="?mod=orders&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Order Number</span></td>
                                    <td><span class="thead-text">Username</span></td>
                                    <td><span class="thead-text">Subtotal</span></td>
                                    <td><span class="thead-text">Status</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($results)) {
                                    $t = 0;
                                    foreach ($results as $result) {
                                        $t++;
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $t; ?></h3></span></td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $result->get('OrderNumber') ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li>
                                                <a href="<?php echo '?mod=orders&action=edit&id=' . $result->get('OrderNumber') ?>"
                                                    title="Sửa" class="edit"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo '?mod=orders&action=delete&id=' . $result->get('OrderNumber') ?>"
                                                    title="Xóa" class="delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    <td>
                                        <span class="tbody-text"><?php echo $result->get('Username') ?></span>
                                    </td>

                                    <td><span class="tbody-text"><?php echo $result->get('Subtotal') ?></span>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $result->get('Status') ?></span>
                                    </td>
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
                </div>
            </div>
        </div>
    </div>
</div>



<?php
get_footer();
?>