<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">

            <aside class="profile-info col-lg-9">
                <section ion class="panel">
                    <?= view('message/message') ?>

                    <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal" action="admin/category/create" method="post">
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Category Name</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=old('category_name') ?>" name="category_name" class="form-control" id="category_name" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Slug</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=old('category_slug') ?>" name="category_slug" class="form-control" id="category_slug" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Mo ta</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=old('category_desc') ?>" name="category_desc" class="form-control" id="category_desc" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Trang thai</label>
                                <div class="col-lg-6">
                                    <select name="category_status" class="form-control input-lg m-bot15">
                                        <option value="1">Hien</option>
                                        <option value="0">An</option>
                                    </select>
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