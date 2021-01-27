<?php
get_header();
?>
<div id="main-content-wp" class="change-pass-page">
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
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass-old" id="pass-old">
                        <p style="text-align: left; color: red"><?php if (isset($error['pass-old'])) echo $error['pass-old'] ?></p>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass-new" id="pass-new">
                        <p style="text-align: left; color: red"><?php if (isset($error['pass-new'])) echo $error['pass-new'] ?></p>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm-pass" id="confirm-pass">
                        <p style="text-align: left; color: red"><?php if (isset($error['confirm-pass'])) echo $error['confirm-pass'] ?></p>
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