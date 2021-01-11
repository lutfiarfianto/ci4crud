<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

class ProfilModel extends BaseModel
{
    protected $table      = 'sp_siswa';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Profil';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["id","nama_siswa","alamat_siswa","kota_siswa","fakultas_siswa","jurusan_siswa","angkatan_siswa","ho_hp_siswa","nama_orang_tua","alamat_orang_tua","no_hp_orang_tua"];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


	



}

/* End of file KontakModel.php */
/* Location: ./app/Controllers/Admin/KontakModel.php */
