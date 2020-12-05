<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class ProgramModel extends BaseModel
{
    protected $table      = 'sp_program';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Program';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","nama_program","uraian"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
