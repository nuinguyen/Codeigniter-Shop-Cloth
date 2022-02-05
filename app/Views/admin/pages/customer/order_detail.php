
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Thong tin ng dat
            </header>
            <?= view('message/message') ?>
            <table class="table table-hover p-table">
                <thead >
                <tr>
                    <th>User Name</th>
                    <th>User Phone</th>
                    <th>User Email</th>
                    <th>User Address</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?= $order_detail[0]['user_name'] ?>
                        </td>
                        <td class="p-name">
                            <?= $order_detail[0]['user_phone'] ?>
                        </td>
                        <td class="p-team">
                            <?= $order_detail[0]['user_email'] ?>
                        </td>
                        <td class="p-team">
                            <?=$order_detail[0]['user_address']?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <!-- page end-->
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Thong tin ng van chuyen
            </header>
            <?= view('message/message') ?>
            <table class="table table-hover p-table">
                <thead >
                <tr>
                    <th>Receiver Name</th>
                    <th>Receiver Phone</th>
                    <th>Receiver Note</th>
                    <th>Receiver Address</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?= $order_detail[0]['receiver_name'] ?>
                        </td>
                        <td class="p-name">
                            <?= $order_detail[0]['receiver_phone'] ?>
                        </td>
                        <td class="p-team">
                            <?= $order_detail[0]['receiver_note'] ?>
                        </td>
                        <td class="p-team">
                            <?=$order_detail[0]['receiver_address']?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <!-- page end-->
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                DOn dat hang
            </header>
            <?= view('message/message') ?>
            <table class="table table-hover p-table">
                <thead >
                <tr>
                    <th>STT</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Amount</th>
                    <th>Product Price</th>
                    <th>Product Purchase</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($order_detail as $key => $order) : ?>
                    <tr>
                        <td>
                            <?=$key +1?>
                        </td>
                        <td>
                            <img src="uploads/product/<?=$order['product_image']?>" class="lazyOwl product-mainpic" alt="product-image" style="display: block;width:100px;width:100px">
                        </td>
                        <td>
                            <?= $order['product_name'] ?><br>
                            <?= $order['classify_type'] ?>- <?= $order['classify_value'] ?>
                        </td>
                        <td class="p-name">
                            <?= $order['order_detail_amount'] ?>
                        </td>
                        <td class="p-team">
                            <?= number_format($order['product_price'],0,',','.').' '.'VNĐ' ?>
                        </td>
                        <td class="p-team">
                            <?= number_format($order['product_price']*$order['order_detail_amount'],0,',','.').' '.'VNĐ' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <!-- page end-->
    </section>
</section>