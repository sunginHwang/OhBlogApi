<?php

/**
 * Created by IntelliJ IDEA.
 * User: hwangseong-in
 * Date: 2016. 10. 29.
 * Time: 오후 4:18
 */
class Member_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkMemberId_m($member_id){
        $sql = 'SELECT count(*) as count FROM OhMember WHERE member_id = ?';
        $result = $this->db->query($sql,array($member_id));
        $result = $result->row_array();
        return $result['count'];
    }

    public function checkMember_password($member_password){
        $sql = 'SELECT count(*) as count FROM OhMember WHERE member_password = ?';
        $result = $this->db->query($sql,array($member_password));
        $result = $result->row_array();
        return $result['count'];
    }


    public function insertMember_m($member_params){
        $this->db->insert('OhMember', $member_params);
        return $this->db->insert_id();
    }

    public function updateMember_m($member_params){
        $this->db->update('OhMember', $member_params);
        return $this->db->insert_id();
    }

    public function loginMember_m($member_id,$member_password){
        $sql = 'SELECT count(*) as count, member_key FROM OhMember WHERE member_id = ? and member_password = ?';
        $result = $this->db->query($sql,array($member_id,$member_password));
        $result = $result->row_array();
        return $result;
    }

    public function get_member_info_m($member_key){
        $sql = 'SELECT member_id, member_name, member_age, member_phone, member_email FROM OhMember WHERE member_key = ? and flag = ?';
        $result = $this->db->query($sql,array($member_key,'N'));
        $result = $result->row_array();
        return $result;
    }

}