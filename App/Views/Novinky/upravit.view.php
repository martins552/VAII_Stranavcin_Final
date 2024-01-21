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

<script type="module" src="public/js/prispevokModule.js" defer></script>
<form method="post" id="postForm" action="<?= $link->url('novinky.ulozit') ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= @$data['novinka']?->getId() ?>">
    <h1 class="hlavnyNadpis">Upraviť príspevok</h1>
    <hr>
    <main class="form-signin w-50 m-auto">
        <form>
            <div class="d-grid gap-2">
                <div class="form-floating">
                    <input type="text" class="form-control" name="nazov" placeholder="" value="<?= @$data['novinka']?->getNazov() ?>">
                    <label for="floatingInput">Názov príspevku</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="miesto" placeholder="" value="<?= @$data['novinka']?->getMiesto() ?>">
                    <label for="floatingPassword">Miesto konania</label>
                </div>
                <div class="form-floating">
                    <input type="date" class="form-control" name="datum" placeholder="" value="<?= @$data['novinka']?->getDatum() ?>">
                    <label for="floatingPassword">Dátum konania</label>
                </div>
                <div class="form-floating">
                <input type="file" class="form-control" name="obrazok" placeholder="">
                    <label for="floatingPassword">Obrázok</label>
                </div>
                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea class="form-control" name="text" rows="5" id="textArea" required><?= @$data['novinka']?->getText() ?></textarea>
                </div>
                <button class="btn btn-primary w-100 py-2" id="but" disabled type="submit">Odoslať</button>
            </div>
        </form>
    </main>
</form>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>-->

