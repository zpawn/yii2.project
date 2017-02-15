<?php $this->beginBlock('blockShow'); ?>
<h1>Title Page</h1>
<?php $this->endBlock(); ?>

<h2>Show Action</h2>

<button class="btn btn-success" id="ajax-btn">Click me...</button>

<!-- Lazy Load -->
<?php debug($categoryLazyLoad); ?>
<?= count($categoryLazyLoad->products); ?><!-- Дополнительный запрос происходит здесь -->

<!-- Eager Load -->
<?php debug($categoryEagerLoad); ?>

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