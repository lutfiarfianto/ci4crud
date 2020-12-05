<?php

define('HASHIDS_LEN',10);
define('HASHIDS_STR','SmartPrivat');


function id_encode($id)
{
  $hashids = new \Hashids\Hashids(HASHIDS_STR,HASHIDS_LEN);
  return $hashids->encode($id);
}

function id_decode($id)
{
  $hashids = new \Hashids\Hashids(HASHIDS_STR,HASHIDS_LEN);
  return $hashids->decode($id)[0];
}
