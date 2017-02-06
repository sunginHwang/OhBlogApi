<?php

/**
 * Created by IntelliJ IDEA.
 * User: hwangseong-in
 * Date: 2016. 10. 29.
 * Time: 오후 4:14
 */
class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        $this->load->model('api/Member_m');
    }

    function checkMemberId(){
        $check_member_id = $this->input->get('check_member_id');
        empty($check_member_id) ? exit : '';

        $result = $this->Member_m->checkMemberId_m($check_member_id);
        if($result >=1){
            echo json_encode(array('status'=>'fail','result'=>'','msg'=>'현재 사용중인 아이디입니다.'),JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('status'=>'success','result'=>'','msg'=>'사용하셔도 되는 아이디입니다.'),JSON_UNESCAPED_UNICODE);
        }
    }

    function insert_Member(){
        $json_member_params = $this->input->post('insert_member');
        empty($json_member_params) ? exit : '';
        $member_params = json_decode($json_member_params,JSON_UNESCAPED_UNICODE);

        if($member_params['member_id'] != '' and $member_params['member_password'] != ''){
            $insert_result = $this->Member_m->insertMember_m($member_params);
            $insert_result > 1 ?  $result = array() : $result =-1;
            echo json_encode(array('status'=>'success','result'=>'','msg'=>'회원가입 성공.'),JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('status'=>'fail','result'=>'','msg'=>'회원가입에 실패하였습니다.'),JSON_UNESCAPED_UNICODE);
        }

    }

    function update_Member(){
        $json_member_params = $this->input->post('update_member');
        empty($json_member_params) ? exit : '';
        $member_params = json_decode($json_member_params,JSON_UNESCAPED_UNICODE);

        if($member_params['member_id'] != '' and $member_params['member_pre_password'] != ''){
            if($this->Member_m->checkMember_password($member_params['member_pre_password']) <1){
                echo json_encode(array('status'=>'fail','result'=>'','msg'=>'원래 비밀번호가 다릅니다 확인해주세요.'),JSON_UNESCAPED_UNICODE);exit;
            }else{
                $member_params['member_password'] = $member_params['member_password'] == '' ? $member_params['member_pre_password'] : $member_params['member_password'];
                unset($member_params['member_pre_password']);
                $insert_result = $this->Member_m->updateMember_m($member_params);
                $insert_result > 1 ?  $result = array() : $result =-1;
                echo json_encode(array('status'=>'success','result'=>'','msg'=>'정보수정 성공.'),JSON_UNESCAPED_UNICODE);
            }


        }else{
            echo json_encode(array('status'=>'fail','result'=>'','msg'=>'회원가입 수정 실패 '),JSON_UNESCAPED_UNICODE);
        }
    }

    function loginMember(){
       $member_id = $this->input->get('member_id');
       $member_password = $this->input->get('member_password');

        if($member_id != '' and $member_password != ''){
            $login_result = $this->Member_m->loginMember_m($member_id,$member_password);
            if($login_result['count'] >= 1){
                $member_key = $login_result['member_key'];

                echo json_encode(array('status'=>'success','msg'=>'','result'=>$member_key),JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode(array('status'=>'fail','result'=>'','msg'=>'로그인 실패'),JSON_UNESCAPED_UNICODE);
            }

        }else{
            echo json_encode(array('status'=>'fail','result'=>'','msg'=>'아이디 혹은 비밀번호를 확인해주세요.'),JSON_UNESCAPED_UNICODE);
        }

    }

    function get_member_info(){
        $member_key = $this->input->get('member_key');
        if($member_key == -1 || !is_numeric($member_key)){
            echo json_encode(array('status'=>'fail','result'=>'','msg'=>'존재하지 않는 회원입니다.'),JSON_UNESCAPED_UNICODE);
        }else{
            $member_info = $this->Member_m->get_member_info_m($member_key);
            if(empty($member_info)){
                echo json_encode(array('status'=>'fail','result'=>'','msg'=>'존재하지 않는 회원입니다.'),JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode(array('status'=>'success','result'=>$member_info,'msg'=>'조회성공.'),JSON_UNESCAPED_UNICODE);
            }
        }
    }


    function loginStatusCheck(){
        echo json_encode(array('status'=>'success','result'=>array('member_key'=>1,'member_id'=>'gommpo'),'msg'=>''),JSON_UNESCAPED_UNICODE);
    }



}