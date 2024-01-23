<?= $this->extend('layouts/default');?>
<?= $this->section('content') ?>
<div class="w-full">
    <h2 id="val"></h2>
    <div class="grid grid-cols-2 gap-2 w-full p-4 ">
        <?php foreach($items as $item){ ?>
            <?= view_cell('\App\Libraries\Card::show',['anime'=>$item,'isAdmin'=>'true'])?>
        <?php } ?>
    </div>
</div>
<script src="/js/recent.js"></script>
<?= $this->endSection() ?>