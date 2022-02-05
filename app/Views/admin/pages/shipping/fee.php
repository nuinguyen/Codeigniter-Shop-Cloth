<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <aside class="profile-info col-lg-12">
            <form class="form-horizontal" action="admin/shipping/create" method="post" >
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <section ion class="panel">
                            <div class="panel-body bio-graph-info">
                                <h1> Profile Info</h1>
                                <?= view('message/message') ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Thanh pho</label>
                                    <div class="col-lg-9">
                                        <select name="city_id" id="city" class="form-control input-lg m-bot15 choose_address">
                                            <option value="">Tinh/Thanh pho</option>
                                            <?php foreach ($city as $tp) :?>
                                                <option value="<?=$tp['city_id']?>"><?=$tp['city_name']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Quan\Huyên</label>
                                    <div class="col-lg-9">
                                        <select name="district_id" id="district" class="form-control input-lg m-bot15 choose_address">
                                            <option value="">Quan/Huyen</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Phuong\Xa</label>
                                    <div class="col-lg-9">
                                        <select name="village_id" id="village" class="form-control input-lg m-bot15">
                                            <option value="">Phuong/Xa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Phí vẩn chuyển</label>
                                    <div class="col-lg-9">
                                        <input type="text"  name="shipping_fee" class="form-control" id="shipping_free" placeholder=" ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-success">Them phi van chuyen</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                <div class="col-lg-3"></div>
            </form>
            </aside>
        </div>
        <div class="row">
            <aside class="profile-info col-lg-12">
                <table class="table table-hover p-table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>City Name</th>
                        <th>District Name</th>
                        <th>Village Price</th>
                        <th>Shipping Fee</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($shipping as $ship) : ?>
                        <tr>
                            <td>
                                <?= $ship['shipping_id'] ?>
                            </td>
                            <td class="p-name">
                                <?=$ship['city_name']?>
                            </td>
                            <td class="p-team">
                                <?=$ship['district_name']?>
                            </td>
                            <td class="p-team">
                                <?=$ship['village_name']?>
                            </td>
                            <td contenteditable class="p-team edit_shipping_fee" data-shipping_id="<?=$ship['shipping_id']?>">
                                <?=$ship['shipping_fee']?>
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