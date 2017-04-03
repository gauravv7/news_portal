<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $gcm_regid) {
        echo "hi";
	 $result = mysql_query("SELECT * FROM gcm_users WHERE name LIKE '$name'") or die(mysql_error());
		// return user details
		if($result!=false)
		if (!(mysql_num_rows($result) > 0)) {
			// insert user into database
			echo "2";
			$get_uid = mysql_query("SELECT uid from customer WHERE login_id LIKE '$name'");
			if(mysql_num_rows($get_uid) > 0){
				$res = mysql_fetch_array($get_uid);
				$uid = $res[0];
				
				$result = mysql_query("INSERT INTO gcm_users(uid, name, gcm_regid, created_at) VALUES('$uid', '$name', '$gcm_regid', NOW())");
				// check for successful store
				if ($result) {
					// get user details
					$id = mysql_insert_id(); // last inserted id
					$result = mysql_query("SELECT * FROM gcm_users WHERE id = '$id'") or die(mysql_error());
					// return user details
					if (mysql_num_rows($result) > 0) {
						return mysql_fetch_array($result);
					} else {
						return false;
					}
				} else {
					return false;
				}
			}
		} else{
			$get_id = mysql_query("SELECT id FROM gcm_users WHERE name like '$name' ORDER BY id ASC LIMIT 1");
			$get_uid = mysql_query("SELECT uid from customer WHERE login_id LIKE '$name'");
			if( (mysql_num_rows($get_id) > 0) && (mysql_num_rows($get_id) > 0)){
				$res1 = mysql_fetch_array($get_id);
				$id = $res1[0];
				$res2 = mysql_fetch_array($get_uid);
				$uid = $res2[0];
				
				echo $id;
				$result = mysql_query("UPDATE gcm_users SET gcm_regid = '$gcm_regid', created_at = NOW(), uid = '$uid' WHERE id = '$id'");
			}
		}
    }

    /**
     * Get user by name
     */
    public function getUserByName($name) {
        $result = mysql_query("SELECT * FROM gcm_users WHERE name = '$name' LIMIT 1");
        return $result;
    }
    /**
     * Get user by uid
     */
    public function getUserByUID($id) {
        $result = mysql_query("SELECT * FROM gcm_users WHERE uid = '$id' LIMIT 1");
        return $result;
    }
	
    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysql_query("select * FROM gcm_users");
        return $result;
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT name from gcm_users WHERE name = '$name'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }
	
	public function delUserByID($id){
	    $result = mysql_query("DELETE FROM gcm_users WHERE gcm_regid = '$id'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
	}

}

?>