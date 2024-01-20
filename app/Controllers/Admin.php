<?php
namespace App\Controllers;
use CodeIgniter\HTTP\RequestTrait;

class Admin extends BaseController {
    public function index()
    {
        if($this->session->has('error')){
            return view('admin-panel',['error'=>$this->session->get('error')]);
        }else{
            
            return view("admin-panel");
        }
        
    }
    public function auth()
    {
        $usrname = $_POST['username'];
        $password = $_POST['password'];
        if($usrname == 'Admin' && $password == 'Kousick12345@'){
            $this->session->set('isLoggedin','true');
            return redirect()->to('/admin/recent');          
        }else{
            $this->session->set('error','credential missmatch');
            return redirect()->to('/admin-panel');
        }
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