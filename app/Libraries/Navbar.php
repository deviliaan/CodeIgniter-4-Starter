<?php
namespace App\Libraries;
class Navbar {
  public function show(): string
  {
    return view('components/navbar');
  }
}