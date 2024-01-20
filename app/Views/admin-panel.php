<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
<div class="w-full flex h-[80dvh] justify-center items-center">
    <form class="flex flex-col gap-2" action="/admin-panel" method="post">
        <?php if(isset($error)){ ?>
            <?= $error?>
        <?php } ?>
        <input class="bg-slate-400 px-2 text-white" type="text" name="username">
        <input class="bg-slate-400 px-2 text-white" type="password" name="password">
        <button class="bg-orange-300 rounded py-2">Login</button>
    </form>
</div>
<?= $this->endSection() ?>