<footer class="footer">
    <div class="grid wide footer__content">
        <div class="row">
            <div class="col l-2-4 m-4 c-6">
                <h class="footer__heading">Chăm sóc khách hàng</h>
                <ul class="footer__list">
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Trung tâm trợ giúp</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">TN-Shop Mall</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Hướng dẫn mua hàng</a>
                    </li>

                </ul>
            </div>
            <div class="col l-2-4 m-4 c-6">
                <h class="footer__heading">Giới thiệu </h>

                <ul class="footer__list">
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Giới thiệu</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Tuyển dụng</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Điều khoản</a>
                    </li>
                </ul>
            </div>
            <div class="col l-2-4 m-4 c-6">
                <h class="footer__heading">Danh mục</h>
                <ul class="footer__list">
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Sách giáo khoa </a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Sách khoa học</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Truyện, tiểu thuyết</a>
                    </li>
                </ul>
            </div>
            <div class="col l-2-4 m-4 c-6">
                <h class="footer__heading">Theo dõi chúng tôi</h>
                <ul class="footer__list">
                    <li class="footer-item">
                        <a href="" class="footer-item__link">
                            <i class=" footer-item__icon fa-brands fa-facebook"></i> Facebook
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">
                            <i class=" footer-item__icon fa-brands fa-instagram"></i> Instagraml
                        </a>
                    </li>

                    <li class="footer-item">
                        <a href="" class="footer-item__link">
                            <i class=" footer-item__icon fa-brands fa-linkedin"></i> LinkedIn
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col l-2-4 m-8 c-12">
                <h class="footer__heading">Vào cửa hàng trên ứng dụng</h>
                <div class="footer__download">
                    <img src="../public/assets/img/QR_code.png" alt="Download QR" class="footer__download-qr-img">
                    <div class="footer__download-apps">
                        <a href="" class="footer__download-app-link">
                            <img src="../public/assets/img/GooglePlay.png" alt="GooglePlay"
                                class="footer__download-app-img">
                        </a>
                        <a href="" class="footer__download-app-link">
                            <img src="../public/assets/img/Appstore.png" alt="Appstore"
                                class="footer__download-app-img">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="footer__bottom">
        <div class="grid wide">
            <p class="footer__text">© Website chỉ phục vụ cho
                mục đích học tập!</p>
        </div>
    </div>
</footer>
</div>

<!--Modal layout-->
<div class="modal">
    <div class="modal__overlay "></div>
    <div class="modal__body">
        <!--Register form-->
        <form action="" id="regis-form" method="POST" class="auth-form auth-form-register ">
            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng ký</h3>
                    <span class="auth-form__switch-btn auth-form__switch-btn auth-form__close-btn"><i
                            class="fa-solid fa-xmark"></i></span>
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input type="text" required class="auth-form__input email" placeholder="Nhập email của bạn">
                    </div>
                    <div class="auth-form__group">
                        <input type="password" required class="auth-form__input password"
                            placeholder="Nhập password của bạn">
                    </div>
                    <div class="auth-form__group">
                        <input type="password" required class="auth-form__input confirm-password"
                            placeholder="Nhập lại mật khẩu ">
                    </div>
                </div>

                <div class="auth-form__aside">
                    <p class="auth-form__policy-text">
                        Bằng việc đăng ký, bạn đã đồng ý với F8-Shop về
                        <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                        <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                    </p>
                </div>

                <div class="auth-form__controls">
                    <button class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
                    <input type="submit" value="ĐĂNG KÝ" class="auth-form__regis-btn btn btn--primary">
                </div>
            </div>

            <div class="auth-form__socials">
                <a href="https://facebook.com/"
                    class="btn auth-form__socials--facebook auth-form__socials-icon btn--size-s  btn--with-icon">
                    <i class="fa-brands fa-square-facebook"></i>
                    <span class="auth-form__socials-title">
                        Kết nối với Facebook
                    </span>
                </a>
                <a href="https://google.com/"
                    class="btn auth-form__socials--google auth-form__socials-icon  btn--size-s btn--with-icon">
                    <i class="fa-brands fa-google"></i>
                    <span class="auth-form__socials-title">
                        Kết nối với Google
                    </span>
                </a>
            </div>
        </form>

        <!--Login form-->

        <form action="../public/login.php" method="POST" class="auth-form auth-form-login">

            <div class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng nhập</h3>
                    <span class="auth-form__switch-btn auth-form__close-btn"><i class="fa-solid fa-xmark"></i></span>
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input type="email" required class="auth-form__input" name="form__input-email"
                            placeholder="Nhập email của bạn">
                    </div>
                    <div class="auth-form__group">
                        <input type="password" required class="auth-form__input" name="form__input-pass"
                            placeholder="Nhập mật khẩu của bạn">
                    </div>

                </div>


                <div class="auth-form__aside">
                    <div class="auth-form__help">
                        <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                        <span class="auth-form__help-separate"></span>
                        <a href="" class="auth-form__help-link">Cần trợ giúp ?</a>
                    </div>
                </div>

                <div class="auth-form__controls">
                    <button class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
                    <input type="submit" value="ĐĂNG NHẬP" name="login-btn"
                        class="auth-form__login-btn btn btn--primary">
                </div>
            </div>

            <div class="auth-form__socials">
                <a href="https://www.facebook.com/"
                    class="btn auth-form__socials--facebook auth-form__socials-icon btn--size-s  btn--with-icon">
                    <i class="fa-brands fa-square-facebook"></i>
                    <span class="auth-form__socials-title">
                        Kết nối với Facebook
                    </span>
                </a>
                <a href="https://www.google.com/"
                    class="btn auth-form__socials--google auth-form__socials-icon  btn--size-s btn--with-icon">
                    <i class="fa-brands fa-google"></i>
                    <span class="auth-form__socials-title">
                        Kết nối với Google
                    </span>
                </a>
            </div>
        </form>

    </div>
</div>







<script src="/public/assets/js/main.js"></script>
<script src="/public/assets/js/viewcart.js"></script>
</body>




</html>