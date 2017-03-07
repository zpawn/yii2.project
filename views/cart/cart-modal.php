<?php if (!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $product): ?>
                <tr>
                    <td><?= $product['img']; ?></td>
                    <td><?= $product['name']; ?></td>
                    <td><?= $product['qty']; ?></td>
                    <td><?= $product['price']; ?></td>
                    <td><span class="glyphicon glyphicon-remove text-danger remove-from-cart"></span></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4" class="text-right"><strong>Total qty:</strong></td>
                <td><?= $session['cart.qty'] ?></td>
            </tr>
            <tr>
                <td colspan="4" class="text-right"><strong>Total sum:</strong></td>
                <td><?= $session['cart.sum'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Empty cart</h3>
<?php endif; ?>