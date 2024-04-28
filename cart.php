<?php

?>

<!DOCTYPE html>
<html>
<?php include('Layout/Header2.php'); ?>


<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered m-0">
                    <thead>
                    <tr>
                        <!-- Set columns width -->
                        <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                        <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                        <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                        <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                        <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td class="p-4">
                            <div class="media align-items-center">
                                <img src="" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                <div class="media-body">
                                    <a href="#" class="d-block text-dark">Product 1</a>
                                    <small>
                                        <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td class="text-right font-weight-semibold align-middle p-4">Price Here</td>
                        <td class="align-middle p-4"><input type="text" class="form-control text-center" value="2"></td>
                        <td class="text-right font-weight-semibold align-middle p-4">Total Here</td>
                        <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                    </tr>

                    <tr>
                        <td class="p-4">
                            <div class="media align-items-center">
                                <img src="" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                <div class="media-body">
                                    <a href="#" class="d-block text-dark">Product 2</a>
                                    <small>
                                        <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#000;"></span> &nbsp;
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td class="text-right font-weight-semibold align-middle p-4">Price Here</td>
                        <td class="align-middle p-4"><input type="text" class="form-control text-center" value="1"></td>
                        <td class="text-right font-weight-semibold align-middle p-4">Total Here</td>
                        <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                    </tr>

                    <tr>
                        <td class="p-4">
                            <div class="media align-items-center">
                                <img src="" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                <div class="media-body">
                                    <a href="#" class="d-block text-dark">Product 3</a>
                                </div>
                            </div>
                        </td>
                        <td class="text-right font-weight-semibold align-middle p-4">Price Here</td>
                        <td class="align-middle p-4"><input type="text" class="form-control text-center" value="1"></td>
                        <td class="text-right font-weight-semibold align-middle p-4">Total here</td>
                        <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                    </tr>

                    </tbody>
                </table>
            </div>

                <div class="d-flex">
                    <div class="text-right mt-4">
                        <label class="text-muted font-weight-normal m-0">Total price</label>
                        <div class="text-large"><strong>Overall Total Here</strong></div>
                    </div>
                </div>
            </div>

            <div class="float-right">
                <a href="index.php" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</a>
                <a href="checkout.php" class="btn btn-lg btn-primary mt-2">Checkout</a>
            </div>

        </div>
    </div>
</div>

<?php include('Layout/Footer.php'); ?>
</html>