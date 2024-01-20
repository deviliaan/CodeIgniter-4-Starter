<?php
namespace App\Controllers;
use CodeIgniter\HTTP\RequestTrait;

class Admin extends BaseController {
    public function index()
    {
        return view("admin-panel");
    }
    public function auth()
    {
        return redirect()->to('/admin/recent');
    }

    public function recent() {
        $data = $this->fetchDataFromApi();
        return view("admin",['items'=>$data['data']]);
    }

    public function anime($slug){

        $info = $this->fetchAnimeInfo($slug);
        $anime = json_decode(json_encode($info['data'],FALSE));
        return view('singleAnime',['anime'=>$anime]);
    }
    function fetchDataFromApi() {
        $client = \Config\Services::curlrequest();
        try {
            $response = $client->get("https://api.jikan.moe/v4/watch/episodes");
            $data = json_decode($response->getBody(), true);
            return $data;
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    function fetchAnimeInfo($slug){
        $client = \Config\Services::curlrequest();
        try {
            $response = $client->get(getenv("API_END")."/anime/".$slug."/full");
            $data = json_decode($response->getBody(), true);
            return $data;
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}