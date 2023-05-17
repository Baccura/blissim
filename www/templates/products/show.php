<?php ob_start(); ?>
<h1><?= $product->name ?></h1>
<p><b><?= number_format($product->price, 2, ',', ' ') ?> €</b></p>
<p><?= $product->description ?></p>

<?php require 'templates/comments/list.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/layout.php'; ?>