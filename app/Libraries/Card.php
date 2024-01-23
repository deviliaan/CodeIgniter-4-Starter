<?php
namespace App\Libraries;

class Card {
    public function show($anime,$isAdmin) {
        $anime = json_decode(json_encode($anime,FALSE));
        return view('components/card',['anime'=>$anime,'isAdmin'=>$isAdmin]);
    }
}