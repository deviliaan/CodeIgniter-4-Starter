<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\HTTP\RequestTrait;

class Admin extends BaseController {
    public function index()
    {
        return view("admin-panel",['error'=>$this->session->getFlashdata('error')]); 
    }
    public function logout() {
        $this->session->remove('isLoggedin');
        $this->session->destroy();
        return redirect()->to('/');
    }
    public function auth()
    {
        $model = new UserModel();
        $user = $model->where('email',$_POST['username'])->find();
        if($user){
            $user = (object)$user[0];
            $usrname = $_POST['username'];
            $password = $_POST['password'];
            if($usrname == $user->email && $password == $user->password){
                $this->session->set('isLoggedin','true');
                return redirect()->to('/admin/recent');          
            } else {
                $this->session->setFlashdata('error', 'credentials missmatch');
                return redirect()->to('/admin-panel');
            }
        }else{
            $this->session->setFlashdata('error','No User Found');
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