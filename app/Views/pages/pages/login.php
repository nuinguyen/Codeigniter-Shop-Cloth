<section class="main-container col1-layout">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>Login or Create an Account</h2>
            </div>
            <fieldset class="col2-set">
                <legend>Login or Create an Account</legend>
                <div class="col-1 new-users"><strong>New Customers</strong>
                    <div class="content">
                        <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                        <div class="buttons-set">
                            <a href="register"><button class="button create-account" type="submit"><span>Create an Account </span></button></a>
                        </div>
                    </div>
                </div>
                <div class="col-2 registered-users"><strong>KHÁCH HÀNG ĐÃ ĐĂNG KÝ</strong>
                    <?= view('message/message') ?>
                    <form action="login" method="post">
                    <div class="content">
                        <p>Nếu bạn có tài khoản với chúng tôi, vui lòng đăng nhập.</p>
                        <ul class="form-list">
                            <li>
                                <label >Email Address <span class="required">*</span></label>
                                <br>
                                <input type="text" title="Email Address" class="input-text required-entry"  value="" name="user_email">
                            </li>
                            <li>
                                <label for="pass">Password <span class="required">*</span></label>
                                <br>
                                <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="user_password">
                            </li>
                        </ul>
                        <p class="required">* Required Fields</p>
                        <div class="buttons-set">
                            <button   type="submit" class=" login"><span>Login</span></button>
                            <a class="forgot-word" href="http://demo.magentomagik.com/computerstore/customer/account/forgotpassword/">Forgot Your Password?</a> </div>
                    </div>
                    </form>
                </div>
            </fieldset>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</section>
