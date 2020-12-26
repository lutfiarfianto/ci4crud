<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class MateriModel extends BaseModel
{
    protected $table      = 'sp_materi';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Materi';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","judul_materi","mata_kuliah_id","semester","uraian_ringkas","url_thumbnail","url_video","url_pdf","pengajar"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
