<?php
/* @var $this app\components\MenuCategoryWidget */
?>

    <option
        value="<?= $category['id'] ?>"
        <?php if ($category['id'] == $this->model->category_id) echo ' selected '; ?>
    >
        <?= $tab . $category['name']; ?>
    </option>
<?php if (isset($category['childs'])): ?>
    <?= $this->getMenuHtml($category['childs'], $tab . '- - '); ?>
<?php endif; ?>