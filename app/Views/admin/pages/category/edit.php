<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">

            <aside class="profile-info col-lg-9">
                <section ion class="panel">
                    <?= view('message/message') ?>

                    <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal" action="admin/category/update" method="post">

                            <input type="hidden"  value="<?= $category['category_id'] ?>" name="category_id">

                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?= $category['category_name'] ?>" name="category_name" id="category_name" class="form-control" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?= $category['category_desc'] ?>" name="category_desc" id="category_desc" class="form-control" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Trang thai</label>
                                <div class="col-lg-6">
                                    <select name="category_status" class="form-control input-lg m-bot15">
                                        <?php
                                        if($category['category_status']==1){
                                            echo '<option selected value="1">Hien</option>';
                                            echo '<option value="0">An</option>';
                                        }else{
                                            echo '<option  value="1">Hien</option>';
                                            echo '<option selected value="0">An</optionselected>';
                                        }
                                        ?>
                                    </select>
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