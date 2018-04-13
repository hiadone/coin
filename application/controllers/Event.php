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
class Event extends CB_Controller
{

    /**
     * 모델을 로딩합니다
     */
    protected $models = array('Post', 'Post_extra_vars','Event_list_history');

    public $event_history_model='';
    public $event_key='';
    
    /**
     * 헬퍼를 로딩합니다
     */
    protected $helpers = array('form', 'array', 'number');

    function __construct()
    {
        parent::__construct();

        /**
         * 라이브러리를 로딩합니다
         */
        
        $this->load->library(array('pagination', 'querystring', 'accesslevel',  'point'));
        
    }


    /**
     * event_insert 정보
     */
    public function event_insert($post_id = 0)
    {
        
        if (empty($post_id)) {
            show_404();
        }

        

        
        $post = $this->Post_model->get_one($post_id);
        $board = $this->board->item_all(element('brd_id', $post));

        if (element('post_del', $post) > 1) {
            show_404();
        }


        


        $this->load->library('form_validation');
        

        $config = array(
            // array(
            //     'field' => 'elh_name',
            //     'label' => '이름',
            //     'rules' => 'trim|required',
            // ),
            // array(
            //     'field' => 'elh_age',
            //     'label' => '나이',
            //     'rules' => 'trim|required|is_numeric|callback__elh_agecheck[' . element('campaign_age',element('extravars',$post)) . ']',
            // ),
            array(
                'field' => 'elh_mobileno',
                'label' => '연락처',
                'rules' => 'trim|required|valid_phone',
            ),
            
            
        );
        
        $this->form_validation->set_rules($config);
        $form_validation = $this->form_validation->run();
        
        if ($form_validation === false) {

            if (validation_errors()) {
                $this->session->set_flashdata(
                    'message',
                    validation_errors()
                );
            }
            redirect(post_url(element('brd_key', $board), $post_id));
           
        } else {
            
            $param =& $this->querystring;
            if (empty($this->input->post('post_id')) OR $this->input->post('post_id') < 1) {
                show_404();
            }

            $extravars = element('extravars', $board);
            $form = json_decode($extravars, true);
            
            $extravars = $this->Post_extra_vars_model->get_all_meta($post_id);
            
            $point_eventdownload = 0;
            if ($form && is_array($form)) {
                foreach ($form as $key_ => $value_) {
                    if ( ! element('use', $value_) || element('field_name', $value_) !=='order_point') {
                        continue;
                    }


                    $point_eventdownload = element(element('field_name', $value_),  $extravars);
                     
                    
                }
            }

            $point_eventdownload= ($point_eventdownload * -1);
            $is_admin = $this->member->is_admin(
                array(
                    'board_id' => element('brd_id', $board),
                    'group_id' => element('bgr_id', $board),
                )
            );

            $alertmessage = $this->member->is_member()
                ? '회원님은 구매 할 수 있는 권한이 없습니다'
                : '비회원은 구매 할 수 있는 권한이 없습니다.\\n\\n회원이시라면 로그인 후 이용해 보십시오';
            $check = array(
                'group_id' => element('bgr_id', $board),
                'board_id' => element('brd_id', $board),
            );
            $this->accesslevel->check(
                element('access_download', $board),
                element('access_download_level', $board),
                element('access_download_group', $board),
                $alertmessage,
                $check
            );

            $mem_id = (int) $this->member->item('mem_id');

            

            $Ymd = floor(microtime(true));
            $point = $this->point->insert_point(
                $mem_id,
                $point_eventdownload,
                element('board_name', $board) . ' ' . element('post_title',$post) . ' 구매',
                'eventdownload'.$Ymd,
                $post_id,
                '구매'
            );

            if ($point_eventdownload < 0
                && $point < 0
                && $this->cbconfig->item('block_download_zeropoint')) {
                $this->point->delete_point(
                    $mem_id,
                    'eventdownload'.$Ymd,
                    $file_id,
                    '구매'
                );
                alert('회원님은 포인트가 부족하므로 구매하실 수 없습니다. 구매시 ' . ($point_eventdownload * -1) . ' 포인트가 차감됩니다');
                return false;
            }
            
        

        // 이벤트가 존재하면 실행합니다
        

        

            
          
            
              

        

            $insertdata = array(
                'post_id' => $this->input->post('post_id'),
                'elh_name' => $this->input->post('elh_name',null,''),
                'elh_age' => $this->input->post('elh_age',null,''),
                'elh_gender' => $this->input->post('elh_gender',null,''),
                'elh_email' => $this->input->post('elh_email',null,''),
                'elh_mobileno' => $this->input->post('elh_mobileno',null,''),
                'elh_datetime' => cdate('Y-m-d H:i:s'),
                'elh_ip' => $this->input->ip_address(),
                'elh_referer' => $this->agent->referrer(),
                'elh_text' => $this->input->post('elh_text',null,''),
                'elh_status' => 1
            );

            $elh_id = $this->Event_list_history_model->insert($insertdata);

            $this->session->set_flashdata(
                'message',
                '정상적으로 처리 되었습니다'
            );

            
            if($this->input->post('redirecturl'))
                redirect($this->input->post('redirecturl'));
            else 
               redirect(post_url(element('brd_key', $board), $post_id));
            
        }
    }




    /**
     * event rendering
     */
    public function event_register($brd_key = 0,$post_id = 0,$cookie_id = 0)
    {
        
        $view = array();
        $view['view'] = array();
        
        $page_title = $this->cbconfig->item('site_meta_title_main');
        $meta_description = $this->cbconfig->item('site_meta_description_main');
        $meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
        $meta_author = $this->cbconfig->item('site_meta_author_main');
        $page_name = $this->cbconfig->item('site_page_name_main');

        $layoutconfig = array(
            'path' => 'event',
            'layout' => 'layout',
            'skin' => 'event_register',
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


    public function cpaProc($elh_id = 0,$rst = '',$msg = '')
    {
        
        if (empty($elh_id) || empty($rst)) {
            show_404();
        }

        

        
        $updatedata = array(
            'elh_api_flag' => 1,
            'elh_rst' => $rst,
            'elh_msg' => urldecode($msg),
         );
        $this->Event_linkmine_history_model->update($elh_id, $updatedata);
        

            
    }

    public function act_cpaProc($elh_id = 0,$rst = '',$msg = '')
    {
        
        if (empty($elh_id) || empty($rst)) {
            show_404();
        }
        
        $updatedata = array(
            'elh_api_flag2' => 1,
            'elh_rst2' => $rst,
            'elh_msg2' => urldecode($msg),
            'elh_rst2_date' => cdate('Y-m-d H:i:s')
         );
        $this->Event_linkmine_history_model->update($elh_id, $updatedata);
            
    }


    public function tpProc($elh_id = 0,$rst = '',$msg = '')
    {
        
        if (empty($elh_id) || empty($rst)) {
            show_404();
        }

        

        
        $updatedata = array(
            'elh_api_flag' => 1,
            'elh_rst' => $rst,
            'elh_msg' => urldecode($msg),
         );
        $this->Event_tenping_history_model->update($elh_id, $updatedata);
        

            
    }

    public function act_tpProc($elh_id = 0,$rst = 0,$msg = '')
    {
        
        if (empty($elh_id) || !isset($rst)) {
            show_404();
        }
        
        $updatedata = array(
            'elh_api_flag2' => 1,
            'elh_rst2' => $rst,
            'elh_msg2' => urldecode($msg),
            'elh_rst2_date' => cdate('Y-m-d H:i:s')
            
         );
        $this->Event_tenping_history_model->update($elh_id, $updatedata);
            
    }


    public function set_init($brd_key)
    {
        if($brd_key==='linkmine'){
            $this->event_history_model='Event_linkmine_history_model';
            $this->event_key='adf_key';
            
        }
        if($brd_key==='tenping'){
            $this->event_history_model='Event_tenping_history_model';
            $this->event_key='jid';
        }
    }

    public function _elh_mobileno_dupcheck($str,$post_id)
    {   

        $str = get_phone($str);
        $countwhere = array(
            'elh_mobileno' => $str,
            'post_id' => $post_id,
        );
        $row = $this->{ucfirst($this->event_history_model)}->count_by($countwhere);

        if ($row > 0) {
            $this->form_validation->set_message(
                '_elh_mobileno_dupcheck',
                $str . ' 번호는 이미 상담신청한 번호 입니다.'
            );
            return false;
        }

        return true;
    }

    public function _elh_agecheck($str,$elh_age='')
    {   

        if($elh_age){
            $campaign_age = explode("~",$elh_age);

            $campaign_age[0]=trim($campaign_age[0]);
            $campaign_age[1]=trim($campaign_age[1]);

            if(!empty($campaign_age[0]) && $str < $campaign_age[0]) {
                $this->form_validation->set_message(
                    '_elh_agecheck',
                    $campaign_age[0] . ' 세 이상만 신청이 가능합니다.'
                );
                return false;
            }
            if(!empty($campaign_age[1]) && $str > $campaign_age[1]) {
                
                $this->form_validation->set_message(
                    '_elh_agecheck',
                    $campaign_age[1] . ' 세 이하만 신청이 가능합니다.'
                );
                return false;
            }
        }
        return true;
    }
}
