<?php 
  $db = \Config\Database::connect();
?>

<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
<div class="container bg-slate-800">
    <div class="">
      <?php
        $query = $db->query('SELECT title FROM animes');
        $result = $query->getResult();
        echo '<pre>';
        print_r($result);
      ?>
      wellcome to codeigniter
    </div>
</div>
<?= $this->endSection()?>