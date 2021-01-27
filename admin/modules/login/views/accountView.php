<?php
get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&controller=account&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="?mod=users&controller=account&action=change" title="">Đổi mật khẩu</a>
                </li>
                <li>
                    <a href="?mod=post&controller=index" title="">Thoát</a>
                </li>
            </ul>
        </div>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <p style="text-align: left; color: green"><?php if (isset($success)) echo $success ?></p>
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="display-name" id="display-name" value="<?php set_value('display_name') ?>">
                        <p style="text-align: left; color: red"><?php if (isset($error['display-name'])) echo $error['display-name'] ?></p>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="<?php if (isset($_SESSION['user_login'])) echo $_SESSION['user_login']; ?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php set_value('email') ?>">
                        <p style="text-align: left; color: red"><?php if (isset($error['email'])) echo $error['email'] ?></p>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php set_value('tel') ?>">
                        <p style="text-align: left; color: red"><?php if (isset($error['tel'])) echo $error['tel'] ?></p>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"></textarea>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>