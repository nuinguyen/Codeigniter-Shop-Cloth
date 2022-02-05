
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
                    <th>ID IMPORT</th>
                    <th>NHa Cung Cap</th>
                    <th>Trang Thai</th>
                    <th>Ngay Nhap</th>
                    <th>So SP</th>
                    <th>Tong So Luong</th>
                    <th>Tong Tien</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($import as $item) : ?>
                    <tr>
                        <td>
                            <?= $item['import_id'] ?>
                        </td>
                        <td class="p-name">
                            <?= $item['provider_id'] ?>
                        </td>
                        <td class="p-team">
                            <?php
                            if($item['import_status']==0){
                                echo'<label class="label label-inverse"">Chua Nhap</label>';
                            }else{
                                echo'<label class="label label-success">Da Nhap</label>';
                            }
                            ?>
                        </td>
                        <td class="p-team">
                            <?= $item['import_date'] ?>
                        </td>
                        <td class="p-team">
                            <?=$item['import_number']?>
                        </td>
                        <td class="p-team">
                            <?=$item['import_total_amount']?>
                        </td>
                        <td class="p-team">
                            <?=$item['import_total_price']?>
                        </td>
                        <td>
                            <a href="admin/manage/view/<?=$item['import_id']?>" class="btn btn-info btn-xs"><i class="fa fa-folder"></i> In </a>
                            <a href="admin/manage/view/<?=$item['import_id']?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <?php if($item['import_status']==0 ){
                                echo '<a href="admin/manage/move/'.$item['import_id'] .'" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Move </a>';
                            }
                            ?>
                            <a href="admin/customer/delete/<?= $item['import_id'] ?>"  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <!-- page end-->
    </section>
</section>