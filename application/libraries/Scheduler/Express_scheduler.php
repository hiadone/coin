<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Express_scheduler class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 스케쥴러를 통해 실행되는 샘플 class 입니다.
 */
class Express_scheduler extends CI_Controller
{
    private $CI;

    function __construct()
    {
        $this->CI = & get_instance();
    }

    public function scheduler()
    {

        

        $this->CI->load->model('Post_model');
        
        $post_num = $this->CI->Post_model->next_post_num();
        $post_reply = '';

        $curdatetime = cdate('Y-m-d H:i:s', ctimestamp() - rand(1,60) * 60);

        $updatedata = array(
            'post_num' => $post_num,
            'post_reply' => $post_reply,
            'post_title' => $post_title,
            'post_content' => $post_content,
            'post_html' => 1,
            'post_datetime' => $curdatetime,
            'post_updated_datetime' => $curdatetime,
            'post_ip' => $this->input->ip_address(),
            'brd_id' => 13,
        );


        $updatedata['mem_id'] = (-1) * $mem_id;
        $updatedata['post_userid'] = '';
        $updatedata['post_username'] = '익명사용자';
        $updatedata['post_nickname'] = '익명사용자';
        $updatedata['post_email'] = '';
        $updatedata['post_homepage'] = '';
        $updatedata['post_notice'] = 99;

        $att_id = $this->CI->Attendance_model->insert($insertdata);
    }
}
