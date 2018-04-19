<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Member Selfcert History model class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

class Member_selfcert_history_model extends CB_Model
{

    /**
     * 테이블명
     */
    public $_table = 'member_selfcert_history';

    /**
     * 사용되는 테이블의 프라이머리키
     */
    public $primary_key = 'msh_id'; // 사용되는 테이블의 프라이머리키

    function __construct()
    {
        parent::__construct();
    }


    public function tried_count($type = '', $date = '', $mem_id = '', $ip = '')
    {

        $this->db->select('count(*) as cnt', false);
        $this->db->where('msh_certtype', $type);
        $this->db->where('left(msh_datetime, 10) =', $date);

        if ($mem_id) {
            $this->db->where('mem_id', $mem_id);
        } else {
            $this->db->where('msh_ip', $ip);
        }

        $qry = $this->db->get($this->_table);
        $result = $qry->row_array();

        return $result;

    }


    public function get_admin_list($limit = '', $offset = '', $where = '', $like = '', $findex = '', $forder = '', $sfield = '', $skeyword = '', $sop = 'OR',$where_in='')  
    {   
        if(!empty($where_in)) $where_in_['member_selfcert_history.'.key($where_in)]=$where_in[key($where_in)];
        else $where_in_='';
        
        $select = 'member_selfcert_history.*';
        
        $result = $this->_get_list_common($select, '', $limit, $offset, $where, $like, $findex, $forder, $sfield, $skeyword, $sop,$where_in_);

        return $result;
    }


    public function get_graph($start_date = '', $end_date = '')
    {
        if (empty($start_date) OR empty($end_date)) {
            return false;
        }

        $this->db->where('left(msh_datetime, 10) >=', $start_date);
        $this->db->where('left(msh_datetime, 10) <=', $end_date);
        $this->db->select('msh_mobileco');
        $qry = $this->db->get($this->_table);
        $result = $qry->result_array();

        return $result;
    }
    
}
