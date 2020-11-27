<?php
include 'db.php';

$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
$Error = null;
if($db && !empty($_REQUEST))
  $Error = statement($db);

mysqli_close($db);

if($Error == 1)
  redirect("",$_REQUEST['Username'],$Error);
elseif($Error == 2)
  redirect("",$_REQUEST['Username'],$Error);
elseif($Error == 4)
  redirect($_REQUEST['Email'],$_REQUEST['Username'],$Error);
elseif($Error == -1) header("Location: register_success.php");
elseif($Error == null) header("Location: index.php");

function statement($db) {
  $Email = $_REQUEST['Email'];
  $Username = $_REQUEST['Username'];
  //Check Email
  $EmailState = checkEmail($db,$Email);
  if($EmailState !== -1)
    return $EmailState;
  
  //Check Passwords
  $PasswordState = checkPasswords($_REQUEST['Pwd'],$_REQUEST['CfmPwd']);
  if($PasswordState !== -1)
    return $PasswordState;

  //If everything is fine, hash password
  $hashedPwd = substr(md5($_REQUEST['Pwd']),0,32);
  //Prepate and ready to execute
  $insert = "INSERT INTO users (name,email,password_digest,created_at,updated_at) 
           VALUES ('$Username','$Email','$hashedPwd',NOW(),NOW())";
  if(!($result = @ mysql_query($insert,$db)))
   showerror();

  return -1;
}

function checkEmail($db,$Email) {

  $isEmail = false;
  $find1 = strpos($Email, '@');

  if($find1 !== false && $find1>0)
    $isEmail = true;
  else return 2;

  $query = "SELECT * FROM users WHERE email='$Email'";

  if(!($result = @ mysqli_query($query,$db))) 
   showerror();

  // vai buscar o resultado da query
  $nrows  = mysqli_num_rows($result);
  if($nrows > 0)
    return 1;
  return -1;;

}

function checkPasswords($Pwd,$CfmPwd) {
  if($Pwd == $CfmPwd)
    return -1;
  return 5;
}

function redirect($Email,$Username,$Error) {

    header("Location: register.php?Error=$Error&Email=$Email&Username=$Username");

}