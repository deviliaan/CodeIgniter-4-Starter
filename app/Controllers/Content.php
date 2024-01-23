<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnimeModel;
class Content extends BaseController
{
    
    public function single($id)
    {
        $provider = new AnimeModel();
        $anime = $provider->where('id',$id)->find();
        $anime = json_decode(json_encode($anime[0],FALSE));
        return view('content',['anime'=>$anime]);
    }
}
