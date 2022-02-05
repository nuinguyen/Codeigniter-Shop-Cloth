<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">

            <aside class="profile-info col-lg-9">
                <section ion class="panel">
                    <?= view('message/message') ?>

                    <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal" action="admin/user/update" method="post">

                            <input type="hidden"  value="<?= $admin['admin_id'] ?>" name="admin_id" id="admin_id" class="form-control" placeholder=" " >

                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?= $admin['admin_name'] ?>" name="admin_name" id="admin_name" class="form-control" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?= $admin['admin_email'] ?>" name="admin_email" id="admin_email" class="form-control" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-6">
                                    <input type="text" name="admin_password" class="form-control" id="admin_password" placeholder=" " readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Cf Password</label>
                                <div class="col-lg-6">
                                    <input type="password"  name="admin_cf_password" id="admin_cf_password" class="form-control" placeholder=" " readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label"></label>
                                <div class="col-lg-6">
                            <label class="checkbox">
                                <input type="checkbox" name="change_password" id="change-password" value="remember-me"> Remember me
                            </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" id="save-edit-user" class="btn btn-success">Save</button>
                                    <button type="reset" id="reset-edit-user" class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

            </aside>
        </div>

        <!-- page end-->
    </section>
</section>