<?php 

namespace App\Models;

use CodeIgniter\Model;

class PengajarModel extends Model
{
    protected $table      = 'sp_pengajar';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Pengajar';
    protected $useSoftDeletes = true;

    protected $allowedFields = [];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    


}

/* End of file PengajarModel.php */
/* Location: ./app/Models/PengajarModel.php */
