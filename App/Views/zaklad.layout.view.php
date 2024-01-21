<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slovenský zväz remeselníkov</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/StyleMain.css">
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=$link->url('uvod.index')?>">Slovenský zväz remeselníkov</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarsExample03" style="">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?=$link->url('uvod.index')?>">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$link->url('novinky.index')?>">Novinky</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Fórum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?=$link->url('kontakt.index')?>">Kontakt</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Kategórie remesiel</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Drevo</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Kameň</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Kov</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php if ($auth->isLogged()): ?>
            <ul class="navbar-nav nav-pills justify-content-end text-center">
                <li class="nav-item">
                    <a class="nav-link active" href="<?=$link->url('novinky.add')?>">Pridať novinku</a>
                </li>
            </ul>
            <?php endif; ?>
            <?php if ($auth->isLogged()): ?>
                <ul class="navbar-nav nav-pills justify-content-end text-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=$link->url('profil.index')?>">Profil</a>
                    </li>
                </ul>
                <ul class="navbar-nav nav-pills justify-content-end text-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=$link->url('prihlasenie.logout')?>">Odhlásiť sa</a>
                    </li>
                </ul>
            <?php endif; ?>
            <?php if (!$auth->isLogged()) : ?>
            <ul class="navbar-nav nav-pills justify-content-end text-center">
                <li class="nav-item">
                    <a class="nav-link active" href="<?=$link->url('prihlasenie.login')?>">Prihlásiť sa</a>
                </li>
            </ul>
            <?php endif; ?>
            <form role="search">
                <input class="form-control" type="search" placeholder="Hľadať" aria-label="Search">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>

</body>
</html>
