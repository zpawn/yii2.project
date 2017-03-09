<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id => $product): ?>
            <tr>
                <td><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $id]); ?>"><?= $product['name']; ?></a></td>
                <td><?= $product['qty']; ?></td>
                <td><?= $product['price']; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="2" class="text-right"><strong>Total qty:</strong></td>
            <td><?= $session['cart.qty'] ?></td>
        </tr>
        <tr>
            <td colspan="2" class="text-right"><strong>Total sum:</strong></td>
            <td><?= $session['cart.sum'] ?></td>
        </tr>
        </tbody>
    </table>
</div>