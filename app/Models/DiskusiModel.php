<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class DiskusiModel extends BaseModel
{
    protected $table      = 'sp_diskusi';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Diskusi';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","judul_diskusi","parent_id","tipe_diskusi","comment","gambar_soal","rating_soal","user_id","publishing"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
