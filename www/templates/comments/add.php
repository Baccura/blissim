<div class="border border-secondary-subtle rounded p-3 my-3">
    <form action="index.php?action=addComment&productId=<?= $product->id ?>" method="post">
        <div class="mb-3">
            <label for="content" class="form-label">Nouveau commentaire</label>
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
</div>