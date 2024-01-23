<?php
namespace App\Controllers;
use App\Models\AnimeModel;
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

    public function create($slug) {
        $model = new AnimeModel();
        $info = $this->fetchAnimeInfo($slug);
        $info = json_decode(json_encode($info['data']), FALSE);
        if($info){
            $data = [
                'title'=> $info->title,
                'genre'=> json_encode($info->genres,true),
                'type'=>$info->type,
                'image'=>$info->images->jpg->image_url,
                'latest_episode'=> $info->episodes,
                'year'=> $info->year,
                'story'=> $info->synopsis,
            ];
            $res = $model->insert($data);
            if($res){
                return redirect()->to('/admin/recent');
            }else{
                return redirect()->to('/admin/recent');
            }
        }
    }
    public function recent() {
        $data = $this->fetchDataFromApi();
        $items = json_decode(json_encode($data), FALSE);
        return view("admin",['items'=>$items]);
    }

    public function anime($slug){

        $info = $this->fetchAnimeInfo($slug);
        $anime = json_decode(json_encode($info['data'],FALSE));
        return view('singleAnime',['anime'=>$anime]);
    }
    function fetchDataFromApi() {
        $client = \Config\Services::curlrequest();
        try {
            $response = $client->get("https://anime-api.xyz/page-1");
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