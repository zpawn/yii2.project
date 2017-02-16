<?php
use app\components\MyWidget;
?>

<?php $this->beginBlock('blockShow'); ?>
<h1>Title Page</h1>
<?php $this->endBlock(); ?>

<h2>Show Action</h2>

<?= MyWidget::widget(); ?>
<?= MyWidget::widget(['name' => 'Vasia']); ?>

<button class="btn btn-success" id="ajax-btn">Click me...</button>

<ul>
<?php foreach($categories as $categoty): ?>
    <li>
        <?= $categoty->title ?>
        <ul class="hidden">
        <?php foreach($categoty->products as $product): ?>
            <li><?= $product->title; ?></li>
        <?php endforeach; ?>
        </ul>
    </li>
<?php endforeach; ?>
</ul>

<?php
$js = <<< JS
    (function ($) {
        $('#ajax-btn').on('click', function () {
            $.ajax({
                url: 'index.php?r=post/index',
                data: { test: 123 },
                type: 'POST',
                success: function (result) {
                    console.log(result);
                },
                error: function () {
                    console.log('Error!');
                }
            });
        });
    }(jQuery));
JS;

$this->registerJs($js);

?>