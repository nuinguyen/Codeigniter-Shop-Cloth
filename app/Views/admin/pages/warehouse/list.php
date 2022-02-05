
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
                <thead >
                <tr>
                    <th>STT</th>
                    <th>ANH</th>
                    <th>Ten SP</th>
                    <th>Sl Ton</th>
                    <th>Sl Nhap</th>
                    <th> SL Nhap Ve</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($warehouse as $key => $item) : ?>
                    <tr>
                        <td>
                            <?= $key+1 ?>
                        </td>
                        <td class="p-name">
                            <?= $item['product_name'] ?>
                        </td>
                        <td class="p-team">
                            <?= $item['product_name'] ?>
                        </td>
                        <td class="p-team">
                            <?= $item['warehouse_inventory'] ?>
                        </td>
                        <td class="p-team">
                            <?=$item['warehouse_import']?>
                        </td>
                        <?php foreach ($import as $key => $item_import) : ?>
                            <?php
                                if($item['product_id']==$item_import['product_id']){
                                    echo '<td class="p-team">'.$item_import['import_amount'].' </td>';
                                }
                            ?>
                        <?php endforeach; ?>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <!-- page end-->
    </section>
</section>