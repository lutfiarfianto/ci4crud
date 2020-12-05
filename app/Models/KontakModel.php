<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class KontakModel extends BaseModel
{
    protected $table      = 'sp_kontak';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Kontak';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
		'id',
		'nama_kontak',
		'no_hp',
		'email',
    ];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
