<?php

namespace Myclass\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use CodeIgniter\CLI\CLI;

use HJSON\HJSONParser;
use HJSON\HJSONStringifier;


class Xtable extends BaseController 
{
  public function __construct()
  {
    # code...
  }

  public function run()
  {
    $table = CLI::prompt("Type table name: ");

    $db = \Config\Database::connect();

    if($db->tableExists($table)){
      $fields = $db->getFieldData($table);

      $data = [];
      foreach ($fields as $key => $field) {
        $data[$field->name] = [
          'name' => $field->name,
          'type' => $field->type,
          'pk'   => $field->primary_key,
          'input_type' => $field->primary_key?"hidden":"text",
          'label' => $this->makeLabel($field->name),
          'placeholder' => $this->makeLabel($field->name),
          'show' => 1,
          'ordering' => $key,
        ] ;       
      }

      $stringifier = new HJSONStringifier;
      $text = $stringifier->stringify($data);

      file_put_contents(__DIR__.'/../../data/'.$table.'_table.hjson');
      CLI::write('Config data from table: '. $table.' created');

    }else{
      CLI::write("Table: ". $table ." not exists.","red");
    }

  }

  protected function makeLabel($field_name)
  {
    return ucwords( str_ireplace("_"," ",$field_name));
  }

}
