<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Blissim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100">
    <div class="container-fluid p-3">
        <?php require 'templates/_nav.php'; ?>
        <section class="text-center container">
            <div class="py-lg-5">
                <?= $content ?>
            </div>
        </section>
    </div>
</body>

</html>