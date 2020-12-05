<?php 

namespace App\Models;

use CodeIgniter\Model;

class SkortryoutModel extends Model
{
    protected $table      = 'sp_skor_tryout';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Skortryout';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
		'id',
		'mahasiswa_id',
		'judul_tryout_id',
		'semester',
		'waktu_tryout',
		'skor_tryout',

    ];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function getAllowedFields()
    {
        return $this->allowedFields;
    }

	


}

/* End of file SkortryoutModel.php */
/* Location: ./app/Models/SkortryoutModel.php */
