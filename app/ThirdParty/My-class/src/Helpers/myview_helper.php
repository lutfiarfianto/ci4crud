<?php

/**
 * **Row Number**
 * 
 * ---
 * 
 * params:
 * 
 * - $paging_data = {current_page: ?, per_page: ?}
 * - $idx = row index 
 * 
 */
function row_num($per_page,$idx)
{
  $pager = \Config\Services::pager();
  $current_page = $pager->getCurrentPage();
  echo ($current_page-1)*$per_page+$idx+1;
}


function force_redirect($url)
{
  header('Location: '.$url);
  exit;
}


function refine_var($var)
{
  return preg_replace('/([[:punct:]]+)+/m','',$var);
}

function sidebar_item(array $option){

  $has_child = false;
  $html_child = '';
  $css_arrow = '';

  extract($option);

  if($has_child){
    $html_child = "
    <ul aria-expanded=\"false\" class=\"collapse  first-level\">
    ";
    $css_arrow = "has-arrow";
    $link = "javascript:void();";
  }

  return "
  <li class=\"sidebar-item\">
    <a class=\"sidebar-link waves-effect waves-dark sidebar-link {$css_arrow}\" href=\"{$link}\" aria-expanded=\"false\">
        <i class=\"{$icon}\"></i>
        <span class=\"hide-menu\">{$caption}</span>
    </a>
    {$html_child}
  </li> ";

}

function sidebar_child_close()
{
  return "</ul>";
}


