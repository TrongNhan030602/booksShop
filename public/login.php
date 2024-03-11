<?php
  require_once __DIR__ . '/../src/bootstrap.php';
  $pdo = connect_db();
  $user = new APP\user($pdo);
  // Handle Login
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] == 'signin') {
    $name = $_POST['username'];
    $password = $_POST['password'];
    $success = $user ->check_user_name($name,$password);
    if ($success == true){
      $_SESSION['user_name'] = $name;
      if ($user->check_admin($name)){header('location: admin.php');exit();}
      header('location: index.php');
      exit();
    }
    else {echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng.");</script>';}
  }
  // Handle Register
  else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] == 'signup') {
    $name = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $success = $user->add_user(username:$name, user_pass:$password, user_email:$email);
    if($success == 1){
      echo '<script>alert("Đăng ký thành công.");</script>';
    }
    else if($success == -1) { echo '<script>alert("Email đã bị trùng.");</script>';} 
    else if($success == 0) { echo '<script>alert("User name đã bị trùng.");</script>';} 
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TN - shop</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/login.css" />
    <link rel="icon" href="./assets/img/books.png" type="image/x-icon">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!-- Login Form -->
          <form action="" class="sign-in-form" method="post">
            <h2 class="title">Đăng nhập</h2>
            <input type="text" value="signin" style="display: none;" name="action">
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" required placeholder="Tên đăng nhập" name="username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" required placeholder="Mật khẩu" name="password" required/>
            </div>
            <button type="submit" value="Sign in" class="btn solid">Đăng nhập</button>

            <p class="social-text">Hoặc có thể đăng nhập bằng</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>

          <!-- Register Form -->
          <form action="" class="sign-up-form" method="post">
            <h2 class="title">Đăng ký</h2>
            <input type="text" value="signup" style="display: none;" name="action">
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" required placeholder="Tên đăng nhập" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" required placeholder="Email"  name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" required placeholder="Mật khẩu" name="password"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="confirmPassword" required placeholder="Lập lại mật khẩu" />
            </div>
            <button type="submit" value="Sign Up" class="btn solid">Đăng ký</button>


            <p class="social-text">Hoặc có thể đăng ký bằng các tài khoản</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
      <div class="panels-container">

        <div class="panel left-panel">
            <div class="content">
                <h3>Chưa có tài khoản</h3>
                <p>Đăng ký tài khoản mới để có thể mua hàng tại TN-shop.</p>
                <button class="btn transparent" id="sign-up-btn">Đăng ký</button>
            </div>
            <img src="./assets/img/log.svg" class="image" alt="">
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h3>Bạn đã có tài khoản</h3>
                <p>Đăng nhập để có thể sử dụng các tính năng của TN-shop</p>
                <button class="btn transparent" id="sign-in-btn">Đăng nhập</button>
            </div>
            <img src="./assets/img/register.svg" class="image" alt="">
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./assets/js/loginRegis.js"></script>
  </body>
</html>
