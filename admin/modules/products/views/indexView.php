<?php
get_header();
?>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php require 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
                    <a href="?mod=products&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Mô Tả</span></td>
                                    <td><span class="thead-text">Giá</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($list_products)) {
                                    $t = 0;
                                    foreach ($list_products as $products) {
                                        $t++;
                                ?>
                                <tr>
                                    <td><span class="tbody-text"><?php echo $t ?></h3></span>
                                    <td><span class="tbody-text"><?php echo $products['code'] ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $products['thumb'] ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title=""><?php echo $products['title'] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="<?php echo '?mod=products&action=edit&id=' . $products['_id'] ?>"
                                                    title="Sửa" class="edit"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="<?php echo '?mod=products&action=delete&id=' . $products['_id'] ?>
" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $products['content'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $products['price'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $products['cat_id'] ?></span></td>
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