<?php
require_once '../../includes/header.php';
if ($user) {
    new Redirect($_DOMAIN); // Trở về trang chủ
    die();
}
?>

<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="<?php echo $_DOMAIN; ?>/assets/images/data-quality-monitoring-min.webp" alt="Logo" style="height: 100%;width: 100%;">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Welcome to Engineer SMD Team</h1>
                        <p class="account-subtitle">Cần một tài khoản? <a href="<?php echo $_DOMAIN; ?>pages/authentication/register.php">Đăng ký</a></p>
                        <h2>Đăng nhập</h2>


                        <div class="form-group">
                            <label>ID nhân viên <span class="login-danger">*</span></label>
                            <input class="form-control" type="text" id="user_signin" value="<?php if (isset($_COOKIE['userems'])) echo $_COOKIE['userems']; ?>">
                            <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu <span class="login-danger">*</span></label>
                            <input class="form-control pass-input" type="password" id="pass_signin" value="<?php if (isset($_COOKIE['passems'])) echo $_COOKIE['passems']; ?>">
                            <span class="profile-views feather-eye toggle-password"></span>
                        </div>
                        <div class="forgotpass">
                            <div class="remember-me">
                                <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Ghi nhớ mật khẩu
                                    <input type="checkbox" name="radio" id="checkLogin" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <a href="<?php echo $_DOMAIN; ?>pages/authentication/forgot-password.php">Quên mật khẩu?</a>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="button" id="signin">Login</button>
                        </div>

                        <div class="alert alert-danger hidden"></div>
                        <!-- <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <div class="social-login">
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Đăng nhập

    var login = function() {

        // Gán các giá trị trong các biến
        $user_signin = $('#user_signin').val();
        $pass_signin = $('#pass_signin').val();
        $check_box = $('#checkLogin').is(':checked');

        // Nếu các giá trị rỗng
        if ($user_signin == '' || $pass_signin == '') {
            $('.alert').removeClass('hidden');
            $('.alert').html('Vui lòng điền đầy đủ thông tin.');
        }
        // Ngược lại
        else {
            $.ajax({
                url: '../../php/authentication.php',
                type: 'POST',
                data: {
                    user_signin: $user_signin,
                    pass_signin: $pass_signin,
                    check_box: $check_box,
                    action: 'login'
                },
                success: function(data) {
                    $('.alert').removeClass('hidden');
                    $('.alert').html(data);
                },
                error: function() {
                    $('.alert').removeClass('hidden');
                    $('.alert').html('Không thể đăng nhập vào lúc này, hãy thử lại sau.');
                }
            });
        }
    }


    $('#signin').on('click', login);
    $('#pass_signin').keypress(function() {
        if ((event.keyCode ? event.keyCode : event.which) == '13') login();
    });
</script>
<?php
require_once '../../includes/footer.php';
?>