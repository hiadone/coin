<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Attendance_scheduler class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 스케쥴러를 통해 실행되는 샘플 class 입니다.
 */
class Attendance_scheduler extends CI_Controller
{
    private $CI;

    function __construct()
    {
        $this->CI = & get_instance();
    }

    public function scheduler()
    {

        if ( ! $this->CI->cbconfig->item('use_attendance')) {
            return ;
        }

        $this->CI->load->model('Attendance_model');
        
        $max_data = $this->CI->Attendance_model->get_today_max_ranking();

        $max_ranking = element('att_ranking', $max_data);

        if (empty($max_ranking)) {
            $my_ranking = 1;
            
        } else {
            $my_ranking = $max_ranking + 1;
        }

        $curdatetime = cdate('Y-m-d H:i:s', ctimestamp() - rand(1,60) * 60);

        $insertdata = array(
            'mem_id' => 41,
            'att_point' => 0,
            'att_memo' => $this->input->post('memo', null, ''),
            'att_continuity' => 0,
            'att_ranking' => $my_ranking,
            'att_date' => cdate('Y-m-d'),
            'att_datetime' => $curdatetime,
            'att_demo' => $curdatetime,
        );
        $att_id = $this->CI->Attendance_model->insert($insertdata);
    }
}
