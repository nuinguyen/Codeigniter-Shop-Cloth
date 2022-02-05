
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                All projects List
                <span class="pull-right">
                          <button type="button" id="loading-btn" class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> Refresh</button>
                          <a href="#" class=" btn btn-success btn-xs"> Create New Project</a>
                      </span>
            </header>
            <?= view('message/message') ?>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" placeholder="Search Here" class="input-sm form-control"> <span class="input-group-btn">
                              <button type="button" class="btn btn-sm btn-success"> Go!</button> </span>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover p-table">
                <thead>
                <tr>
                    <th>id Name</th>
                    <th>Project Name</th>
                    <th>Team Member</th>
                    <th>Project Status</th>
                    <th>Custom</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($category as $cate) : ?>
                    <tr>
                        <td><?= $cate['category_id'] ?></td>
                        <td class="p-name">
                            <a href="project_details.html"><?= $cate['category_name'] ?></a>
                        </td>
                        <td class="p-team">
                            <?= $cate['category_desc'] ?>
                        </td>
                        <td>
                            <?php
                            if($cate['category_status']==1){
                                echo' <span class="label label-primary">Active</span>';
                            }else
                                echo ' <span class="label label-default">Inactive</span>';
                            ?>

                        </td>
                        <td>
                            <a href="project_details.html" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="admin/category/edit/<?= $cate['category_id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="admin/category/delete/<?= $cate['category_id'] ?>"  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <!-- page end-->
    </section>
</section>