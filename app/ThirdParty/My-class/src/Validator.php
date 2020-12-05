<?php

namespace Myclass;

class Validator 
{
  public function strong_password(string $str): bool 
  {

    if(strlen($str)<6 || preg_match('/[A-Z]/g',$str)){
      $error = 'password must have at least 6 character and 1 capital letter';
      return false;
    }

    return true;

  }
}



