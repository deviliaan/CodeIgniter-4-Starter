<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> <title>Document</title>
</head>
  <body>
    <header>
      <?= view_cell('App\Libraries\Navbar::show') ?>
    </header>
    <h1>Hello World</h1>
    <?= $this->renderSection('content') ?>
  </body>  
</html>