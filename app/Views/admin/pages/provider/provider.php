<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">

            <aside class="profile-info col-lg-6">
                <section class="panel">
                    <?= view('message/message') ?>
                    <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal" action="<?=isset($provider_edit)?"admin/provider/update/".$provider_edit['provider_id']:"admin/provider/create" ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Ten</label>
                                <div class="col-lg-6">
                                    <input type="text" onkeyup="ChangeToSlug();" value="<?=isset($provider_edit)?$provider_edit['provider_name']:"" ?>" name="provider_name" class="form-control" id="slug" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Slug</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($provider_edit)?$provider_edit['provider_slug']:"" ?>" name="provider_slug" class="form-control" id="convert_slug" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Code</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($provider_edit)?$provider_edit['provider_code']:"" ?>" name="provider_code" class="form-control" id="provider_code" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Eamil</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($provider_edit)?$provider_edit['provider_email']:"" ?>" name="provider_email" class="form-control" id="provider_email" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Phone</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($provider_edit)?$provider_edit['provider_phone']:"" ?>" name="provider_phone" class="form-control" id="provider_phone" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Address</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($provider_edit)?$provider_edit['provider_address']:"" ?>" name="provider_address" class="form-control" id="provider_address" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Anh San Xuat</label>
                                <div class="col-lg-6">
                                    <input type="file" name="provider_image" class="form-control" id="provider_image" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-3 control-label"></label>
                                <div class="col-lg-6 image_provider">
                                    <?php if(isset($provider_edit))
                                        echo '<img src="uploads/provider/'.$provider_edit['provider_image'].'" alt="" height="100" width="100" class="img-thumbnail">';
                                    ;?>
                                </div>
                                </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-success"><?=isset($provider_edit)?"Update":"Save" ?></button>
                                    <button type="reset" class="btn btn-default cancel_provider">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </aside>
            <aside class="profile-info col-lg-6">
                <table class="table table-hover p-table">
                    <thead>
                    <tr>
                        <th>id Provider</th>
                        <th>Provider Name(CODE)</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($provider as $item) : ?>
                        <tr>
                            <td><?= $item['provider_id'] ?></td>
                            <td class="p-name">
                                <a href="project_details.html"><?= $item['provider_name'] ?>-<?= $item['provider_code'] ?></a>
                            </td>
                            <td class="p-team">
                                <img src="uploads/provider/<?= $item['provider_image'] ?>" height="100" width="100">
                            </td>
                            <td><?= $item['provider_email'] ?></td>
                            <td><?= $item['provider_phone'] ?></td>
                            <td><?= $item['provider_address'] ?></td>

                            <td>
                                <a href="project_details.html" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="admin/provider/edit/<?= $item['provider_id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="admin/provider/delete/<?= $item['provider_id'] ?>"  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </aside>
        </div>

        <!-- page end-->
    </section>
</section>