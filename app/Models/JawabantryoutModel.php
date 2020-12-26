<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class JawabantryoutModel extends BaseModel
{
    protected $table      = 'sp_jawaban_soal_tryout';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Jawabantryout';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","siswa_id","judul_tryout_id","lembar_tryout_id","soal_tryout_id","jawaban_pilihan","skor_pilihan","jawaban_esay","skor_esay"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
