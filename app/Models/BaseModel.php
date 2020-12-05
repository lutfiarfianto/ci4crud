<?php 

namespace App\Models;

use \CodeIgniter\Model;


class BaseModel extends Model
{

    protected $fieldsName;


    public function getAllowedFields()
    {
        return $this->allowedFields;
    }

    public function getAllFields($all=true)
    {
        $db = \Config\Database::connect();

        $fields = $db->getFieldNames($this->table);
        if(!$all){
            $except = ['created_at','updated_at','deleted_at','last_user_id'];
            array_walk($except, function( $v, $k) use(& $fields){
                foreach (array_keys($fields, $v) as $key) {
                    unset($fields[$key]);
                }
            });
        }
        return $fields;
    }

    public function setFieldsProp(& $data)
    {
        if(is_array($data)){
            foreach($data as $k => & $row){
                foreach($row->attributes as $fld => $value){
                    $row->$fld = $value;
                }
            }
    
        }
        if(is_object($data)){
            foreach($rows->attributes as $fld => $value){
                $data->$fld = $value;
            }
        }
        return $data;
    }

    public function getOld()
    {
        $fields = $this->getAllFields(false);

        $data = new $this->returnType;
        foreach($fields as $k=>$v){
            $data->$v = old($v);
        }
        return $data;
    }

    public function insertFaker(Array $fields, $number = 10 )
    {
        $faker = \Faker\Factory::create();

        $db = \Config\Database::connect();

    	for($i=0;$i<$number;$i++){

    		$data = [];

    		foreach ($fields as $fld => $fakerType) {
    			if(is_numeric($fakerType)){
    				$data[$fld] = $fakerType;
    			}else{
	    			$data[$fld] = $faker->$fakerType;
    			}
    		}

            $this->insert($data);
            
            echo "inserting #".($i+1)." of ".$number."\n";

    	}

    }


}

/* End of file MyModel.php */
/* Location: ./app/Models/MyModel.php */
