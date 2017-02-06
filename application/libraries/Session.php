<?
class Session
{
	var $userdata;
	var $CI;
	private $dbUserName;
	private $dbPassword;
	function __construct(){
		$this->CI = & get_instance();
		$this->dbUserName = $this->CI->db->username;
		$this->dbPassword = $this->CI->db->password;
		ini_set('session.save_handler', 'user');
		$session = new Session2($this->CI->config->config, $this->dbUserName, $this->dbPassword);
		$this->userdata = $_SESSION;
	}


	function set_userdata($key, $val=NULL){
		if(is_array($key) && is_null($val)){
			foreach($key as $name=>$val){
				$_SESSION[$name] = $val;
			}
		}
		else if(is_string($key)){
			$_SESSION[$key] = $val;
		}
		$this->userdata = $_SESSION;
	}

	function unset_userdata($key){
		$type= gettype($key);
		if($type == 'string'){
			unset($_SESSION[$key]);
		}
		else if($type == 'array'){
			foreach($key as $name=>$val){
				unset($_SESSION[$name]);
			}
		}
		unset($this->userdata);
		$this->userdata = $_SESSION;
	}


	function userdata($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}
		else return NULL;
	}

	function all_userdata()
	{
		return $_SESSION;
	}

	function sess_destroy() {
		session_destroy();
	}
}



class Session2
{
	var $session_id;
	var $cookie_name;
	var $cookie_domain;
	var $expiration	=	43200;	// 12시간 (timestamp)
	var $ip_address;
	var $db_table_name;
	private $_sess_db;
	private $dbUserName;
	private $dbPassword;

	function __construct($config, $dbUserName, $dbPassword){
		// 세션 키 저장 쿠키 관련
		$this->cookie_name = $config['sess_cookie_name'];
		$this->cookie_domain = $config['cookie_domain'];
		$this->db_table_name = $config['sess_table_name'];
		$this->dbUserName = $dbUserName;
		$this->dbPassword = $dbPassword;
		if(isset($config['sess_expiration'])){
			$this->expiration = $config['sess_expiration'];
		}
		if(isset($_SERVER['REMOTE_ADDR']))
			$this->ip_address = $_SERVER['REMOTE_ADDR'];
		else
			$this->ip_address = '0.0.0.0';

		session_set_cookie_params(0, "/", $this->cookie_domain);
		ini_set("session.cookie_domain", $this->cookie_domain);
		ini_set('session.name', $this->cookie_name);
		session_set_save_handler(array($this, 'on_session_start'),
			array($this, 'on_session_end'),
			array($this, 'on_session_read'),
			array($this, 'on_session_write'),
			array($this, 'on_session_destroy'),
			array($this, 'on_session_gc'));

		session_start();

//		$this->session_id = $_COOKIE[$this->cookie_name];


	}

	public function on_session_start($save_path, $session_name) {
		// DB 연결
		if ($this->_sess_db = mysqli_connect("127.0.0.1",$this->dbUserName,$this->dbPassword,"ReactBoard")) {
			mysqli_query($this->_sess_db,"set names utf8");

			return true;
		}
		return false;
	}

	public function on_session_end() {
		return mysqli_close($this->_sess_db);
	}

	public function on_session_read($key) {
		$this->session_id = $key;
		if(isset($_GET['session_key_special']) && strlen($_GET['session_key_special']) > 0)
		{
			$this->session_id = $_GET['session_key_special'];
			setcookie($this->cookie_name, $this->session_id, time()+$this->expiration, '/', 'ohjic.qfun.kr');
		}
		else if(isset($_GET['session_key']))
		{
			$this->session_id = $_GET['session_key'];
			setcookie($this->cookie_name, $this->session_id, time()+$this->expiration, '/', 'ohjic.qfun.kr');
		}
		else if(!isset($_COOKIE[$this->cookie_name])){
			setcookie($this->cookie_name, $key, $this->expiration);
		}
		// $key 는 시스템에서 기본적으로 제공 하고 만들어주는 session_id
		$stmt = "select user_data from `ReactBoard`.`%s`
				where session_id ='%s'
					and `session_expiration` >= unix_timestamp(now())";
		$stmt = sprintf($stmt, $this->db_table_name, $this->session_id, $this->ip_address);
		$sth = mysqli_query($this->_sess_db,$stmt);

		if($sth)
		{
			$row =mysqli_fetch_assoc($sth);
			$val=$row['user_data'];
			// 종료기간 연장
			$expiration = $this->expiration + time();
			$sql = sprintf("UPDATE `%s` SET `session_expiration` = '%d' WHERE `session_id` = '%s'", $this->db_table_name, $expiration, $this->session_id);
			mysqli_query($this->_sess_db, $sql);

			return $val;
		}
		else
		{
			return $sth;
		}

	}



	public function on_session_write($key, $val) {
		$val = session_encode();
		$expiration = $this->expiration + time();
		$insert_stmt  = "replace into `ReactBoard`.`".$this->db_table_name."`(`session_id`,`ip_address`,`session_expiration`,`user_data`) values('$key',";
		$insert_stmt .= "'$this->ip_address', '$expiration', '$val')";

		return mysqli_query($this->_sess_db,$insert_stmt);
	}

	public function on_session_destroy($key) {
		$sql = "delete from `ReactBoard`.`$this->db_table_name` where session_id = '$key'";
		$res= mysqli_query($this->_sess_db,$sql);
	}
	public function on_session_gc($max_lifetime){
		mysqli_query($this->_sess_db,"delete from `ReactBoard`.`$this->db_table_name` where `session_expiration` <unix_timestamp(now())");
	}
}
// Set the save handlers