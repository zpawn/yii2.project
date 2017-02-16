<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<h1>Index Action</h1>

<?php $form = ActiveForm::begin([
    'options' => [
        'id' => 'postForm'
    ]
]); ?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dissmisible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dissmisible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span>&times;</span></button>
        <?= Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>

<?= $form->field($post, 'name'); ?>
<?= $form->field($post, 'email')->input('email'); ?>
<?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>
<?= $form->field($post, 'text')->textarea(['rows' => 5]); ?>

<?= Html::submitButton('Send', [
    'class' => 'btn btn-success'
]); ?>

<?php ActiveForm::end(); ?>