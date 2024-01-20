<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="grid p-4 gap-2 grid-cols-2">
      <?php
        foreach($animes as $anime){ ?>
          <?= view_cell('App\Libraries\Card::show',['anime'=>$anime,'isAdmin'=>false]) ?>
        <?php } ?>
      ?>
    </div>
</div>
<?= $this->endSection()?>