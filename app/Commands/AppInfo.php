<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class AppInfo extends BaseCommand
{
    protected $group       = 'demo';
    protected $name        = 'app:info';
    protected $description = 'Displays basic application information.';

    protected $usage = 'app:info [foo] [bar]';
    protected $arguments = [
      'foo' => 'the foo content',
      'bar' => 'my bar content',
    ];


    public function run(array $params)
    {

      $this->arguments['foo'] = CLI::prompt('foo');
      $this->arguments['bar'] = CLI::prompt('bar');

      print_r($this->arguments);
      print_r($params);
    }
}