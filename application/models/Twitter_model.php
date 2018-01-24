<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Twitter model class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

class Twitter_model extends CB_Model
{

    /**
     * 테이블명
     */
    public $_table = 'twitter';

    /**
     * 사용되는 테이블의 프라이머리키
     */
    public $primary_key = 'ban_id'; // 사용되는 테이블의 프라이머리키

    public $cache_time = 86400; // 캐시 저장시간

    function __construct()
    {
        parent::__construct();

        check_cache_dir('twitter');
    }


    public function get_admin_list($limit = '', $offset = '', $where = '', $like = '', $findex = '', $forder = '', $sfield = '', $skeyword = '', $sop = 'OR')
    {
        $result = $this->_get_list_common($select = '', $join = '', $limit, $offset, $where, $like, $findex, $forder, $sfield, $skeyword, $sop);
        return $result;
    }


    public function get_twitter($position = '', $type = '', $limit = '')
    {
        if (empty($position)) {
            return;
        }
        if (strtolower($type) !== 'order') {
            $type = 'random';
        }

        // $cachename = 'twitter/twitter-' . $position . '-' . $type . '-' . cdate('Y-m-d h:i:s');

        
            $this->db->from($this->_table);
            $this->db->where('bng_name', $position);
            $this->db->where('ban_activated', 1);
            $this->db->group_start();
            $this->db->where(array('ban_start_date <=' => cdate('Y-m-d')));
            $this->db->or_where(array('ban_start_date' => null));
            $this->db->group_end();
            $this->db->group_start();
            $this->db->where('ban_end_date >=', cdate('Y-m-d'));
            $this->db->or_where('ban_end_date', '0000-00-00');
            $this->db->or_where(array('ban_end_date' => ''));
            $this->db->or_where(array('ban_end_date' => null));
            $this->db->group_end();
            $this->db->group_start();
            $this->db->where('ban_type','public');
            if($this->member->item("mem_id")){
                $this->db->group_start('','OR ');
                $this->db->where('ban_type','private');
                $this->db->where('mem_id' , $this->member->item("mem_id"));
                $this->db->group_end();
            }
            $this->db->group_end();

            if($this->member->item("mem_id"))
                $order_by_field = '(cb_twitter.mem_id ='.$this->member->item("mem_id").'),ban_datetime,ban_order';
            else $order_by_field = 'ban_order';

            $this->db->order_by($order_by_field, 'DESC');
            $res = $this->db->get();
            $result = $res->result_array();

            // $this->cache->save($cachename, $result, $this->cache_time);
        

        if ($type === 'random') {
            shuffle($result);
        }

        if ($limit) {
            $result = array_slice($result, 0, $limit);
        }
        
        return $result;
    }
}
