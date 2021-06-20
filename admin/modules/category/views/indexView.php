
<?php
get_header();
?>

<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php require 'layout/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=category&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
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
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Mô tả</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($list_categories)) {
                                    $t = 0;
                                    foreach ($list_categories as $categorie) {
                                        $t++;
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $t; ?></h3></span></td>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $categorie['name'] ?></a>
                                                </div> 
                                                <ul class="list-operation fl-right">
                                                    <li><a href="<?php echo '?mod=category&action=edit&id=' . $categorie['_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo '?mod=category&action=delete&name=' . $categorie['name'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="<?php echo $categorie['thumb'] ?>" alt="">
                                                </div>
                                            </td>

                                            <td><span class="tbody-text"><?php echo $categorie['desc'] ?></span></td>
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