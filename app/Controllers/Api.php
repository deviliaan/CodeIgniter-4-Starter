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
        $anime = $provider->where("title", $title)->first();
        if(empty($anime)) {
            $status = array('code'=>404);
            header("Content-Type: application/json");
            echo json_encode($status);
        }else{
            header("Content-Type: application/json");
            echo json_encode($anime);
        }
    }
}
