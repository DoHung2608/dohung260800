    <div class="wait overlay">
        <div class="loader"></div>
    </div>
    <style>
        .input-borders {
            border-radius: 30px;
        }
    </style>
    <!-- row -->

    <div class="container-fluid">



        <!-- /Billing Details -->

        <form id="signup_form" onsubmit="return false" class="login100-form">
            <div class="billing-details jumbotron">
                <div class="section-title">
                    <h2 class="login100-form-title p-b-49">Đăng ký</h2>
                </div>
                <div class="form-group ">

                    <input class="input form-control input-borders" type="text" name="f_name" id="f_name" placeholder="Tên">
                </div>
                <div class="form-group">

                    <input class="input form-control input-borders" type="text" name="l_name" id="l_name" placeholder="Họ">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="password" name="password" id="password" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="password" name="repassword" id="repassword" placeholder="Xác nhận lại mật khẩu">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="mobile" id="mobile" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="address1" id="address1" placeholder="Địa chỉ">
                </div>
                <div class="form-group">
                    <input class="input form-control input-borders" type="text" name="address2" id="address2" placeholder="Thành phố">
                </div>


                <div style="form-group">
                    <input class="primary-btn btn-block" value="Đăng ký" type="submit" name="signup_button">
                </div>
                <div class="text-pad">
                    <a href="" data-toggle="modal" data-target="#Modal_login">Bạn đã có tài khoản chưa?</a>

                </div>


        </form>
        <div class="login-marg">
            <!-- Billing Details -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" id="signup_msg">


                </div>
                <!--Alert from signup form-->
            </div>
            <div class="col-md-2"></div>
        </div>


    </div>
    </div>



    <!-- /row -->