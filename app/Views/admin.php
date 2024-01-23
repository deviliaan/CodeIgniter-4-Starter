<?= $this->extend('layouts/default');?>
<?= $this->section('content') ?>
<div class="w-full">
    <div class="grid grid-cols-2 gap-2 w-full p-4 ">
        <?= '<pre>' ?>
        <?= print_r($items[0])?>
        <?php foreach($items as $item){ ?>
            <h2><?= $item->title?></h2>
        <?php } ?>
    </div>
</div>
<?= $this->endSection() ?>