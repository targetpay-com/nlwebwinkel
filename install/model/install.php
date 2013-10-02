<?php
class ModelInstall extends Model {
	public function mysql($data) {
		$db = new DB('mysql', $data['db_host'], $data['db_user'], $data['db_password'], $data['db_name']);
				
		$file = DIR_APPLICATION . 'opencart.sql';
		
		if (!file_exists($file)) { 
			exit('Kon SQL bestand niet laden: ' . $file); 
		}
		
		$lines = file($file);
		
		if ($lines) {
			$sql = '';

			foreach($lines as $line) {
				if ($line && (substr($line, 0, 2) != '--') && (substr($line, 0, 1) != '#')) {
					$sql .= $line;
  
					if (preg_match('/;\s*$/', $line)) {
						$sql = str_replace("DROP TABLE IF EXISTS `oc_", "DROP TABLE IF EXISTS `" . $data['db_prefix'], $sql);
						$sql = str_replace("CREATE TABLE `oc_", "CREATE TABLE `" . $data['db_prefix'], $sql);
						$sql = str_replace("INSERT INTO `oc_", "INSERT INTO `" . $data['db_prefix'], $sql);
						$sql = str_replace("INSERT IGNORE INTO `oc_", "INSERT IGNORE INTO `" . $data['db_prefix'], $sql);
						$sql = str_replace("UPDATE `oc_", "UPDATE `" . $data['db_prefix'], $sql);
						$sql = str_replace("DELETE FROM `oc_", "DELETE FROM `" . $data['db_prefix'], $sql);
						$sql = str_replace("TRUNCATE TABLE `oc_", "TRUNCATE TABLE `" . $data['db_prefix'], $sql);
						
						$db->query($sql);
	
						$sql = '';
					}
				}
			}
			
			$db->query("SET CHARACTER SET utf8");
	
			$db->query("SET @@session.sql_mode = 'MYSQL40'");
		
			$db->query("DELETE FROM `" . $data['db_prefix'] . "user` WHERE user_id = '1'");
		
			$db->query("INSERT INTO `" . $data['db_prefix'] . "user` SET user_id = '1', user_group_id = '1', username = '" . $db->escape($data['username']) . "', salt = '" . $db->escape($salt = substr(md5(uniqid(rand(), true)), 0, 9)) . "', password = '" . $db->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "', status = '1', email = '" . $db->escape($data['email']) . "', date_added = NOW()");

			$db->query("DELETE FROM `" . $data['db_prefix'] . "setting` WHERE `key` = 'config_email'");
			$db->query("INSERT INTO `" . $data['db_prefix'] . "setting` SET `group` = 'config', `key` = 'config_email', value = '" . $db->escape($data['email']) . "'");
			
			$db->query("DELETE FROM `" . $data['db_prefix'] . "setting` WHERE `key` = 'config_url'");
			$db->query("INSERT INTO `" . $data['db_prefix'] . "setting` SET `group` = 'config', `key` = 'config_url', value = '" . $db->escape(HTTP_OPENCART) . "'");
			
			$db->query("DELETE FROM `" . $data['db_prefix'] . "setting` WHERE `key` = 'config_encryption'");
			$db->query("INSERT INTO `" . $data['db_prefix'] . "setting` SET `group` = 'config', `key` = 'config_encryption', value = '" . $db->escape(md5(mt_rand())) . "'");
			
			$db->query("DELETE FROM `" . $data['db_prefix'] . "setting` WHERE `key` = 'ideal_rtlo'");
			$db->query("DELETE FROM `" . $data['db_prefix'] . "setting` WHERE `key` = 'mrcash_rtlo'");
			$db->query("DELETE FROM `" . $data['db_prefix'] . "setting` WHERE `key` = 'sofort_rtlo'");

			$db->query("INSERT INTO `" . $data['db_prefix'] . "setting` SET `group` = 'ideal', `key` = 'ideal_rtlo', value = '" . $db->escape(intval($data['rtlo'])) . "'");
			$db->query("INSERT INTO `" . $data['db_prefix'] . "setting` SET `group` = 'mrcash', `key` = 'mrcash_rtlo', value = '" . $db->escape(intval($data['rtlo'])) . "'");
			$db->query("INSERT INTO `" . $data['db_prefix'] . "setting` SET `group` = 'sofort', `key` = 'sofort_rtlo', value = '" . $db->escape(intval($data['rtlo'])) . "'");
			
			$db->query("INSERT INTO `" . $data['db_prefix'] . "setting` SET `group` = 'formfix', `key` = 'formfix_key', value = '" . $db->escape($data['formfix_key']) . "'");
			$db->query("INSERT INTO `" . $data['db_prefix'] . "setting` SET `group` = 'formfix', `key` = 'formfix_secret', value = '" . $db->escape($data['formfix_secret']) . "'");
							
			$db->query("UPDATE `" . $data['db_prefix'] . "product` SET `viewed` = '0'");
		}		
	}	
}
?>