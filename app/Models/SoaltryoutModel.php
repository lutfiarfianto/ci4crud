<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class SoaltryoutModel extends BaseModel
{
    protected $table      = 'sp_soal_tryout';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Soaltryout';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","soal","judul_tryout_id","no_soal","gambar_soal","jawaban_a","jawaban_b","jawaban_c","jawaban_d","gambar_a","gambar_b","gambar_c","gambar_d","jawaban_soal_ganda","jawaban_soal_esay","pembahasan_jawaban","gambar_pembahasan_jawaban"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
