<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <form class="form-horizontal" action="<?=isset($product_edit)?"admin/product/update/".$product_edit['product_id']:"admin/product/create" ?>" method="post" enctype="multipart/form-data">

            <aside class="profile-info col-lg-6">
                <section ion class="panel">
                    <?= view('message/message') ?>

                    <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Product Name</label>
                                <div class="col-lg-9">
                                    <input type="text" value="<?=isset($product_edit)?$product_edit['product_name']:"" ?>"  onkeyup="ChangeToSlug();" name="product_name" class="form-control" id="slug" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Slug</label>
                                <div class="col-lg-9">
                                    <input type="text" value="<?=isset($product_edit)?$product_edit['product_slug']:"" ?>" name="product_slug" class="form-control" id="convert_slug" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Gia SP</label>
                                <div class="col-lg-9">
                                    <input type="text" value="<?=isset($product_edit)?$product_edit['product_price']:"" ?>" name="product_price" class="form-control" id="product_price" placeholder=" ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Trang thai</label>
                                <div class="col-lg-9">
                                    <select name="product_status" class="form-control input-lg m-bot15">
                                        <?php if(isset($product_edit)){
                                          if($product_edit['product_status']==1){
                                                echo ' <option selected value="1">Hien</option>
                                                        <option value="0">An</option>';
                                            }else{
                                                echo ' <option value="1">Hien</option>
                                                        <option selected value="0">An</option>';
                                        }
                                        }else{
                                            echo '   <option value="1">Hien</option>
                                        <option value="0">An</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Phan loai</label>
                                <div class="col-lg-9">
                                    <select name="classify_id[]" class="tags_select_choose form-control input-sm m-bot15" multiple="multiple" >
                                         <?php foreach ($classify as $class) :?>
                                             <option  value="<?=$class['classify_id']?>" <?=isset($product_edit)?((in_array($class['classify_id'],$product_classify))?'selected':''):""?>><?=$class['classify_type']?> - <?=$class['classify_value']?></option>';
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Tom tat</label>
                                <div class="col-lg-9">
                                    <textarea name="product_summary"  id="product_summary" class="form-control" cols="30" rows="9"><?=isset($product_edit)?$product_edit['product_summary']:"" ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">About Me</label>
                                <div class="col-lg-9">
                                    <textarea name="product_desc" id="product_desc" class="form-control" cols="30" rows="9"><?=isset($product_edit)?$product_edit['product_desc']:"" ?></textarea>
                                </div>
                            </div>
                    </div>
                </section>
            </aside>
            <aside class="profile-info col-lg-6">
                <section ion class="panel">
                    <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <div class="form-group">
                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Danh muc</label>
                            <div class="col-lg-9">
                                <select name="category_id" class="form-control input-lg m-bot15">
                                    <?php foreach ($category as $cate) : ?>
                                    <option value="<?= $cate['category_id']?>" <?=isset($product_edit)?(($product_edit['category_id']==$cate['category_id'])?'selected':''):""?>><?= $cate['category_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">nha san xuat</label>
                            <div class="col-lg-9">
                                <select name="producer_id" class="form-control input-lg m-bot15">
                                    <?php foreach ($producer as $item) :?>
                                    <option value="<?=$item['producer_id']?>"  <?=isset($product_edit)?(($product_edit['producer_id']==$item['producer_id'])?'selected':''):""?>><?=$item['producer_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Nha CUng Cap</label>
                            <div class="col-lg-9">
                                <select name="provider_id" class="form-control input-lg m-bot15">
                                    <?php foreach ($provider as $item) :?>
                                    <option value="<?=$item['provider_id']?>"  <?=isset($product_edit)?(($product_edit['provider_id']==$item['provider_id'])?'selected':''):""?>><?=$item['provider_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Anh Dai dien</label>
                                <div class="col-lg-6">
                                    <input type="file"  name="product_image" class="form-control" id="product_image" placeholder=" ">
                                </div>
                            </div>
                        <div class="form-group">
                            <label  class="col-lg-3 control-label"></label>
                            <div class="col-lg-6 image_product">
                                <?php if(isset($product_edit))
                                    echo '<img src="uploads/product/'.$product_edit['product_image'].'" alt="" height="100" width="100" class="img-thumbnail">';
                                ;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label">Anh nen</label>
                            <div class="col-lg-6">
                                <input type="file"  name="product_images[]" class="form-control" id="product_images" placeholder=" "  multiple="multiple">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-lg-3 control-label"></label>
                            <div class="col-lg-6 images_product">
                                <?php if(isset($album))
                                    foreach ($album as $item)
                                    echo '<img src="uploads/album/'.$item['album_image'].'" alt="" height="100" width="100" class="img-thumbnail">';
                                ;?>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-success save_product"><?=isset($product_edit)?"Update":"Save"?></button>
                                    <button type="button" class="btn btn-default cancel_product">Cancel</button>
                                </div>
                            </div>
                    </div>
                </section>
            </aside>
            </form>

        </div>

        <!-- page end-->
    </section>
</section>