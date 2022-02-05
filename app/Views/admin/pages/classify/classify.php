<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">

            <aside class="profile-info col-lg-6">
                <section class="panel">
                    <?= view('message/message') ?>
                    <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form class="form-horizontal" action="<?=isset($classify_edit)?"admin/classify/update/9".$classify_edit['classify_id']:"admin/classify/create" ?>" method="post">
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Size</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($classify_edit)?$classify_edit['classify_type']:"" ?>" name="classify_type" class="form-control" id="classify_type" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Gia tri</label>
                                <div class="col-lg-6">
                                    <input type="text" value="<?=isset($classify_edit)?$classify_edit['classify_value']:"" ?>" name="classify_value" class="form-control" id="classify_value" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-success"><?=isset($classify_edit)?"Update":"Save" ?></button>
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
                        <th>id Name</th>
                        <th>Project Name</th>
                        <th>Team Member</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($classify as $class) : ?>
                        <tr>
                            <td><?= $class['classify_id'] ?></td>
                            <td class="p-name">
                                <a href="project_details.html"><?= $class['classify_type'] ?></a>
                            </td>
                            <td class="p-team">
                                <?= $class['classify_value'] ?>
                            </td>
                            <td>
                                <a href="project_details.html" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="admin/classify/edit/<?= $class['classify_id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="admin/classify/delete/<?= $class['classify_id'] ?>"  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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