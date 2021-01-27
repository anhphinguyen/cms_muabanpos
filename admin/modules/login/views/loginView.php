


<!--  -->
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>InQ - A Responsive Bootstrap 3 Admin Login</title>
      <link href="public/css/bootstrap.min.css" rel="stylesheet">
      <link href="public/font-awesome/css/font-awesome.css" rel="stylesheet">
      <link href="public/css/animate.css" rel="stylesheet">
      <link href="public/css/style.css" rel="stylesheet">
   </head>
   <body class="gray-bg">
      <div class="loginColumns animated fadeInDown">
         <div class="row">
            <div class="col-md-6">
               <h2 class="font-bold">Welcome to INQ</h2>
               <p>
                  Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
               </p>
               <p>
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
               </p>
               <p>
                  When an unknown printer took a galley of type and scrambled it to make a type specimen book.
               </p>
               <p>
                  <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
               </p>
            </div>
            <div class="col-md-6">
               <div class="inqbox-content">
                  <form class="m-t" role="form" method="post" >
                     <div class="form-group">
                        <input type="text" name="store_code" class="form-control" placeholder="Mã cửa hàng" required="">
                     </div>
                     <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required="">
                     </div>
                     <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required="">
                     </div>
                     <button type="submit" name="btn_login" class="btn btn-primary block full-width m-b">Đăng nhập</button>
                     
                     <p class="text-center text-danger">
                        <small><?php if(isset($error['login'])) echo $error['login'] ?></small>
                     </p>
                     
                  </form>
                  <p class="m-t">
                     <small>InQ we app framework base on Bootstrap 3 &copy; 2015</small>
                  </p>
               </div>
            </div>
         </div>
         <hr/>
         <div class="row">
            <div class="col-md-6">
               Copyright Your Company
            </div>
            <div class="col-md-6 text-right">
               <small>© 2015-2016</small>
            </div>
         </div>
      </div>
   </body>
</html>