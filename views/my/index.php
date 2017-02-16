<h1>My Action Index</h1>
<p><?= $hello; ?></p>
<ul>
    <?php foreach ($names as $name) : ?>
        <li><?= $name ?></li>
    <?php endforeach; ?>
</ul>
<p><strong><?= $id; ?></strong></p>