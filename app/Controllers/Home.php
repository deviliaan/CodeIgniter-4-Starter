<?php

namespace App\Controllers;
use App\Models\AnimeModel;
class Home extends BaseController
{
    public function index()
    {
        $anime = new AnimeModel();
        $res = $anime->orderBy('created_at','desc')->findAll();
        return view('home',['anime'=>$res]);
    }
}
