<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- content strart  -->
    <div class="album py-5 bg-light flex-shrink-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 d-flex justify-content-center">
                <h3>商品店舖</h3>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <!-- card end -->
                <?php foreach($data['products'] as $product):?>
                <?php print_r($product)?>
                <div class="card mb-3 shadow-sm">
                    <a href="">
                        <img class="list-item" src="">
                    </a>
                    <div class="card-body">
                        <p class="card-text list-item-card"></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">詳細</button> -->
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                            </div>
                            <small class="text-muted">上架日期：</small>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- card end -->

            </div>
        </div>
    </div>
</div>
<!-- content end -->

<?php require APPROOT . '/views/inc/footer.php'; ?>
