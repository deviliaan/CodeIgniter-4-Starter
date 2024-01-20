<?php
namespace App\Controllers;

class Admin extends BaseController {
    public function recent() {
        return view("admin");
    }
}