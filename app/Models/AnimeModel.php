<?php
namespace App\Models;
use CodeIgniter\Model;
class AnimeModel extends Model
{
    protected $table = "animes";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $useTimeStamps = false;
    protected $dateFormat = "datetime";
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected function initialize(): void
    {
        $this->allowedFields = ["title","genre","type","image","latest_episode","year","story",];

    }
}