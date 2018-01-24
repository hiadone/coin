<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Virtual_coin model class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

class Virtual_coin_model extends CB_Model
{

    /**
     * 테이블명
     */
    public $_table = 'virtual_coin';

    /**
     * 사용되는 테이블의 프라이머리키
     */
    public $parent_key1 = 'vic_type';
    public $parent_key2 = 'vic_title';

    public $meta_key = 'vic_key';

    public $meta_value = 'vic_value';

    function __construct()
    {
        parent::__construct();

        
    }


   
    public function get_list_in( $where = '', $where_in = '', $limit = '', $offset = '' ){

        if ($where) {
            $this->db->where($where);
        }
        
        if ($where_in) {
            $this->db->where_in(key($where_in), $where_in[key($where_in)]);
        }
        
        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        $qry = $this->db->get($this->_table);
        $result = $qry->result_array();
        return $result;

    }


    public function save($vic_type = '', $vic_title = '', $savedata = '')
    {
        if (empty($vic_type)) {
            return false;
        }
        if (empty($vic_title)) {
            return false;
        }

        if ($savedata && is_array($savedata)) {
            foreach ($savedata as $column => $value) {
                $this->meta_update($vic_type, $vic_title, $column, $value);
            }
        }
        
    }


    public function deletemeta($vic_type = '', $vic_title = '')
    {
        if (empty($vic_type)) {
            return false;
        }
        if (empty($vic_title)) {
            return false;
        }
        $this->delete_where(array('vic_type' => $vic_type, 'vic_title' => $vic_title));
        
    }


    public function meta_update($vic_type = '', $vic_title = '', $column = '', $value = false)
    {
        if (empty($vic_type)) {
            return false;
        }
        if (empty($vic_title)) {
            return false;
        }

        $column = trim($column);
        if (empty($column)) {
            return false;
        }

        $old_value = $this->item($vic_type, $vic_title, $column);
        if (empty($value)) {
            $value = '';
        }
        if ($value === $old_value) {
            return false;
        }

        if (false === $old_value) {
            return $this->add_meta($vic_type, $vic_title, $column, $value);
        }

        return $this->update_meta($vic_type, $vic_title, $column, $value);
    }


    public function item($vic_type = '', $vic_title = '', $column = '')
    {
        if (empty($vic_type)) {
            return false;
        }
        if (empty($vic_title)) {
            return false;
        }
        if (empty($column)) {
            return false;
        }

        $result = $this->get_all_meta($vic_type, $vic_title);

        return isset($result[ $column ]) ? $result[ $column ] : false;
    }


    public function add_meta($vic_type = '', $vic_title = '', $column = '', $value = '')
    {
        if (empty($vic_type)) {
            return false;
        }
        if (empty($vic_title)) {
            return false;
        }
        $column = trim($column);
        if (empty($column)) {
            return false;
        }

        $updatedata = array(
            'vic_type' => $vic_type,
            'vic_title' => $vic_title,
            'vic_key' => $column,
            'vic_value' => $value,
        );
        $this->db->insert($this->_table, $updatedata);

        return true;
    }


    public function update_meta($vic_type = '', $vic_title = '', $column = '', $value = '')
    {
        if (empty($vic_type)) {
            return false;
        }
        if (empty($vic_title)) {
            return false;
        }

        $column = trim($column);
        if (empty($column)) {
            return false;
        }

        $this->db->where('vic_type', $vic_type);
        $this->db->where('vic_title', $vic_title);
        $this->db->where($this->meta_key, $column);
        $data = array($this->meta_value => $value);
        $this->db->update($this->_table, $data);

        return true;
    }

    public function get_all_meta($vic_type = '', $vic_title = '')
    {
        if (empty($vic_type)) {
            return false;
        }
        if (empty($vic_title)) {
            return false;
        }
        
        $data = array();
        
        $result = array();
        $res = $this->get('', $select = '', array('vic_type' => $vic_type, 'vic_title' => $vic_title));
        if ($res && is_array($res)) {
            foreach ($res as $val) {
                $result[$val[$this->meta_key]] = $val[$this->meta_value];
            }
        }
        $data['result'] = $result;
        
        return isset($data['result']) ? $data['result'] : false;
    }
}
