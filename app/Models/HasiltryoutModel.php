<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class HasiltryoutModel extends BaseModel
{
    protected $table      = 'sp_lembar_tryout';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Hasiltryout';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","siswa_id","judul_tryout_id","semester","tanggal_jam_tryout","skor_tryout"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
