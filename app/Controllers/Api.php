<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnimeModel;
class Api extends BaseController
{
    public function index()
    {
        //
    }
    public function info($title)
    {
        $provider = new AnimeModel();
        $anime = $provider->getAnime($title);
        echo '<pre>';
        echo $anime;
    }
}
