<?php

use app\assets\AppAsset;
use yii\helpers\Html;

use app\components\PostFooterWidget;

AppAsset::register($this);
?>

<?php $this->beginPage(); ?>
<!doctype html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->title; ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>

    <div class="wrap">
        <div class="container">

            <ul class="nav nav-pills">
                <li role="presentation" class="active"><?= Html::a('Home', '/web/'); ?></li>
                <li role="presentation"><?= Html::a('Blog', ['post/index']); ?></li>
                <li role="presentation"><?= Html::a('Post', ['post/show']) ?></li>
            </ul>

            <?php if (isset($this->blocks['blockShow'])): ?>
                <?= $this->blocks['blockShow'] ?>
            <?php endif; ?>

            <?= $content; ?>
        </div>

    </div>

    <?= PostFooterWidget::widget(); ?>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>