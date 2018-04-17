<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Member Selfcert History model class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

class Media_selfcert_history_model extends CB_Model
{

    /**
     * 테이블명
     */
    public $_table = 'media_selfcert_history';

    /**
     * 사용되는 테이블의 프라이머리키
     */
    public $primary_key = 'msh_id'; // 사용되는 테이블의 프라이머리키

    function __construct()
    {
        parent::__construct();
    }

    public function get_admin_list($limit = '', $offset = '', $where = '', $like = '', $findex = '', $forder = '', $sfield = '', $skeyword = '', $sop = 'OR',$where_in='')  
    {   
        if(!empty($where_in)) $where_in_['media_selfcert_history.'.key($where_in)]=$where_in[key($where_in)];
        else $where_in_='';
        
        $select = 'media_selfcert_history.*, post.post_title, post.brd_id';
        $join[] = array('table' => 'post', 'on' => 'media_selfcert_history.post_id = post.post_id', 'type' => 'left');
        $result = $this->_get_list_common($select, $join, $limit, $offset, $where, $like, $findex, $forder, $sfield, $skeyword, $sop,$where_in_);

        return $result;
    }


    public function get_graph($start_date = '', $end_date = '')
    {
        if (empty($start_date) OR empty($end_date)) {
            return false;
        }

        $this->db->where('left(msh_datetime, 10) >=', $start_date);
        $this->db->where('left(msh_datetime, 10) <=', $end_date);
        $this->db->select('msh_referer');
        $qry = $this->db->get($this->_table);
        $result = $qry->result_array();

        return $result;
    }
    
}
