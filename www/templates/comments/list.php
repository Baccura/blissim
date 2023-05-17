<div class="text-start">
    <h1>Commentaires</h1>

    <?php if (isset($_SESSION['user'])) { ?>
        <?php require('templates/comments/add.php') ?>
    <?php } ?>

    <?php foreach ($comments as $comment) { ?>
        <div class="card my-3">
            <div class="card-body">
                <?= $comment->content ?>
            </div>
            <div class="card-footer">
                <b><?= $comment->user ?></b> - <i><?= $comment->createdAt->format('d/m/Y h:i:s') ?></i>
            </div>
        </div>
    <?php } ?>

    <div class="text-center">
        <?php if ($nbComments > $nbCommentsPerPage) { ?>
            <?php if ($page > 1) { ?>
                <a href="index.php?action=product&productId=<?= urlencode($product->id) ?>&page=<?= $page - 1 ?>"><b>Précedent</b></a>
            <?php } ?>
            <b><?= $page ?></b>
            <?php if ($page < ceil($nbComments / $nbCommentsPerPage)) { ?>
                <a href="index.php?action=product&productId=<?= urlencode($product->id) ?>&page=<?= $page + 1 ?>"><b>Suivant</b></a>
            <?php } ?>
        <?php } ?>
    </div>
</div>