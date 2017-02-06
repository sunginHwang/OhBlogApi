<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 본 시스템을 사용하기 위한 로그인 여부검사 및 뷰 페이지 로드 관련 기능을 제공
 * @author Ohjic Donghoon
 *
 */
abstract class MM_Controller extends CI_Controller
{
	/**
	 * view를 로드할때 넘겨지는 전달인자
	 * @var array
	 */
	protected $param;
	/**
	 * view 폴더 이름
	 * @var string
	 */
	protected $view_folder;
	
	protected $minister_idx;
	
	/**
	 * 개인 로그인 여부를 검사한다.
	 */
	public function __construct()
	{
		parent::__construct();
		
/*		if($this->session->userdata('minister_idx') === FALSE OR is_array($this->session->userdata('arr_org_idx')) === FALSE)
		{
			//show_error('login plz');
			redirect("http://koreabaptist.or.kr");
		}
		
		$this->minister_idx = $this->session->userdata('minister_idx');
		$this->load->library('form_validation');
		$this->lang->load('common');
		
		$arr_action = array(
			'remote_addr' => $_SERVER['REMOTE_ADDR'],
			'request_uri' => $_SERVER['REQUEST_URI'],
			'minister_idx' => $this->minister_idx,
		);
		
		$this->db->set($arr_action);
		$this->db->set('regi_date','now()',FALSE);
		$this->db->insert('action');*/
		
		
	}
	
	/**
	 * 헤더 / 서브헤더 / 본문 / 서브푸터 / 푸터 형식의 뷰를 로드한다.
	 * @param unknown 본문 뷰 페이지 파일 이름
	 * @param string 본문 뷰 페이지 제목
	 */
	protected function _view($view,$sub_title=null)
	{
		$this->_set_auth();
		$this->param['sub_title'] .= ($sub_title != null ? ' :: '.$sub_title : null);
		$this->param['page_title'] = $sub_title;

		$this->load->view('common/header',$this->param);
		$this->load->view($this->view_folder.'/sub_header',$this->param);
 		$this->load->view($this->view_folder.'/'.$view,$this->param);
 		$this->load->view($this->view_folder.'/sub_footer');
		$this->load->view('common/footer');
	}
	
	protected function _view_exclude_sub($view,$sub_title=null)
	{
		$this->_set_auth();
		$this->param['sub_title'] .= ($sub_title != null ? ' :: '.$sub_title : null);
		$this->param['page_title'] = $sub_title;
		
		$this->load->view('common/header',$this->param);
 		$this->load->view($this->view_folder.'/'.$view,$this->param);
		$this->load->view('common/footer');
	}
	
/*	private function _set_auth()
	{
		$this->load->model('config/auth_m');
		$this->param['work_task_auth'] = $this->auth_m->has_work_task_auth($this->minister_idx);
		$this->param['document_form_auth'] = $this->auth_m->get_document_form_auth($this->minister_idx);
		$this->param['sms_auth'] = $this->auth_m->has_sms_auth($this->minister_idx);
		$this->param['has_master_authority'] = $this->auth_m->has_master_authority($this->minister_idx);
	}*/
}

/**
 * 최고 관리자 로그인 여부를 검사
 * @author Ohjic Donghoon
 *
 */
abstract class Admin_Controller extends MM_Controller
{
	/**
	 * 관리자 로그인 여부를 검사
	 */
	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('level') === FALSE || $this->session->userdata('level') < 10)
		{
			show_error('admin login plz');
		}
	}
}

/* End of File MM_Controller.php */
/* Location: ./application/core/MM_Controller.php */
