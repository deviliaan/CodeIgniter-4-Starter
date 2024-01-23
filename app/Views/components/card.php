<a href="<?= $isAdmin? '#':'/content/anime/'.$anime->id ?>" class="border border-orange-300" id="card">
    <img class="h-[80%] object-cover w-full" src="<?= $isAdmin? $anime->thumbnail: $anime->image; ?>"/>
    <div class="px-2 w-full">
        <h2 class="truncate text-sm" id="title"><?= $anime->title;?></h2>
        <h2 id="val"></h2>
        <span class="truncate text-sm">Type: <?= $anime->type;?></span>
    </div>
</a>
<script src="/js/card.js"></script>