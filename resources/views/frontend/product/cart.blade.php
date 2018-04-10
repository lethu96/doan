<?php
use yii\helpers\Url;
use common\libs\Cart;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$readNumber = new Cart;

?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
<?php $form = ActiveForm::begin(['action' => '/product/payment', 'id' => 'charge-form', 'method' => 'post',]); ?>
<div class="modal-body">
    <div class="modal-product">
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá </th>
                    <th>Số lượng</th>
                    <th>Thành Tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>

                <?php $amount = 0 ?>
                <?php foreach ($listCart as $key => $value): ?>
                    <tr>
                        <td><a href="<?= Url::to('/product/detail?id='.$key) ?>" title="<?= $value['name'] ?>"><?= $value['name'] ?></a></td>
                        <td><a href="<?= Url::to('/product/detail?id='.$key) ?>" title=""><img src="<?= Url::base(); ?>../backend/uploads/<?= $value['image'] ?>" width="100px" height="150px" alt=""></a></td>
                        <td><?= number_format($value['price']) ?> VND</td>
                        <td ><?= $value['product_cnt'] ?></td>
                        <td><?= number_format($value['price']*$value['product_cnt']) ?></td>                    
                        <td><a href="javascipt:void(0)" class="btn btn-danger delete_sp" title="xóa sản phẩm" data-id="<?= $key ?>" ><i class="fa fa-trash" aria-hidden="true" ></i></a></td>
                    </tr>
                    <?= Html::hiddenInput('productId[]', $key ,['id' => 'price']); ?>
                <?php $amount += $value['price']*$value['product_cnt'] ?>
                <?php endforeach ?>
                <?php if ($amount>0): ?>
                    <tr>
                        <td align="right" colspan="4"><span style="font-weight: bold;">Tổng : </span></td>
                        <td colspan="2"><span style="color:red"><?= number_format($amount) ?> VND</span></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">Số tiền bằng chữ: </td>
                        <td colspan="3" align="left"><strong><?= ucfirst($readNumber->convert_number_to_words($amount)) ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right"> Thanh Toán chuyển khoản : </td>
                        <td colspan="3"><button type="button" class="btn btn-primary" id="payment">Tiếp Tục Thanh Toán</button></td>
                    </tr>
                    <tr>
                        <td colspan="6" align="center">
                            <div style="text-align: center; padding-left: 250px;">
                                <div class="form-group col-md-7 credit-cart" style="display: none; margin-top: 10px;">
                                
            
                                    <span class="charge-errors" style="color: red; font-size: 20px"></span>
                                    <div class="col-md-12 payPrice" style="text-align: center">

                                    </div>
                                    <div class="col-md-12 mod--cardlist">
                                        <ul>
                                            <li><img src="<?= Url::base(); ?>/images/visa.png" alt=""></li>
                                            <li><img src="<?= Url::base(); ?>/images/mastercard.png" alt=""></li>
                                            <li><img src="<?= Url::base(); ?>/images/jcb.png" alt=""></li>
                                            <li><img src="<?= Url::base(); ?>/images/americanExpress.png" alt=""></li>
                                            <li><img src="<?= Url::base(); ?>/images/dinersClub.png" alt=""></li>
                                            <li><img src="<?= Url::base(); ?>/images/discover.png" alt=""></li>
                                        </ul>
                                    </div>

                                    <?= Html::label('<b>Số tài khoản</b>', '', ['class' => 'col-md-4 col-sm-4 col-xs-4']) ?>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <?= Html::input('text', 'number', '',
                                            [
                                                'class' => 'number form-control',
                                                'maxlength' => 16,
                                                'placeholder' => 'Số thẻ'
                                            ]
                                        );?>
                                    </div>

                                    <?= Html::label('<b>CVC</b>', '', ['class' => 'col-md-4 col-sm-4 col-xs-4']) ?>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <?= Html::input('text', 'cvc', '',
                                            [
                                                'class' => 'cvc form-control',
                                                'maxlength' => 4,
                                                'placeholder' => 'CVC'
                                            ]
                                        );?>
                                    </div>

                                    <?= Html::label('<b>Ngày hết hạn</b>', '', ['class' => 'col-md-4 col-sm-4 col-xs-4']) ?>
                                    <div class="col-md-8 col-sm-8 col-xs-8 date">
                                        <?= Html::input('text', 'exp_month', '',
                                            [
                                                'class' => 'exp_month form-control',
                                                'maxlength' => 2,
                                                'placeholder' => 'Tháng'
                                            ]
                                        );?>
                                        <span>/</span>
                                        <?= Html::input('text', 'exp_year', '',
                                            [
                                                'class' => 'exp_year form-control',
                                                'maxlength' => 4,
                                                'placeholder' => 'Năm'
                                            ]
                                        );?>
                                    </div>

                                    <?= Html::label('<b>Họ tên</b>', '', ['class' => 'col-md-4 col-sm-4 col-xs-4']) ?>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <?= Html::input('text', 'name-user', '',
                                            [
                                                'class' => 'name form-control',
                                                'placeholder' => 'TARO YAMADA'
                                            ]
                                        );?>
                                    </div>
                                    <div class="form-group">
                                        <?= Html::hiddenInput('api', Yii::$app->params['publicApiPayJp'] ,['id' => 'publicApiPayJp']); ?>
                                        <?= Html::hiddenInput('price', $amount ,['id' => 'price']); ?>

                                        <?= Html::button('Thanh Toán',
                                            [
                                                'class' => 'btn btn-info btn-sm clearBoth',
                                                "onclick" => 'confirmation()'
                                            ])
                                        ?>
                                    </div>
                                
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                <?php endif ?>
                
            </tbody>
        </table>
    </div>
</div>
<?php ActiveForm::end(); ?>
<script type="text/javascript" src="https://js.pay.jp/"></script>
<script src="../js/payMent.js" type="text/javascript" charset="utf-8"></script>
<script>
    $('#payment').click(function(){
        $('.credit-cart').slideToggle('slow');
    });

    function confirmation() {
        var answer = confirm("Bạn có chắc chắn muốn gửi nó ?");
        if (answer){
            token();
        }
    }
</script>