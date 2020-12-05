<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class MatakuliahModel extends BaseModel
{
    protected $table      = 'sp_mata_kuliah';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Matakuliah';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","nama_mata_kuliah","uraian"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
