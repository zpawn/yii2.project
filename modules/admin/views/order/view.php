<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Order: #'. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            //'status',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger">active</span>' : '<span class="text-success">completed</span>',
                'format' => 'html'
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

    <?php $products = $model->orderItems; ?>

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Sum</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><a href="<?= Url::to(['product/view', 'id' => $product->id]); ?>"><?= $product->name; ?></a></td>
                <td><?= $product->qty_item; ?></td>
                <td><?= $product->price; ?></td>
                <td><?= $product->sum_item; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
