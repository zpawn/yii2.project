<h2>Show Action</h2>

<button class="btn btn-success" id="ajax-btn">Click me...</button>

<?php $this->registerCss('.container { background-color: #ff0; }'); ?>

<?php //$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']); ?>

<?php //$this->registerJs("(function ($) { $('.container').append('<p>SHOW!!!</p>'); }(jQuery));"); ?>
<?php //$this->registerJs("(function ($) { $('.container').append('<p>SHOW!!!</p>'); }(jQuery));", \yii\web\View::POS_LOAD); ?>


<?php
$js = <<< JS
    (function ($) {
        $('#ajax-btn').on('click', function () {
            $.ajax({
                url: 'index.php?r=post/index',
                data: { test: 123 },
                type: 'GET',
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