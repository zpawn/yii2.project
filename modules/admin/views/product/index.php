<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'category_id',
            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    return $data->category->name;
                }
            ],
            'name',
            // 'content:ntext',
            'price',
            // 'keywords',
            // 'description',
            // 'img',
            // 'hit',
            [
                'attribute' => 'hit',
                'value' => function ($data) {
                    return !$data->hit
                        ? '<span class="glyphicon glyphicon-remove text-danger"></span>'
                        : '<span class="glyphicon glyphicon-ok text-success"></span>';
                },
                'format' => 'html'
            ],
            // 'new',
            [
                'attribute' => 'new',
                'value' => function ($data) {
                    return !$data->new
                        ? '<span class="glyphicon glyphicon-remove text-danger"></span>'
                        : '<span class="glyphicon glyphicon-ok text-success"></span>';
                },
                'format' => 'html'
            ],
            // 'sale',
            [
                'attribute' => 'sale',
                'value' => function ($data) {
                    return !$data->sale
                        ? '<span class="glyphicon glyphicon-remove text-danger"></span>'
                        : '<span class="glyphicon glyphicon-ok text-success"></span>';
                },
                'format' => 'html'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
