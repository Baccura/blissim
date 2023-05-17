<?php ob_start(); ?>
<h1>Produits</h1>

<div class="container my-4">
    <div class="row">
        <?php foreach ($products as $product) { ?>
            <div class="col-4 p-2">
                <div class="card h-100">
                    <div class="card-body">
                        <p><?= $product->name ?></p>
                        <b><?= number_format($product->price, 2, ',', ' ') ?> €</b>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-sm btn-primary" href="index.php?action=product&productId=<?= urlencode($product->id) ?>">Voir</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>