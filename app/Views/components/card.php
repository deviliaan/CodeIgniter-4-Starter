<a href="/" class="border border-orange-300 h-full">
    <img class="h-[80%] object-cover w-full" src="<?= $isAdmin?$anime['images']['jpg']['image_url']: $anime['image']; ?>"/>
    <div class="px-2 w-full">
        <h2 class="truncate text-sm"><?= $anime['title'];?></h2>
        <span class="truncate text-sm">Type: <?= $isAdmin? '' : $anime['type'];?></span>
    </div>
</a>