<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Main class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 메인 페이지를 담당하는 controller 입니다.
 */
class Main extends CB_Controller
{

    /**
     * 모델을 로딩합니다
     */
    protected $models = array('Board');

    /**
     * 헬퍼를 로딩합니다
     */
    protected $helpers = array('form', 'array');

    function __construct()
    {
        parent::__construct();

        /**
         * 라이브러리를 로딩합니다
         */
        
        if ( ! $this->member->item('mem_password') && $this->member->item('mem_id')) {
            redirect('membermodify');
        }

        $this->load->library(array('querystring','coin'));


    }


    /**
     * 전체 메인 페이지입니다
     */
    public function index()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_main_index';
        $this->load->event($eventname);

        $view = array();
        $view['view'] = array();

        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before'] = Events::trigger('before', $eventname);

        $where = array(
            'brd_search' => 1,
        );
        $board_id = $this->Board_model->get_board_list($where);
        $board_list = array();
        if ($board_id && is_array($board_id)) {
            foreach ($board_id as $key => $val) {
                $board_list[] = $this->board->item_all(element('brd_id', $val));
            }
        }
        $view['view']['board_list'] = $board_list;
        $view['view']['canonical'] = site_url();

        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before_layout'] = Events::trigger('before_layout', $eventname);

        $this->load->model('Attendance_model');
        $findex = $this->Attendance_model->primary_key;
        $forder = $this->cbconfig->item('attendance_order') === 'desc' ? 'desc' : 'asc';

        /**
         * 게시판 목록에 필요한 정보를 가져옵니다.
         */
        
        $date = cdate('Y-m-d');
        
        if (strlen($date) !== 10) {
            $date = cdate('Y-m-d');
        }
        $arr = explode('-', $date);
        if (checkdate(element(1, $arr), element(2, $arr), element(0, $arr)) === false) {
            $date = cdate('Y-m-d');
        }

        $where = array(
            'att_date' => $date,
        );
        $result = $this->Attendance_model
            ->get_attend_list(3,'', $where, $findex, $forder);

        if (element('list', $result)) {
            foreach (element('list', $result) as $key => $val) {
                $result['list'][$key]['display_name'] = display_username(
                    element('mem_userid', $val),
                    element('mem_nickname', $val),
                    element('mem_icon', $val)
                );
                $result['list'][$key]['display_datetime'] = display_datetime(
                    element('att_datetime', $val)
                );
            }
        }

        $view['view']['attendance'] = $result;

        


        // if (element('list', $coin_result)) {
        //     foreach (element('list', $coin_result) as $key => $val) {
        //         $coin_result['list'][$key]['display_name'] = display_username(
        //             element('mem_userid', $val),
        //             element('mem_nickname', $val),
        //             element('mem_icon', $val)
        //         );
        //         $coin_result['list'][$key]['display_datetime'] = display_datetime(
        //             element('att_datetime', $val)
        //         );
        //     }
        // }

        $view['view']['view_coin'] = $this->get_coin_data();


        /**
         * 페이지네이션을 생성합니다
         */
        $config['base_url'] = site_url('attendance/dailylist/' . $date);
        /**
         * 레이아웃을 정의합니다
         */
        $page_title = $this->cbconfig->item('site_meta_title_main');
        $meta_description = $this->cbconfig->item('site_meta_description_main');
        $meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
        $meta_author = $this->cbconfig->item('site_meta_author_main');
        $page_name = $this->cbconfig->item('site_page_name_main');

        $layoutconfig = array(
            'path' => 'main',
            'layout' => 'layout',
            'skin' => 'main',
            'layout_dir' => $this->cbconfig->item('layout_main'),
            'mobile_layout_dir' => $this->cbconfig->item('mobile_layout_main'),
            'use_sidebar' => $this->cbconfig->item('sidebar_main'),
            'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_main'),
            'skin_dir' => $this->cbconfig->item('skin_main'),
            'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_main'),
            'page_title' => $page_title,
            'meta_description' => $meta_description,
            'meta_keywords' => $meta_keywords,
            'meta_author' => $meta_author,
            'page_name' => $page_name,
        );
        $view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
        $this->data = $view;
        $this->layout = element('layout_skin_file', element('layout', $view));
        $this->view = element('view_skin_file', element('layout', $view));
    }

    function twitter($twitter_key){
       echo  twitter_list($twitter_key,'order');
    }

    function get_coin_data($cur_unit=''){
        
        $this->cbconfig->get_device_view_type();
        $config = array(
            'skin' => 'mobile',
            'cur_unit' => $cur_unit,
            
        );
        return $this->coin->all_price($config);
    }

    function show_coin_data($cur_unit=''){
        
        $this->cbconfig->get_device_view_type();
        $config = array(
            'skin' => 'mobile',
            'cur_unit' => $cur_unit,
            
        );
        echo $this->coin->all_price($config);
    }
}
