
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
                    <th>id Order</th>
                    <th>Ngày mua</th>
                    <th>thanh toán</th>
                    <th>phí ship</th>
                    <th>Phuong thuc thanh toan</th>
                    <th>Trang thái</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($order as $item) : ?>
                    <tr>
                        <td>
                            <?= $item['order_id'] ?>
                        </td>
                        <td class="p-name">
                            <?= $item['order_date'] ?>
                        </td>
                        <td class="p-team">

                        </td>
                        <td class="p-team">
                            <?=$item['order_shipping_fee']?>
                        </td>
                        <td class="p-team">
                            <?php if($item['order_method']==1){
                                echo'Nhan hang thanh toan';
                            }else{
                                echo'Thanh toan bang the';
                            }
                            ?>
                        </td>
                        <td >
                            <?php
                            if($item['order_status']==0){
                                echo'<label class="label label-inverse"">Da huy</label>';
                            }elseif($item['order_status']==1){
                                echo'<span class="label label-default">Cho xac nhan</span>';
                            }elseif($item['order_status']==2){
                                echo'<span class="label label-warning">Cho lay hang</span>';
                            }elseif($item['order_status']==3){
                                echo'<span class="label label-primary">Dang gia</span>';
                            }else{
                                echo'<label class="label label-success">Da giao</label>';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="admin/customer/view/<?=$item['order_id']?>" class="btn btn-info btn-xs"><i class="fa fa-folder"></i> In </a>
                            <a href="admin/customer/view/<?=$item['order_id']?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <?php if($item['order_status']!=4 && $item['order_status']!=0 ){
                            echo '<a href="admin/customer/move/'.$item['order_id'] .'" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Move </a>';
                            }
                            ?>
                            <a href="admin/customer/delete/<?= $item['order_id'] ?>"  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <!-- page end-->
    </section>
</section>