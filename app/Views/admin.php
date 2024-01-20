<?= $this->extend('layouts/default');?>
<?= $this->section('content') ?>
<div class="w-full">
    <div class="w-full">
        <div class="grid grid-cols-2 w-full">
           <?php
                echo '<pre>';
                foreach($items as $item){
                    echo view_cell('App\Libraries\Card::show',['anime'=>$item['entry'],'isAdmin'=>true]);
                }
            ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>