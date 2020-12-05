<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class TryoutModel extends BaseModel
{
    protected $table      = 'sp_judul_tryout';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Tryout';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","judul_tryout","waktu_tryout","semester","mata_kuliah_id","status_tryout","tipe_tryout"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
