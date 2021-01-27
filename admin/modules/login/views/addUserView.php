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
                    <style>
                        #username {
                            cursor: text;
                            background: none;
                        }
                    </style>
                    <form method="POST">
                        <p style="text-align: left; color: green"><?php if (isset($success)) echo $success ?></p>
                        <p style="text-align: left; color: red"><?php if(isset($error['isseted'])) echo $error['isseted'] ?></p>
                        
                        <label for="fullname">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" value="<?php set_value('fullname') ?>">
                        <p style="text-align: left; color: red"><?php if (isset($error['fullname'])) echo $error['fullname'] ?></p>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" value="<?php set_value('username') ?>">
                        <p style="text-align: left; color: red"><?php if (isset($error['username'])) echo $error['username'] ?></p>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php set_value('email') ?>">
                        <p style="text-align: left; color: red"><?php if (isset($error['email'])) echo $error['email'] ?></p>
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" >
                        <p style="text-align: left; color: red"><?php if (isset($error['password'])) echo $error['password'] ?></p>
                        <label for="gender">Chọn giới tính</label>
                        <select name="gender" id="gender">
                            <!-- <option value="">Chọn giới tính</option> -->
                            <option value="male" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'male') echo "selected='selected';"  ?>>Nam</option>
                            <option value="female" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'female') echo "selected='selected';"  ?>>Nữ</option>
                        </select>

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