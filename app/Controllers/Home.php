<?php

namespace App\Controllers;
use App\Models\AnimeModel;
class Home extends BaseController
{
    public function index()
    {
        $animes = new AnimeModel();
        $res = $animes->orderBy('created_at','desc')->findAll();
        return view('home',['animes'=>$res]);
    }
}
