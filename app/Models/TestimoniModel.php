<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class TestimoniModel extends BaseModel
{
    protected $table      = 'sp_testimoni';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Testimoni';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","user_id","testimoni","saran","kritik","post_status"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
