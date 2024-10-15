<?php
include getcwd()."/dbconnection.php";  
/* Use cookies for session */
ini_set('session.use_cookies', 'true');
/* Change this to true if using phpMyAdmin over https */
$secure_cookie = false;
/* Need to have cookie visible from parent directory */
session_set_cookie_params(0, '/', '', $secure_cookie, true);

/* Need to have cookie visible from parent directory */
//session_set_cookie_params(0, '/', '', true, true);

/* Create signon session */
$session_name = 'SignonSession';
session_name($session_name);
// Uncomment and change the following line to match your $cfg['SessionSavePath']
// session_save_path('');
@session_start();

if (isset($_GET['logout'])) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 86400, $params["path"], $params["domain"], $params["secure"], $params["httponly"] );
  session_destroy();
  header('Location: ../index.php');
  //return;
  exit;
}

/* Was data posted? */
if (isset($_GET['remote_token']) || isset($_COOKIE['remote_token'])) { 

    $token = ( isset($_GET['remote_token']) ? $_GET['remote_token'] : $_COOKIE['remote_token']);
    
    $accessData = json_decode(file_get_contents("accesstoken.php"));
	if($token == $accessData->{'token'} && $accessData->{'status'} == 'active'){
		
		$status = 'expired';
		$accessData = array('token' => $accessData->{'token'}, 'status' => $status);
  		$accessDataStr = json_encode($accessData);
  		file_put_contents("accesstoken.php", $accessDataStr);

  		/* Store there credentials */
    	$_SESSION['PMA_single_signon_user'] = DB_USER;
    	$_SESSION['PMA_single_signon_password'] = DB_PASS;
    	/* Update another field of server configuration */
    	$_SESSION['PMA_single_signon_cfgupdate'] = array('verbose' => 'Signon');
    	$id = session_id();
    	/* Close that session */
    	@session_write_close();

    	setcookie($session_name, $id , 0, "/");

    	/* Redirect to phpMyAdmin (should use absolute URL here!) */
    	header('Location: ../index.php');
    	// echo 'DONE';
	}else{
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 86400, $params["path"], $params["domain"], $params["secure"], $params["httponly"] );
        session_destroy();
        header('Location: ../index.php');
        //return;
        exit;
	}
} else {
    /* Show simple form */
    header('Content-Type: text/html; charset=utf-8');
    echo '<?xml version="1.0" encoding="utf-8"?>' , "\n";
    ?>
    <!DOCTYPE HTML>
    <html lang="en" dir="ltr">
    <head>
    <link rel="icon" href="../favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
    <meta charset="utf-8" />
    <title>phpMyAdmin single signon</title>
    </head>
    <body>
		<h1>403</h1>
		<div><p>> <span>ERROR CODE</span>: "<i>HTTP 403 Forbidden</i>"</p>
		<p>> <span>ERROR DESCRIPTION</span>: "<i>Access Denied. You Do Not Have The Permission To Access This Page On This Server</i>"</p>
		</div>
 </body>
 </html>
 <style lang="scss">
@import url("https://fonts.googleapis.com/css?family=Share+Tech+Mono|Montserrat:700");
* {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
    box-sizing: border-box;
    color: inherit;
}

body {
    background-image: white;
    height: 100vh;
}

h1 {
    font-size: 45vw;
    text-align: center;
    position: fixed;
    width: 100vw;
    z-index: 1;
    color: rgb(224, 223, 223);
    text-shadow: 0 0 50px rgba(0, 0, 0, 0.07);
    top: 50%;
    transform: translateY(-50%);
    font-family: "Montserrat", monospace;
}

div {
    background: rgba(0, 0, 0, 0);
    width: 70vw;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    margin: 0 auto;
    padding: 30px 30px 10px;
    /* box-shadow: 0 0 150px -20px rgba(0, 0, 0, 0.5); */
    z-index: 3;
}

P {
    font-family: "Share Tech Mono", monospace;
    /* color: #f5f5f5; */
    margin: 0 0 20px;
    font-size: 17px;
    line-height: 1.2;
}

span {
    color: #f0c674;
}

i {
    color: #8abeb7;
}

div a {
   text-decoration: none;
}

b {
    color: #81a2be;
}
 </style>
    <?php
}
?>
