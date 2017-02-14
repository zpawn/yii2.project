<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<h1>Index Action</h1>

<?php //debug($model); ?>

<?php $form = ActiveForm::begin([
    'options' => [
        'id' => 'testForm'
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

<?= $form->field($model, 'name'); ?>
<?= $form->field($model, 'email')->input('email'); ?>
<?= $form->field($model, 'text')->textarea(['rows' => 5]); ?>

<?= Html::submitButton('Send', [
    'class' => 'btn btn-success'
]); ?>

<?php ActiveForm::end(); ?>