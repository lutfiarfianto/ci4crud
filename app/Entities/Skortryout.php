<?php

namespace App\Entities;

class Skortryout
{
    protected $id;
	protected $mahasiswa_id;
	protected $judul_tryout_id;
	protected $semester;
	protected $waktu_tryout;
	protected $skor_tryout;


    public function __get($key)
    {
        if (property_exists($this, $key))
        {
            return $this->$key;
        }
    }

    public function __set($key, $value)
    {
        if (property_exists($this, $key))
        {
            $this->$key = $value;
        }
    }
}


/* End of file Skortryout.php */
/* Location: ./app/Entities/Skortryout.php */
