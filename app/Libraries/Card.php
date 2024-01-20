<?php
namespace App\Libraries;

class Card {
    public function show($anime,$isAdmin) {
        return view('components/card',['anime'=>$anime,'isAdmin'=>$isAdmin]);
    }
}