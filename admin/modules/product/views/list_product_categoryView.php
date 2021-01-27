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
                            <a href="?mod=product&controller=list_product_category&action=create">
                                <i class="fa fa-plus text-navy"></i>
                            </a>
                            <!-- <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a> -->
                            <!-- <a href="?mod=product&controller=list_product_category&action=update">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="?mod=product&controller=list_product_category&action=delete">
                                <i class="fa fa-times"></i>
                            </a> -->
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
                                            <td class="w-100px product-cat-img" data-img="<?php echo $stt; ?>"><img class="w-30 cursor-pointer" src="<?php echo '../'.$category['category_icon']; ?>" alt=""></td>
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
                .panel-product-cat{
                    display: none;
                }
                .product-cat-icon-show{
                    min-height: 400px;
                }
                .product-cat-icon-show img{
                    width: 100%;
                }
            </style>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info panel-product-cat ">
                            <div class="widget panel-heading product-cat-text-show">
                                <h2 class="text-center font-bold"></h2>
                            </div>
                            <div class="panel-body product-cat-icon-show">
                               <img src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>

