<?php

function configuracion_menu($pagina = ''){
$menu = array();
    $menu_item = array();
        $sub_menu_item = array();

//Opcion Dashboard

$menu_item['is_active'] = ($pagina == 'dashboard') ? true : false ;
$menu_item['href'] = './dashboard.php';
$menu_item['icon'] = 'fas fa-circle';
$menu_item['text'] = 'Dashboard';
$menu_item['submenu'] = array();
$menu['dashboard'] = $menu_item;

//Opcion Multilevel
$menu_item['is_active'] = ($pagina == '') ? true : false ;
$menu_item['href'] = '#';
$menu_item['icon'] = 'fas fa-circle';
$menu_item['text'] = 'Level 1';
$menu_item['submenu'] = array();


//Subopción Menú
$sub_menu_item = array();
$sub_menu_item['is_active'] = ($pagina == '') ? true : false ;
$sub_menu_item['href'] = '';
$sub_menu_item['icon'] = 'fas fa-circle';
$sub_menu_item['text'] = 'Level 1-1';
$menu_item['submenu']["level1_1"] = $sub_menu_item;


//Subopción Menú
$sub_menu_item = array();
$sub_menu_item['is_active'] = ($pagina == '') ? true : false ;
$sub_menu_item['href'] = '';
$sub_menu_item['icon'] = 'fas fa-circle';
$sub_menu_item['text'] = 'Level 1-2';
$menu_item['submenu']["level 1_2"] = $sub_menu_item;

$menu['level 1'] = $menu_item;

return $menu;

}

function mostrar_menu_lateral($pagina = ''){
    $menu = configuracion_menu($pagina);
//print("<pre>".print_r($menu, true)."</pre>");

$html = '<li class="nav-header text-center">==== TIPO DE ROL ==== </li>';
foreach($menu as $item){
if($item['href'] != "#"){
$html.= '
 <li class="nav-item">
            <a href="'.$item["href"].'" class="nav-link '.($item["is_active"] ? "active" : "" ).'">
              <i class="'.$item["icon"].' nav-icon"></i>
              <p>'.$item["text"].'</p>
            </a>
          </li>
';
}
else{
    if(sizeof($item['submenu']) > 0){
        $html.='
        <li class="nav-item">
            <a href="#" class="nav-link'.($item ["is_active"] ? "menu-is-opening menu-open" : "" ).'">
              <i class="nav-icon '.$item["icon"].'"></i>
              <p>
                '.$item["text"].'
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">';
              foreach ($item['submenu'] as $item_submenu){
                $html.='
                <li class="nav-item">
                <a href="'.$item_submenu["href"].'" class="nav-link'.($item_submenu["is_active"] ? "active" : "" ).'">
                  <i class="'.$item_submenu["icon"].' nav-icon"></i>
                  <p>'.$item_submenu["text"].'</p>
                </a>
              </li>
                ';
              }
            $html.='</ul>
          </li>
       ';
    }
}
}
  return $html;
    
}