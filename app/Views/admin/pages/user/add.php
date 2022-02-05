<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">

            <aside class="profile-info col-lg-9">
                <section ion class="panel">
                    <?= view('message/message') ?>

                    <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal" action="admin/user/create" method="post">


<!--                            <div class="form-group">-->
<!--                                <label  class="col-lg-2 control-label">Last Name</label>-->
<!--                                <div class="col-lg-6">-->
<!--                                    <input type="text" class="form-control" id="l-name" placeholder=" ">-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="form-group">-->
<!--                                <label  class="col-lg-2 control-label">Birthday</label>-->
<!--                                <div class="col-lg-6">-->
<!--                                    <input type="text" class="form-control" id="b-day" placeholder=" ">-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=old('admin_name') ?>" name="admin_name" class="form-control" id="f-name" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=old('admin_email') ?>" name="admin_email" class="form-control" id="email" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=old('admin_password') ?>" name="admin_password" class="form-control" id="p" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Cf Password</label>
                                <div class="col-lg-6">
                                    <input type="password" value="<?=old('admin_cf_password') ?>" name="admin_cf_password" class="form-control" id="mobile" placeholder=" ">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
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