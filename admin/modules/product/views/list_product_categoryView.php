<?php get_head() ?>
<!-- START : Left sidebar -->
<?php get_sidebar(); ?>
<!-- END : Left sidebar -->
</li>
</ul>
</div>
</nav>
<div id="page-wrapper" class="gray-bg">
    <!-- BEGIN HEADER -->
    <?php get_header() ?>
    <!-- END HEADER -->
    <div style="clear: both; height: 61px;"></div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget style1 navy-bg">
                            <div class="row">
                                <h2 class="font-bold text-center text-uppercase">Quản lý danh mục sản phẩm</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inqbox float-e-margins">
                    <div class="inqbox-title border-top-danger">
                        <h5>Danh sách </h5>
                        <div class="inqbox-tools">
                            <a data-toggle="modal" data-target="#productCategoryModal">
                                <i class="fa fa-plus text-navy"></i>
                            </a>
                            <!-- modal product category -->
                            <div class="modal inmodal" id="productCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Tạo danh mục sản phẩm</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form  id="form_category" class="kform" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="text" name="id_business" value="<?php
                                                        if(isset($get_user['id_business'])) echo $get_user['id_business'];
                                                    ?>" placeholder="id_business" class="form-control" required>
                                                </div>

                                                <div class="form-group"> <input type="text" placeholder="Tên danh mục" name="category_title" class="form-control" required></div>

                                                <div class="section">
                                                    <label class="field prepend-icon append-button file border-none">
                                                        <span class="button">Choose File</span>
                                                        <input type="file" class="gui-file" name="category_icon" id="file1" onChange="document.getElementById('uploader1').value = this.value;">
                                                        <input type="text" class="gui-input" id="uploader1" placeholder="Please Select A File">
                                                        <label class="field-icon">
                                                            <i class="fa fa-upload"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <p class="text-center text-danger alert">
                                                    <small></small>
                                                </p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" name="btn_submit" class="btn btn-primary text-light">Thêm</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal product category -->

                        </div>
                    </div>
                    <div class="inqbox-content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Icon</th>
                                    <th>Tiêu đề</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (isset($list_product_category)) {
                                    $stt = 0;
                                    foreach ($list_product_category as $category) {
                                        $stt++;
                                ?>
                                        <tr>
                                            <td><?php echo $stt; ?></td>
                                            <td class="w-100px product-cat-img" data-img="<?php echo $stt; ?>"><img class="w-30 cursor-pointer" src="<?php echo '../' . $category['category_icon']; ?>" alt=""></td>
                                            <td class="product-cat-title"><?php echo $category['category_title']; ?></td>
                                            <td class="text-navy text-center">
                                                <a href="?mod=product&controller=list_product_category&action=update">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                |
                                                <a href="?mod=product&controller=list_product_category&action=delete">
                                                    <i class="fa fa-times"></i>
                                                </a>
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
            <style>
                .product-cat-icon-show {
                    min-height: 350px;
                }

                .product-cat-icon-show img {
                    width: 100%;
                }
            </style>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info panel-product-cat ">
                            <div class="widget panel-heading product-cat-text-show">
                                <h2 class="text-center font-bold">Tiêu đề danh mục</h2>
                            </div>
                            <div class="inqbox-title border-top-danger panel-body  product-cat-icon-show">
                                <img src="" alt="">
                                <p class="text-mute text-center">Nhấn vào hình ảnh để xem chi tiết</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>
  