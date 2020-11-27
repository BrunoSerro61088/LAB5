<?php

include 'db.php';
require_once('/usr/share/php/smarty/libs/Smarty.class.php');


$smarty = buildSmarty();

//Array for menus
$Menus = array (
  "Menu0" => "home",
  "Menu1" => "login",
  "Menu2" => "register",
  "href0" => "index.php",
  "href1" => "register.php",
);

//Array for form values
$Form_V = array (
  "ErrorTxt" => "",
  "Error" => -1,
  "isError" => 0,
  "Username" => "",
  "Email" => ""
);

$Form_V = checkREQUEST($Form_V);
smartyAssign($Menus,$Form_V,$smarty);
smartyDisplay($smarty);

function checkREQUEST($Form_V) {

  if(isset($_REQUEST['Error'])) {
    $Form_V = fillCorrect($Form_V);
    $Form_V = errorCase($Form_V);
  } else { $Form_V['Error']=0; }

  return $Form_V;
}

function errorCase($Form_V) {
  
  switch ($Form_V['Error']) {
    case 0:
        //Este erro nao deve aperecer pois o HTML pede todos os campos
        $Form_V['ErrorTxt'] = "Todos os campos devem ser preenchidos";
        break;
    case 1:
        $Form_V['ErrorTxt'] = "Email já se econtra registado";
        break;
    case 2:
        $Form_V['ErrorTxt'] = "Email tem formato incorrecto";
        break;
    case 4:
        //Este erro nao deve aperecer pois o HTML pede todos os campos
        $Form_V['ErrorTxt'] = "Password em branco";
        break;
    case 5:
        $Form_V['ErrorTxt'] = "Passwords não coincidem";
        break;
  }

  $Form_V['isError'] = 1;
  return $Form_V;
}

function fillCorrect($Form_V){

  foreach ($_REQUEST as $key => $value) {
    $Form_V[$key] = $value;
  }
  return $Form_V;
}

function buildSmarty(){

  $smarty = new Smarty();

  $smarty->template_dir = 'templates';
  $smarty->compile_dir = 'templates_c';
  $smarty->cache_dir = 'cache';
  $smarty->config_dir = 'configs';
  return $smarty;

}

function smartyAssign($Menus,$Form_V,$smarty) {

  foreach ($Menus as $key => $value) {
    $smarty->assign($key,$value);
  }

  $smarty->assign('UserName',$Form_V['Username']);
  $smarty->assign('Email',$Form_V['Email']);
  $smarty->assign('isError',$Form_V['isError']);
  $smarty->assign('Error',$Form_V['ErrorTxt']);

  $smarty->assign('pwd',"");
  $smarty->assign('pwd_cf',"");
  
}

function smartyDisplay($smarty) {
  // Mostra a tabela
  $smarty->display('templates/register_template.tpl');
}
?>