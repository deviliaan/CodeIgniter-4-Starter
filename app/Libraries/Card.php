<?php
namespace App\Libraries;

class Card {
    public function show($anime) {
        return view('components/card',['anime'=>$anime]);
    }
}