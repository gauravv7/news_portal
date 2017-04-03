<?php

// response json
$json = array();

/**
 * Registering a user device
 * Store reg id in users table
 */
if (isset($_POST["name"]) && isset($_POST["regId"])) {
    $name = $_POST["name"];
    $gcm_regid = $_POST["regId"]; // GCM Registration ID
    // Store user details in db
    include_once './db_functions.php';
    include_once './GCM.php';

    $db = new DB_Functions();
    $gcm = new GCM();

    $res = $db->storeUser($name, $gcm_regid);

    $registatoin_ids = array($gcm_regid);
    $message = array("product" => "shirt");

    $result = $gcm->send_notification($registatoin_ids, $message);

    echo $result;
} else if(isset($_POST['action'])&&isset($_POST['regId'])){
    // user details missing
	$act = $_POST['action'];
	$id = trim($_POST['regId']);
	
	if(strcasecmp($act,"unregister")==0){
		    // Store user details in db
		include_once './db_functions.php';
		include_once './GCM.php';
		$db = new DB_Functions();
		$result = $db->delUserByID($id);
	}
}
?>