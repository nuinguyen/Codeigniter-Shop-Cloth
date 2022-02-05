
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
                    <th>id Product</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Category</th>
                    <th>Product Status</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($product as $pro) : ?>
                    <tr>
                        <td><?= $pro['product_id'] ?></td>
                        <td class="p-name">
                        <img src="uploads/product/<?= $pro['product_image'] ?>" height="100" width="100">
                        </td>
                        <td class="p-team">
                            <?= $pro['product_name'] ?>
                        </td>
                        <td class="p-team">
                            <?= $pro['product_price'] ?>
                        </td>
                        <td class="p-team">
                            <?= $pro['category_name'] ?>
                        </td>
                        <td>
                            <?php
                            if($pro['product_status']==1){
                                echo' <span class="label label-primary">Active</span>';
                            }else
                                echo ' <span class="label label-default">Inactive</span>';
                            ?>
                        </td>
                        <td>
                            <a href="project_details.html" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="admin/product/edit/<?= $pro['product_id'] ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="admin/product/delete/<?= $pro['product_id'] ?>"  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <!-- page end-->
    </section>
</section>