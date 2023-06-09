<?php
require_once "include/head.php";
?>


<body>

<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('<?=SITE_URL?>templates/default/assets/img/auth/login-bg.jpeg')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="index.html"><img src="<?=SITE_URL?>templates/default/assets/imgs/smlt_logo_blue_ru.png" width="250px" style="margin-left: -75px"></a>
                    </div>
                    <div>
                        Логин: root
                        <br>
                        Пароль: root
                    </div>
                    <br>
                    <form method="post" action="/login">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Логин" required="">
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Пароль" required="">
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="row">
                            <div class="col text-left">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                    <span class="custom-control-label">&nbsp;Запомнить меня</span>
                                </label>
                            </div>
                            <div class="col text-right">
                                <a href="#">Забыли пароль?</a>
                            </div>
                        </div>

                        <?php if(isset($_GET['error'])): ?>
                        <div style="color: red">
                            <?= $_GET['error'] ?>
                        </div>
                        <?php endif; ?>

                        <div class="sign-btn text-center">
                            <button class="btn btn-primary" style="width: 120px; height: 50px; font-size: 20px; padding-top: 10px">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once "include/footer.php";
?>
