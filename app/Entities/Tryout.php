<?php

namespace App\Entities;

use \CodeIgniter\Entity;

class Tryout extends Entity
{

    public $status_tryout_array = ["draft"=>"Draft","publikasi"=>"Publikasi","arsip"=>"Arsip"];

	public $tipe_tryout_array = ["*"=>"Select Tipe Tryout","ganda"=>"Pilihan Ganda","esai"=>"Esai"];

}


/* End of file Tryout.php */
/* Location: ./app/Entities/Tryout.php */
