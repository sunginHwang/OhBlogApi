<?php

/**
 * Created by IntelliJ IDEA.
 * User: hwangseong-in
 * Date: 2016. 8. 13.
 * Time: 오후 3:59
 */
class Board extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api/Board_m');
        header('Access-Control-Allow-Origin: *');

    }

    public function get_list(){
        $this->input->get('category') != '' ? $board_code_key = $this->input->get('category') : $board_code_key = "-1";

        $limit = $this->input->get('limit');
        $limit != '' ? $limit = $limit + 20 : $limit = 20;
        $check_category_activate = $this->Board_m->check_board_cateogry($board_code_key);
        // 해당 카테고리의 정지여부 판별
        if($check_category_activate >= 1){
            $result = $this->Board_m->get_board_list($board_code_key,$limit);
            echo json_encode(array('state'=>'success','msg'=>'','result'=>$result),JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('state'=>'fail','result'=>'','msg'=>'정지된 게시판 입니다.'),JSON_UNESCAPED_UNICODE);
        }

    }

    public function get_board_content(){

        $board_key = $this->input->get('board_key');
        if($board_key != ''){
            $result['board_content'] = $this->Board_m->get_board_content($board_key);
            $check_category_activate = $this->Board_m->check_board_cateogry($result['board_content']['category_key']);

            if(empty( $result['board_content'])){
                echo json_encode(array('state'=>'fail','result'=>'','msg'=>'존재하지 않는 게시글 입니다.'),JSON_UNESCAPED_UNICODE);
            }else if($check_category_activate <1){
                echo json_encode(array('state'=>'fail','result'=>'','msg'=>'정지된 게시판 입니다.'),JSON_UNESCAPED_UNICODE);
            }else{
                $result['board_comment'] = $this->Board_m->get_board_comment_list($board_key);
                echo json_encode(array('state'=>'success','msg'=>'','result'=>$result),JSON_UNESCAPED_UNICODE);
            }

        }
    }

    public function get_board_category(){

            $result['boardCategory'] = $this->Board_m->get_board_category();

         echo json_encode($result,JSON_UNESCAPED_UNICODE);

    }

    // 실패 성공유무 체크 만들어주기
    public function delete_board_comment(){
        $comment_key = $this->input->get('comment_key');
        if($comment_key != ''){
            $this->Board_m->delete_board_comment($comment_key);

            echo json_encode(array('state'=>'success','result'=>'','msg'=>'댓글 삭제 성공'),JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('state'=>'fail','result'=>'','msg'=>'댓글 삭제 실패'),JSON_UNESCAPED_UNICODE);
        }
    }

    // 실패 성공 유무 체크 만들어주자
    public function insert_board_comment(){

        $json_comment_params = $this->input->post('insert_comment');
        empty($json_comment_params) ? exit : '';
        $comment_param = json_decode($json_comment_params,JSON_UNESCAPED_UNICODE);

        if($comment_param['member_key'] != '' and $comment_param['board_key'] != '' and $comment_param['comment_content'] != ''){
            $this->Board_m->insert_board_comment($comment_param['board_key'],$comment_param['comment_content'],$comment_param['member_key']);

            echo json_encode(array('state'=>'success','result'=>'','msg'=>'댓글 입력에 실패하였습니다'),JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('state'=>'fail','result'=>'','msg'=>'댓글 입력에 실패하였습니다'),JSON_UNESCAPED_UNICODE);
        }
    }
    // 실패 성공 유무 체크 만들어 주자
    public function insert_board(){

        $json_board_params = $this->input->post('insert_board');

        empty($json_board_params) ? exit : '';
        $board_param = json_decode($json_board_params,JSON_UNESCAPED_UNICODE);

        $this->load->helper(array('form', 'url'));

        $config['upload_path']          = './uploads/board_sub_img';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000000;
        $config['max_width']            = 4096;
        $config['max_height']           = 2800;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);


        if($board_param['member_key'] != '' and $board_param['title'] != '' and $board_param['content'] != '' and $board_param['category_key'] != ''){

            if ( ! $this->upload->do_upload('board_sub_img'))
            {
                /*echo json_encode(array('state'=>'fail','msg'=>$this->upload->display_errors()),JSON_UNESCAPED_UNICODE);*/
                $this->Board_m->insert_board($board_param['member_key'],$board_param['title'],$board_param['content'],$board_param['category_key'],null);
                echo json_encode(array('state'=>'success','result'=>'','msg'=>'게시글 작성 성공'),JSON_UNESCAPED_UNICODE);
            }
            else
            {
                $board_sub_img = '/uploads/board_sub_img/'.$this->upload->data('file_name');
                $this->Board_m->insert_board($board_param['member_key'],$board_param['title'],$board_param['content'],$board_param['category_key'],$board_sub_img);
                echo json_encode(array('state'=>'success','result'=>'','msg'=>'게시글 작성 성공'),JSON_UNESCAPED_UNICODE);
            }
        }else{
            echo json_encode(array('state'=>'fail','result'=>'','msg'=>'게시글 작성 실패'),JSON_UNESCAPED_UNICODE);
        }
    }
    // 실패 성공 유무 체크 만들어 주자
    public function update_board(){

        $json_board_params = $this->input->post('update_board');
        empty($json_board_params) ? exit : '';
        $board_param = json_decode($json_board_params,JSON_UNESCAPED_UNICODE);

        if($board_param['member_key'] != '' and $board_param['title'] != '' and $board_param['content'] != ''){
            $this->Board_m->update_board($board_param['member_key'],$board_param['board_key'],$board_param['title'],$board_param['content']);

            echo json_encode(array('state'=>'success','result'=>'','msg'=>'게시글 수정 성공'),JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('state'=>'fail','result'=>'','msg'=>'게시글 수정 실패'),JSON_UNESCAPED_UNICODE);
        }
    }

    // 실패 성공 유무 체크 만들어 주자
    public function delete_board(){

        $json_board_params = $this->input->post('delete_board');
        empty($json_board_params) ? exit : '';
        $board_param = json_decode($json_board_params,JSON_UNESCAPED_UNICODE);

        if($board_param['member_key'] != '' ){
            $this->Board_m->delete_board($board_param['board_key']);

            echo json_encode(array('state'=>'success','result'=>'','msg'=>'게시글 삭제 성공'),JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array('state'=>'fail','result'=>'','msg'=>'게시글 삭제 실패'),JSON_UNESCAPED_UNICODE);
        }
    }

    public function insert_image(){

        $this->load->helper(array('form', 'url'));

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000000;
        $config['max_width']            = 4096;
        $config['max_height']           = 2800;
        $config['encrypt_name']         = true;


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());

            echo json_encode(array('state'=>'fail','msg'=>$this->upload->display_errors()),JSON_UNESCAPED_UNICODE);
        }
        else
        {
            echo json_encode(array('state'=>'success','img_url'=>$this->upload->data('file_name')),JSON_UNESCAPED_UNICODE);
        }


    }

    public function test(){
        echo 'wow';
    }

    public function testDetail(){
        $this->load->view('/stats/testDetail');
    }

    public function testLogin(){
                        $login_user = array(
                            'sungin'  => 12,
                            'sss'     => 34
                        );

                        $this->session->set_userdata($login_user);
    }

    public function testJoin(){
        $this->load->view('/stats/testJoin');
    }

    public function loginCheck(){
        print_r($this->session->all_userdata());
    }



}



