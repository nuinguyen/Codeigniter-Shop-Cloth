<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">

            <aside class="profile-info col-lg-6">
                <section class="panel">
                    <?= view('message/message') ?>
                    <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal" action="<?=isset($producer_edit)?"admin/producer/update/".$producer_edit['producer_id']:"admin/producer/create" ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Ten</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($producer_edit)?$producer_edit['producer_name']:"" ?>" name="producer_name" class="form-control" id="producer_name" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Slug</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($producer_edit)?$producer_edit['producer_slug']:"" ?>" name="producer_slug" class="form-control" id="producer_slug" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Code</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($producer_edit)?$producer_edit['producer_code']:"" ?>" name="producer_code" class="form-control" id="producer_code" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Eamil</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($producer_edit)?$producer_edit['producer_email']:"" ?>" name="producer_email" class="form-control" id="producer_email" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Phone</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($producer_edit)?$producer_edit['producer_phone']:"" ?>" name="producer_phone" class="form-control" id="producer_phone" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Address</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($producer_edit)?$producer_edit['producer_address']:"" ?>" name="producer_address" class="form-control" id="producer_address" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Anh San Xuat</label>
                                <div class="col-lg-6">
                                    <input type="file"  name="producer_image" class="form-control" id="producer_image" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-success"><?=isset($producer_edit)?"Update":"Save" ?></button>
                                    <button type="reset" class="btn btn-default">Cancel</button>
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
                        <th>id Producer</th>
                        <th>Producer Name(CODE)</th>
                        <th>Image</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($producer as $pro) : ?>
                        <tr>
                            <td><?= $pro['producer_id'] ?></td>
                            <td class="p-name">
                                <a href="project_details.html"><?= $pro['producer_name'] ?>-<?= $pro['producer_code'] ?></a>
                            </td>
                            <td class="p-team">
                                <img src="uploads/producer/<?= $pro['producer_image'] ?>" height="100" width="100">
                            </td>
                            <td><?= $pro['producer_email'] ?></td>
                            <td><?= $pro['producer_phone'] ?></td>
                            <td><?= $pro['producer_address'] ?></td>

                            <td>
                                <a href="project_details.html" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="admin/producer/edit/<?= $pro['producer_id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="admin/producer/delete/<?= $pro['producer_id'] ?>"  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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