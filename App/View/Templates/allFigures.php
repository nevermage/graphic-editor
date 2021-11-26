<div class="allFiguresList">
    <?php foreach ($images as $image): ?>
    <div class="Figure">
        <div class="allFiguresListImageContainer">
            <img src="<?= $image['image'] ?>">
        </div>
        <div class="figureAuthor">
            <h1><?= $image['author'] ?></h1>
        </div>
        <div class="figureDate">
            <h1><?= $image['date'] ?></h1>
        </div>
    </div>
    <?php endforeach; ?>
</div>