<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Twitter group model class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

class Twitter_group_model extends CB_Model
{

    /**
     * 테이블명
     */
    public $_table = 'twitter_group';

    /**
     * 사용되는 테이블의 프라이머리키
     */
    public $primary_key = 'bng_id'; // 사용되는 테이블의 프라이머리키

    function __construct()
    {
        parent::__construct();
    }


    public function get_admin_list($limit = '', $offset = '', $where = '', $like = '', $findex = '', $forder = '', $sfield = '', $skeyword = '', $sop = 'OR')
    {
        $result = $this->_get_list_common($select = '', $join = '', $limit, $offset, $where, $like, $findex, $forder, $sfield, $skeyword, $sop);
        return $result;
    }


    public function get_all_group()
    {
        $result = $this->get('', '', '', '', '', 'bng_name', 'ASC');
        return $result;
    }
}
