<?= $this->extend('layouts/default');?>
<?= $this->section('content');?>
<div class="mt-2">
    <div class="grid grid-cols-2 p-2">
        <div class="p-2">
            <img src="<?= $anime->image?>" alt="<?= $anime->title?>" srcset="">
        </div>
        <div>
            <h2><?= $anime->title?></h2>
            <h1>Episode: <?= $anime->latest_episode?></h1>
            <span>Type: <?= $anime->type?></span>
        </div>
    </div>
    <div class="p-4">
        <?= $anime->story?>
    </div>
</div>
<?= $this->endSection()?>