<?php

use App\Models\User;

$layout = 'zaklad';
?>

<script type="module" src="public/js/komentarScript.js" defer></script>
<h1 class="hlavnyNadpis">Upraviť komentár</h1>
<hr>
<div class="card mx-auto karta">
    <div class="card-body">
        <img src="<?=\App\Helpers\FileStorage::UPLOAD_DIR . '/' . $data['novinka']->getObrazok()?>" class="card-img-top">
        <h5 class="card-title"><?= $data['novinka']->getNazov()?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['novinka']->getMiesto()?></h6>
        <p class="card-text"><?= $data['novinka']->getText()?></p>

        <?php foreach ($data['komentare'] as $komentar): ?>
            <?php if ($komentar->getPost() == $data['novinka']->getId()): ?>
                <hr>
                <h6 class="card-text"><?= User::getOne($komentar->getUser())->getUsername() ?></h6>
                <p class="card-text"><?= $komentar->getText() ?></p>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
    <div class="card-footer text-body-secondary"><?= $data['novinka']->getDatum()?></div>

    <form method="post" enctype="multipart/form-data" action="<?=$link->url('komentar.ulozit', ['id' => $data['komentar']->getId()]) ?>">
        <input type="hidden" name="post" value="<?= @$data['novinka']?->getId() ?>">
        <div class="card-body">
            <!--        <input type="text" class="form-control" name="komentar" placeholder="" value="" required>-->
            <textarea class="form-control" name="komentar" id="komentar" rows="5"><?= @$data['komentar']?->getText() ?></textarea>
        </div>
        <button class="btn btn-primary w-100 py-2" id="but" type="submit">Odoslať</button>
    </form>
</div>