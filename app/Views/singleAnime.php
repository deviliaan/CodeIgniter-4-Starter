<?= $this->extend('layouts/default'); ?>
<?= $this->section('content') ?>
<div>
    <div class="grid grid-cols-2 p-2">
        <div>
            <img src="<?= $anime->images->jpg->image_url?>"/>
            
        </div>
        <div class="p-2">
            <div class="bg-orange-300 shadow rounded">
                <h2 class="p-2"><?= $anime->title?></h2>
                <span class="p-2">Other Names: <?= $anime->title_japanese?></span>
            </div>
            <div class="bg-orange-300 shadow rounded mt-2 flex flex-col">
                <span class="pl-2">Type: <?= $anime->type?></span>
                <span class="pl-2">Episodes: <?= $anime->episodes?></span>
                <span class="pl-2"><?= $anime->status?></span>
            </div>
        </div>
    </div>
    <div class="p-4 truncate">
        <?= $anime->synopsis?>
    </div>
    <div class="p-2">
        <a class="bg-orange-300 p-2 rounded" href="/admin/anime/create/<?= $anime->mal_id?>">Create</a>
    </div>
</div>
<?= $this->endSection() ?>