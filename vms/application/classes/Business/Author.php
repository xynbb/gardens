<?php
/**
 * 业务逻辑类 —— 登录
 */
class Business_Author extends Business {
	
	public function login($name, $password) {
		$logined = FALSE;
		try {
			$ldaplogined = Author::instance()->ldapLogin($name, $password);
			if($ldaplogined) {
				$logined = $ldaplogined;
			} else {
				$locallogined = Author::instance()->localLogin($name, $password);
				if($locallogined) {
					$logined = $locallogined;
				}
			}
		} catch(Exception $e) {
			Logger::write($e->getMessage());
			return $e->getMessage();
		}
		
		if($logined) {
			$name = Author::name();
			
			if($ldaplogined) {
				Logger::write($name.' LDAP登录成功');
			} else {
				Logger::write($name.' Local登录成功');
			}
			return TRUE;
		} else {
			Logger::write('登录失败');
			return FALSE;
		}
	}
	
	public function logout() {
		try {
			$name = Author::name();
			$return = Author::instance()->logout();
			if($return) {
				Logger::write($name.' 退出登录');
				return TRUE;
			}
		} catch(Author_Exception $e) {
			return $e->getMessage();
		}
	}
	
}