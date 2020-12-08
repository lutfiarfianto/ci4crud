<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class JadwalkelasModel extends BaseModel
{
    protected $table      = 'sp_jadwal_kelas';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Jadwalkelas';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","nama_jadwal","uraian","tanggal_jam","mata_kuliah_id","ruang","tautan_daring"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
