<?php
$layout = 'zaklad';
?>

<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<script type="module" src="public/js/upozornenieScript.js" defer></script>
<h1 class="hlavnyNadpis">Profil</h1>
<hr>
    <div class="card mx-auto karta">
        <div class="card-body">
            <img src="<?=\App\Helpers\FileStorage::UPLOAD_DIR . '/' . $data['profil']->getObrazok()?>" class="card-img-top">
            <h1 class="card-text">Meno: <?= $data['profil']->getUsername()?></h1>
            <h1 class="card-text">E-Mail: <?= $data['profil']->getEmail()?></h1>
            <h1 class="card-text">Dátum narodenia: <?= $data['profil']->getBirthdate()?></h1>
        </div>
        <?php if (!$auth->hasHighPermissions()) : ?>
            <a class="btn btn-primary mb-2" href="<?=$link->url('profil.upravit', ['id' => $data['profil']->getId()])?>">Upraviť</a>
            <a id="zmazatBut" class="btn btn-danger mb-2" href="<?=$link->url('profil.zmazat', ['id' => $data['profil']->getId()])?>">Zmazať</a>
        <?php endif; ?>
    </div>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>-->


