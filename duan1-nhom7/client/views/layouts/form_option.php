<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
    <div style="width: 40%;" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div style="background-color: #FAFAFA;" class="modal-header">
                <div style="width: 100%;" class="row">
                    <div class="col-5">
                        <img style="width: 60%;" src="" alt="image" id="set_image">
                    </div>
                    <div class="col-7">
                        <h3 id="set_name"></h3>
                        <p style="color: #8D461D; font-size: 18px;" class="mt-2" id="set_price"></p>
                        <form id="form_option" action="">
                            <!-- input none -->
                            <input style="display: none;" type="text" id="productId" name="productId">
                            <input style="display: none;" type="text" id="productName" name="productName">
                            <input style="display: none;" type="text" id="productImage" name="productImage">
                            <input style="display: none;" type="text" id="priceProOpt" name="priceProOpt">
                            <input style="display: none;" type="text" id="toppingIP" name="toppingIP">
                            <div style="display: flex; align-items: center; width: 170px;" class="btn-group">
                                <button id="reduce" style="width: 20px; height: 25px;display: flex; justify-content: center; align-items: center;" type="button" class="btn btn-info rounded-circle ">-</button>
                                <input onkeyup="toTal()" id="quantity" style="width: 50px; text-align: center; border: none; background-color: #FAFAFA;" value="1" type="text" id="quantity" name="quantity">

                                <button id="augment" style="width: 20px;text-align: center; height: 25px;display: flex; justify-content: center; align-items: center;" type="button" class="btn btn-info rounded-circle">+</button>
                                <button style=" display: flex; justify-content: center; align-items: center; " id="total" type="button" class="btn-warning ml-3"></button>
                            </div>

                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div style="background-color: #FAFAFA; height: 300px; overflow: auto; " class="modal-body">

                <h5 class="mt-2" style="font-weight: bold;">Chọn đường</h5>
                <div style="border: none;" class="form-control mt-2">
                    <div class="row">
                        <div class="col">
                            <input type="radio" class="" value="100%" name="sugar" checked=true required> 100%
                        </div>
                        <div class="col">
                            <input type="radio" class="" value="70%" name="sugar" required> 70%
                        </div>
                    </div>
                </div>

                <h5 class="mt-2" style="font-weight: bold;">Chọn size</h5>
                <div style="border: none;" class="form-control mt-2">
                    <div class="row">
                        <?php $sizes = list_size();

                        for ($i = 0; $i < count($sizes); $i++) {
                        ?>
                            <div class="col">
                                <input data="<?php echo $sizes[$i]['price_increase'] ?>" onclick="click_size()" id="size" type="radio" class="" value="<?php echo $sizes[$i]['pro_size'] ?>" name="size"> <?php echo $sizes[$i]['pro_size'] ?>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
                <h5 class="mt-2" style="font-weight: bold;">Chọn đá</h5>
                <div style="border: none;height: 80px;" class="form-control mt-2">
                    <div class="row">
                        <div class="col">
                            <input type="radio" class="" value="100%" name="ice" checked=true required> 100% <br>
                            <input type="radio" class="" value="70%" name="ice" required> 70%<br>
                            <input type="radio" class="" value="50%" name="ice" required> 50%
                        </div>
                        <div class="col">
                            <input type="radio" class="" value="30%" name="ice" required> 30%<br>
                            <input type="radio" class="" value="Không đá" name="ice" required> Không đá
                        </div>
                    </div>
                </div>
                <h5 class="mt-2" style="font-weight: bold;">Chọn topping</h5>
                <div style="border: none;height: 80px;" class="form-control mt-2">
                    <?php

                    $topping = list_topping();
                    for ($i = 0; $i < count($topping); $i++) {
                    ?>
                        <input data_id="<?php echo $topping[$i]['id'] ?>" data="<?php echo $topping[$i]['price'] ?>" onchange="toTal(), topPingText()" id="topping" type="checkbox" class="" value="<?php echo $topping[$i]['name'] ?>" name="topping"> <?php echo $topping[$i]['name'] ?><br>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button data-dismiss="modal" name="btnSubmit" type="submit" class="btn btn-success swalDefaultSuccess">Đặt hàng</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

</div>