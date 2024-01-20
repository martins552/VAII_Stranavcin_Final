<?php
$layout = 'zaklad';
?>

<h1 class="hlavnyNadpis">Novinky</h1>
<hr>
<?php foreach ($data['novinky'] as $post): ?>
<div class="card mx-auto karta">
    <div class="card-body">
        <img src="<?=\App\Helpers\FileStorage::UPLOAD_DIR . '/' . $post->getObrazok()?>" class="card-img-top">
        <h5 class="card-title"><?= $post->getNazov()?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $post->getMiesto()?></h6>
        <p class="card-text"><?= $post->getText()?></p>
    </div>
    <div class="card-footer text-body-secondary"><?= $post->getDatum()?></div>

    <?php if($auth->isLogged()): ?>
    <a class="btn btn-primary mb-2" href="<?=$link->url('novinky.upravit', ['id' => $post->getId()])?>">Upraviť</a>
    <a class="btn btn-danger" href="<?=$link->url('novinky.zmazat', ['id' => $post->getId()])?>">Zmazať</a>
    <?php endif; ?>
</div>
<?php endforeach; ?>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>-->

