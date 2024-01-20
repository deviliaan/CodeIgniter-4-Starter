<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
<div class="container bg-slate-800">
    <div class="">
      <?php
        echo '<pre>';
        print_r($anime);
      ?>
      wellcome to codeigniter
    </div>
</div>
<?= $this->endSection()?>