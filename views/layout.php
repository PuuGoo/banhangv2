<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/global.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/layout.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/<?= explode('.', $view)[0] ?>.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <?php include "views/header.php" ?>
    </header>
    <nav class="navbar navbar-expand bg-body-primary">
        <?php include "views/menu.php" ?>
    </nav>
    <main>
        <?php include $view ?>
    </main>
    <footer class="mt-40 text-center">
        <?php include "views/footer.php" ?>
    </footer>

</body>

</html>