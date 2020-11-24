<?php

include 'db.php';

require_once('/usr/share/php/smarty/libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

//Array for menus
$SA_Menu = array (
  "Menu0" => "home",
  "Menu1" => "register",
  "Menu2" => "Login",
  "href" => "index.php",
);

//Array for form values
$SA_RForm = array (
  "ErrorTxt" => "",
  "Error" => -1,
  "isError" => 0,
  "Username" => "",
  "Email" => ""
);
?>