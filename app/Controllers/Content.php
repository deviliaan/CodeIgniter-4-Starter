<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Content extends BaseController
{
    
    public function single($id)
    {
        return view('content',['id'=>$id]);
    }
}
