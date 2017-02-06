<?php

/**
 * Created by IntelliJ IDEA.
 * User: hwangseong-in
 * Date: 2016. 8. 13.
 * Time: 오후 4:03
 */
class Board_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check_board_cateogry($category_key){
        $query = "SELECT count(*) as count from OhBoardCategory where del_yn = 'N' and category_key = ? ";
        $result = $this->db->query($query,array($category_key));
        $result = $result->row_array();
        return $result['count'];
    }



    public function get_board_list($category_key,$limit){

        $query = "select ob.board_key, ob.title,DATE_FORMAT( ob.regi_date, '%Y-%m-%d' ) as regi_date , om.member_nickname, obc.category_name, ob.hits, 1 as comments, if(board_sub_img is null,'/uploads/default/texter.png',board_sub_img ) as board_category_img
                    from OhBoard as ob
                    left join OhMember om ON ob.member_key = om.member_key
                    left join OhBoardCategory obc USING(category_key)
                    where ob.category_key = ? and ob.flag = ? limit 0, ?";

        $result = $this->db->query($query,array($category_key,"N",$limit));
        return $result->result_array();
    }

    public function get_board_category(){

        $query = "select * from OhBoardCategory where del_yn = ? ";
        $result = $this->db->query($query,array("N"));
        return $result->result_array();
    }


    public function get_board_content($board_key){

        $query = "select ob.board_key, ob.title, ob.content, ob.member_key, obc.category_name, obc.category_key, DATE_FORMAT(ob.regi_date,'%Y-%m-%d') as regi_date, om.member_id
                    from OhBoard as ob
                    left join OhMember om USING(member_key)
                    left join OhBoardCategory obc USING(category_key)
                    where ob.board_key = ? and ob.flag = ? ";

        $result = $this->db->query($query,array($board_key,"N"));
        return $result->row_array();
    }

    public function get_board_comment_list($board_key){

        $query = "select oc.comment_key, oc.comment_content, oc.update_date, om.member_key, om.member_nickname, oc.board_key  from OhComment as oc
                    left join OhMember om using(member_key)
                    where oc.board_key = ? and oc.flag = ?";

        $result = $this->db->query($query,array($board_key,"N"));
        return $result->result_array();
    }

    public function delete_board_comment($comment_key){

        $query = "update OhComment set flag = ? where comment_key = ?";

        $result = $this->db->query($query,array("Y",$comment_key));

    }

    public function insert_board_comment($board_key,$comment_content,$member_key){

        $query = "insert into OhComment (board_key,comment_content,member_key) values(?,?,?)";

        $result = $this->db->query($query,array($board_key,$comment_content,$member_key));

    }

    public function insert_board($member_key,$title,$content,$category_key,$board_sub_img){

        $query = "insert into OhBoard (member_key,title,content,category_key,board_sub_img,code_key) values(?,?,?,?,?,?)";

        $result = $this->db->query($query,array($member_key,$title,$content,$category_key,$board_sub_img,'BOARD01'));

    }

    public function update_board($member_key,$board_key,$title,$content){

        $query = "update OhBoard set title = ?, content = ? where member_key = ? and board_key = ?";

        $result = $this->db->query($query,array($title,$content,$member_key,$board_key));

    }

    public function delete_board($board_key){

        $query = "update OhBoard set flag = ? where board_key = ?";

        $result = $this->db->query($query,array("Y",$board_key));

    }




}