<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <?php if (!empty($session['cart'])): ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Sum</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($session['cart'] as $id => $product): ?>
                    <tr>
                        <td><?= \yii\helpers\Html::img("@web/images/products/{$product['img']}", [
                                'alt' => $product['name'],
                                'height' => 50
                            ]); ?></td>
                        <td><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $id]); ?>"><?= $product['name']; ?></a></td>
                        <td><?= $product['qty']; ?></td>
                        <td><?= $product['price']; ?></td>
                        <td><?= $product['price'] * $product['qty']; ?></td>
                        <td><span class="glyphicon glyphicon-remove text-danger remove-from-cart" data-id="<?= $id; ?>"></span></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5" class="text-right"><strong>Total qty:</strong></td>
                    <td><?= $session['cart.qty'] ?></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right"><strong>Total sum:</strong></td>
                    <td><?= $session['cart.sum'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <hr/>

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($order, 'name') ?>
        <?= $form->field($order, 'email') ?>
        <?= $form->field($order, 'phone') ?>
        <?= $form->field($order, 'address') ?>
        <?= Html::submitButton('ordered', ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end(); ?>
    <?php else: ?>
        <h3>Empty cart</h3>
    <?php endif; ?>
</div>