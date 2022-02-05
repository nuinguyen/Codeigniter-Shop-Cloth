<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <form class="form-horizontal" action="admin/manage/create" method="post" enctype="multipart/form-data">

                <aside class="profile-info col-lg-12">
                    <section ion class="panel">
                        <?= view('message/message') ?>

                        <div class="panel-body bio-graph-info">
                            <h1> Profile Info</h1>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Nha CUng Cap</label>
                                <div class="col-lg-9">
                                    <select name="provider_id" class="form-control input-lg m-bot15">
                                        <option value="1">GC</option>
                                        <option value="0">NIKE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">San Pham</label>
                                <div class="col-lg-9">
                                    <select name="product_id[]" class="import_select_choose form-control input-sm m-bot15" multiple="multiple" >
                                        <?php foreach ($product as $item) : ?>
                                            <option  value="<?=$item['product_id']?>"><?=$item['product_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <table class="table table-hover p-table">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                        <th>Money</th>
                                    </tr>
                                    </thead>
                                    <tbody class="body_import">

                                    </tbody>
                                </table>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-5">
                                    <p>Số lượng:</p>
                                    <p>Tổng tiền:</p>
                                     <p>Chi phí <small>(phí vận chuyển...)</small>:</p>
                                    <p class="p-t-15"><b>Tổng tiền thanh toán:</b></p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="import_total_amount"><br></p>
                                    <p class="import_total_price"><br></p>
                                    <p><input type="text" class="form-control import_cost" name="import_cost" value=""></p>
                                    <p><b class="import_total_last"></b></p>
                                </div>

                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Ghi Chu</label>
                                <div class="col-lg-9">
                                    <textarea name="import_note" id="import_note" class="form-control" cols="30" rows="9"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-success save_product">Save</button>
                                <button type="button" class="btn btn-default cancel_product">Cancel</button>
                            </div>
                        </div>
                    </section>
                </aside>
            </form>

        </div>
        <!-- page end-->
    </section>
</section>