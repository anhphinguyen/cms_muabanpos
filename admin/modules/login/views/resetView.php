<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khôi phục mật khẩu</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>

<body>

    <div id="wrapper">
        <h2>Khôi phục mật khẩu</h2>
        <form action="" method="post" id="form-login">

            <input type="email" name="email" id="email" placeholder=" Email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>">
            <p style="text-align: left; color: red"><?php if (isset($error['email'])) echo $error['email'] ?></p>

            <input type="submit" name="btn_reset" id="btn_reset" value="Gửi yêu cầu">
            <p style="text-align: left; color: red"><?php if (isset($error['reset'])) echo $error['reset'] ?></p>
            <p style="text-align: center; color: green"><?php if(isset($success)) echo $success ?></p>
        </form>
        <a href="?mod=users&controller=index&action=login" id="login">Đăng nhập</a>|
        <a href="?mod=users&controller=index&action=register" id="register">Đăng kí</a>
    </div>
</body>

</html>