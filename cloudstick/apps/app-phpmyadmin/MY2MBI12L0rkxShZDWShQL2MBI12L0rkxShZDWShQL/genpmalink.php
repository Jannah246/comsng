<?php
$sapi_type = php_sapi_name();

if ($sapi_type == "cli") {
include getcwd()."/dbconnection.php";

  //generate new link

  $code = md5(uniqid(microtime()));
  $status = 'active';
  $accessData = array('token' => $code, 'status' => $status);
  $accessDataStr = json_encode($accessData);
  file_put_contents("accesstoken.php", $accessDataStr);
  $accessData = json_decode(file_get_contents("accesstoken.php"));
  echo DB_HOST."/MY2MBI12L0rkxShZDWShQL2MBI12L0rkxShZDWShQL/SIGNKi138z1t64D3gjJBGHL489ON.php?remote_token=".$accessData->{'token'}."\n";   

}else{
  echo "Sorry, I can not work on browser.";
}
?>
