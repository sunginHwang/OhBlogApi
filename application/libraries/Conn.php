<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conn
{

	/*
	* 교적 데이타 베이스 접속
	*/
	function database_kyo($churchCode,$force = false) {

		$CI =& get_instance();

		if($force === false &&  isset($CI->kdb) && is_object($CI->kdb) ){
			return $CI->kdb;
		}

		if($churchCode == ''){
			echo('교회코드가 전달되지 않았습니다. 에러코드 : 102');
			return null;
		}

		$config = array(
			'dsn'	=> '',
			'hostname' => 'storage.qfun.kr',
			'username' => "ohjicweb",
			'password' => "dhwlrrhkfh1!",
			'database' => "kyo".$churchCode,
			'dbdriver' => 'mysqli',
			'dbprefix' => '',
			'pconnect' => FALSE,
			'db_debug' => (ENVIRONMENT !== 'production'),
			'cache_on' => FALSE,
			'cachedir' => '',
			'char_set' => 'utf8',
			'dbcollat' => 'utf8_general_ci',
			'swap_pre' => '',
			'encrypt' => FALSE,
			'compress' => FALSE,
			'stricton' => FALSE,
			'failover' => array(),
			'save_queries' => TRUE
		);

		$CI->kdb = $CI->load->database($config, TRUE);

		return $CI->kdb;
	}

	function database_msdb($force = false) {

		$CI =& get_instance();


		$config = array(
			'dsn'	=> '',
			'hostname' => 'dimode',
			'username' => "ohjic",
			'password' => "dhwlr22",
			'database' => '',
			'dbdriver' => 'odbc',
			'dbprefix' => '',
			'pconnect' => FALSE,
			'db_debug' => (ENVIRONMENT !== 'production'),
			'cache_on' => FALSE,
			'cachedir' => '',
			'char_set' => 'utf8',
			'dbcollat' => 'utf8_general_ci',
			'swap_pre' => '',
			'encrypt' => FALSE,
			'compress' => FALSE,
			'stricton' => FALSE,
			'failover' => array(),
			'save_queries' => TRUE
		);

		$CI->msdb = $CI->load->database($config, TRUE);
	}

	function database_mswdb($force = false) {

		$CI =& get_instance();


		$config = array(
			'dsn'	=> '',
			'hostname' => 'ex_dimode',
			'username' => "ohjic",
			'password' => "dhwlr22",
			'database' => "dimode",
			'dbdriver' => 'odbc',
			'dbprefix' => '',
			'pconnect' => FALSE,
			'db_debug' => (ENVIRONMENT !== 'production'),
			'cache_on' => FALSE,
			'cachedir' => '',
			'char_set' => 'utf8',
			'dbcollat' => 'utf8_general_ci',
			'swap_pre' => '',
			'encrypt' => FALSE,
			'compress' => FALSE,
			'stricton' => FALSE,
			'failover' => array(),
			'save_queries' => TRUE
		);

		$CI->mswdb = $CI->load->database($config, TRUE);
	}


}