<?php
namespace App\Controllers;

class Admin extends BaseController {
    public function recent() {
        $data = $this->fetchDataFromApi();
        return view("admin",['items'=>$data['data']]);
    }

    public function anime($slug){

        $info = $this->fetchAnimeInfo($slug);
        return view('singleAnime',['anime'=>$info]);
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