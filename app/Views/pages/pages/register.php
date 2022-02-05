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
                            <a href="login"> <button class="button create-account" type="submit"><span>Login Account</span></button></a>
                        </div>
                    </div>
                </div>
                <div class="col-2 registered-users"><strong>KHÁCH HÀNG HAY ĐĂNG KÝ</strong>
                    <?= view('message/message') ?>
                    <form action="register" method="post">
                        <div class="content">
                            <p>Bạn hay dien day du thoong tin suoosng duoi day de co the đăng nhập.</p>
                            <ul class="form-list">
                                <li>
                                    <label >The Name <span class="required">*</span></label>
                                    <br>
                                    <input type="text" title="Email Address" class="input-text required-entry" id="user_name"  value="<?=old('user_name') ?>" name="user_name">
                                </li>
                                <li>
                                    <label >Email Address <span class="required">*</span></label>
                                    <br>
                                    <input type="text" title="Email Address" class="input-text required-entry" value="<?=old('user_email') ?>" id="user_email" name="user_email">
                                </li>
                                <li>
                                    <label for="pass">Password <span class="required">*</span></label>
                                    <br>
                                    <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" id="user_password" name="user_password">
                                </li>
                                <li>
                                    <label for="pass">Confign Password <span class="required">*</span></label>
                                    <br>
                                    <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" id="user_cf_password" name="user_cf_password">
                                </li>
                            </ul>
                            <p class="required">* Required Fields</p>
                            <div class="buttons-set">
                                <button   type="submit" class=" login"><span>Register</span></button>
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
