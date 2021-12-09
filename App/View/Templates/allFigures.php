<div class="allFiguresList">
    <?php foreach ($images as $image): ?>
    <div class="Figure">
        <div class="allFiguresListImageContainer">
            <img src="<?= $image['image'] ?>">
        </div>
        <div class="svgImageContainer">
            <?= $image['svg'] ?>
        </div>
        <div class="figureAuthor">
            <h1><?= $image['author'] ?></h1>
            <p><?= $image['date'] ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>