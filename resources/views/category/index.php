<?php foreach ($newsCategory as $key => &$category): ?>

    <div>
        <h2><a href="<?= route('category.id', ['id' => ++$key]) ?>"><?= $category['title'] ?></a></h2>
        <p><?= $category['description'] ?></p>
    </div>

<?php endforeach; ?>
