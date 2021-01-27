<?php
$role = getRolePermission($_SESSION['id_account']);
// show_array();
?>
<div class="nano left-sidebar">
    <div class="nano-content">
        <ul class="nav nav-pills nav-stacked nav-inq">
            <li class="active">
                <a href="index.html"><i class="fa fa-home"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <?php
            if (!empty($role)) {
                foreach ($role as $permission) {
            ?>
                    <?php
                    if ($permission['permission'] === 'module_product') {
                    ?>
                        <li class="nav-parent">
                            <a href="#"><img src="../images/manager/module_product.png" alt=""> <span class="nav-label"><?php echo $role[0]['description']?></span></a>
                            <ul class="children nav">
                                <li><a href="?mod=product&action=list_product_category">Danh mục sản phẩm</a></li>
                                <li><a href="?mod=product&action=list_product_product">Danh sách sản phẩm</a></li>
                                <li><a href="?mod=product&action=list_product_unit">Danh sách các đơn vị tính SP</a></li>
                                <li><a href="?mod=product&action=list_product_sold_out">Danh sách các SP hết bán</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($permission['permission'] === 'module_employee') {
                    ?>
                        <li class="nav-parent">
                            <a href="#"><img src="../images/manager/module_account.png" alt=""> <span class="nav-label"><?php echo $role[1]['description']?></span></a>
                            <ul class="children nav">
                                <li><a href="?mod=account&action=list_account_account">Danh sách tài khoản</a></li>
                                <li><a href="?mod=account&action=list_account_permission">Quản lý quyền hạn module</a></li>
                                <li><a href="?mod=account&action=list_account_type">Quản lý loại tài khoản</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($permission['permission'] === 'module_order') {
                    ?>
                        <li class="nav-parent">
                            <a href="#"><img src="../images/manager/module_order.png" alt=""> <span class="nav-label"><?php echo $role[2]['description']?></span></a>
                            <ul class="children nav">
                                <li><a href="?mod=order&action=list_order_eatin">Danh sách đơn tại bàn</a></li>
                                <li><a href="?mod=order&action=list_order_carryout">Danh sách đơn mang đi</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($permission['permission'] === 'module_customer') {
                    ?>
                        <li class="nav-parent">
                            <a href="#"><img src="../images/manager/module_customer.png" alt=""> <span class="nav-label"><?php echo $role[3]['description']?></span></a>
                            <ul class="children nav">
                                <li><a href="?mod=customer&action=list_customer_customer">Danh sách khách hàng</a></li>
                                <li><a href="?mod=customer&action=list_customer_level">Cấp độ khách hàng</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($permission['permission'] === 'module_floor') {
                    ?>
                        <li class="nav-parent">
                            <a href="#"><img src="../images/manager/module_floor.png" alt=""> <span class="nav-label"><?php echo $role[4]['description']?></span></a>
                            <ul class="children nav">
                                <li><a href="?mod=floor&action=list_floor">Danh sách tầng</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($permission['permission'] === 'module_force') {
                    ?>
                        <li>
                            <a href="#"><img src="../images/manager/module_force.png" alt=""> <span class="nav-label"><?php echo $role[5]['description']?></span></a>
                        </li>
                    <?php
                    }
                    ?>
            <?php
                }
            }
            ?>

        </ul>
    </div>
</div>