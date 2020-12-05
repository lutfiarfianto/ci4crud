<?php

namespace App\Entities;

class Pengajar
{
    protected $id;
    protected $field_name;

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


/* End of file Pengajar.php */
/* Location: ./app/Entities/Pengajar.php */
