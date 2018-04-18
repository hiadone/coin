<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Niceselfcert class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>통계관리>회원가입경로 controller 입니다.
 */
class Niceselfcert extends CB_Controller
{

    /**
     * 관리자 페이지 상의 현재 디렉토리입니다
     * 페이지 이동시 필요한 정보입니다
     */
    public $pagedir = 'stat/niceselfcert';

    /**
     * 모델을 로딩합니다
     */
    protected $models = array('Media_selfcert_history','Post');

    /**
     * 이 컨트롤러의 메인 모델 이름입니다
     */
    protected $modelname = 'Media_selfcert_history_model';

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
        $this->load->library(array('pagination', 'querystring'));
    }

    /**
     * 목록을 가져오는 메소드입니다
     */
    public function index()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_admin_stat_registerlog_index';
        $this->load->event($eventname);

        $view = array();
        $view['view'] = array();

        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before'] = Events::trigger('before', $eventname);

        /**
         * 페이지에 숫자가 아닌 문자가 입력되거나 1보다 작은 숫자가 입력되면 에러 페이지를 보여줍니다.
         */
        $param =& $this->querystring;
        $page = (((int) $this->input->get('page')) > 0) ? ((int) $this->input->get('page')) : 1;
        $findex = $this->input->get('findex') ? $this->input->get('findex') : $this->{$this->modelname}->primary_key;
        $forder = $this->input->get('forder', null, 'desc');
        $sfield = $this->input->get('sfield', null, '');
        $skeyword = $this->input->get('skeyword', null, '');

        $per_page = admin_listnum();
        $offset = ($page - 1) * $per_page;
        $where = array();
        $where_in='';
        if ($this->input->get('msh_status')) {
            $where['msh_status'] = $this->input->get('msh_status');
        }

        if(!empty($this->input->get('post_id_', null, 0))) $where_in['post_id'] = $this->input->get('post_id_');
        

        /**
         * 게시판 목록에 필요한 정보를 가져옵니다.
         */
        $this->{$this->modelname}->allow_search_field = array('msh_name','msh_mobileno'); // 검색이 가능한 필드
        //$this->{$this->modelname}->search_field_equal = array('msh_name','msh_mobileno'); // 검색중 like 가 아닌 = 검색을 하는 필드
        $this->{$this->modelname}->allow_order_field = array('msh_name'); // 정렬이 가능한 필드
        $result = $this->{$this->modelname}
            ->get_admin_list($per_page, $offset, $where, '', $findex, $forder, $sfield, $skeyword,'',$where_in);
        $list_num = $result['total_rows'] - ($page - 1) * $per_page;

        if (element('list', $result)) {
            foreach (element('list', $result) as $key => $val) {

                $board = $this->board->item_all(element('brd_id', $val));


                $result['list'][$key]['display_name'] = element('msh_name', $val);
                $result['list'][$key]['display_datetime'] = display_datetime(element('msh_datetime', $val));
                
                $result['list'][$key]['num'] = $list_num--;
                $result['list'][$key]['post_url'] = post_url(element('brd_key', $board), element('post_id', $val));
            }

            $view['view']['get_member_group_post_list']= $this->get_member_group_post_list(element('brd_key', $board));
        }

        

        $view['view']['data'] = $result;

        /**
         * primary key 정보를 저장합니다
         */
        $view['view']['primary_key'] = $this->{$this->modelname}->primary_key;

        /**
         * 페이지네이션을 생성합니다
         */
        $config['base_url'] = admin_url($this->pagedir) . '?' . $param->replace('page');
        $config['total_rows'] = $result['total_rows'];
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $view['view']['paging'] = $this->pagination->create_links();
        $view['view']['page'] = $page;

        /**
         * 쓰기 주소, 삭제 주소등 필요한 주소를 구합니다
         */
        $search_option = array('msh_name' => '이름','msh_mobileno' => '핸드폰 번호');
        $view['view']['skeyword'] = ($sfield && array_key_exists($sfield, $search_option)) ? $skeyword : '';
        $view['view']['search_option'] = search_option($search_option, $sfield);
        $view['view']['listall_url'] = admin_url($this->pagedir);

        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before_layout'] = Events::trigger('before_layout', $eventname);

        /**
         * 어드민 레이아웃을 정의합니다
         */
        $layoutconfig = array('layout' => 'layout', 'skin' => 'index');
        $view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
        $this->data = $view;
        $this->layout = element('layout_skin_file', element('layout', $view));
        $this->view = element('view_skin_file', element('layout', $view));
    }

    /**
     * 회원가입경로를을 그래프 형식으로 보는 페이지입니다
     */
    public function graph($export = '')
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_admin_stat_registerlog_graph';
        $this->load->event($eventname);

        $view = array();
        $view['view'] = array();

        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before'] = Events::trigger('before', $eventname);

        $param =& $this->querystring;
        $start_date = $this->input->get('start_date') ? $this->input->get('start_date') : cdate('Y-m-01');
        $end_date = $this->input->get('end_date') ? $this->input->get('end_date') : cdate('Y-m-d');

        $result = $this->{$this->modelname}->get_graph($start_date, $end_date);
        $sum_count = 0;
        $arr = array();
        $max = 0;

        if ($result && is_array($result)) {
            foreach ($result as $key => $value) {

                preg_match(
                    "/^http[s]*:\/\/([\.\-\_0-9a-zA-Z]*)\//",
                    element('mrg_referer', $value),
                    $match
                );

                $s = $match ? $match[1] : '-';
                $s = preg_replace(
                    "/^(www\.|search\.|dirsearch\.|dir\.search\.|dir\.|kr\.search\.|myhome\.)(.*)/",
                    "\\2",
                    $s
                );
                if ( ! isset($arr[$s])) {
                    $arr[$s] = 0;
                }
                $arr[$s]++;

                if ($arr[$s] > $max) {
                    $max = $arr[$s];
                }
                $sum_count++;
            }
        }

        $view['view']['list'] = array();
        $i = 0;
        $k = 0;
        $save_count = -1;

        if (count($arr)) {
            arsort($arr);
            foreach ($arr as $key => $value) {
                $count = (int) $arr[$key];
                $view['view']['list'][$k]['count'] = $count;
                $i++;
                if ($save_count !== $count) {
                    $no = $i;
                    $save_count = $count;
                }
                $view['view']['list'][$k]['no'] = $no;

                if ($key === '-') {
                    $key = '직접';
                }
                $view['view']['list'][$k]['key'] = $key;
                $rate = ($count / $sum_count * 100);
                $view['view']['list'][$k]['rate'] = $rate;
                $s_rate = number_format($rate, 1);
                $view['view']['list'][$k]['s_rate'] = $s_rate;

                $bar = (int)($count / $max * 100);
                $view['view']['list'][$k]['bar'] = $bar;

                $k++;
            }
            $view['view']['max_value'] = $max;
            $view['view']['sum_count'] = $sum_count;
        }

        $view['view']['start_date'] = $start_date;
        $view['view']['end_date'] = $end_date;

        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before_layout'] = Events::trigger('before_layout', $eventname);

        if ($export === 'excel') {
            
            header('Content-type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename=회원가입경로_' . cdate('Y_m_d') . '.xls');
            echo $this->load->view('admin/' . ADMIN_SKIN . '/' . $this->pagedir . '/graph_excel', $view, true);

        } else {
            /**
             * 어드민 레이아웃을 정의합니다
             */
            $layoutconfig = array('layout' => 'layout', 'skin' => 'graph');
            $view['layout'] = $this->managelayout->admin($layoutconfig, $this->cbconfig->get_device_view_type());
            $this->data = $view;
            $this->layout = element('layout_skin_file', element('layout', $view));
            $this->view = element('view_skin_file', element('layout', $view));
        }
    }


    public function get_member_group_post_list($brd_key='')
    {


        $mem_id = (int) $this->member->item('mem_id');
        
        $is_admin = $this->member->is_admin();

        $where = array();
        $where['post_del <>'] = 2;
        $where['post_notice'] = 0;
        
        $where['brd_id'] = $this->board->item_key('brd_id', $brd_key);

        if ($is_admin === false) {
            $where['post.mem_id'] = $mem_id;
        }

        $category_id = (int) $this->input->get('category_id');
        if (empty($category_id) OR $category_id < 1) {
            $category_id = '';
        }
        $sfield = $sfieldchk = $this->input->get('sfield', null, '');
        $skeyword = $this->input->get('skeyword', null, '');

        $result = $this->Post_model
            ->get_post_list('','', $where, $category_id, '', $sfield, $skeyword);
        $member_group_post_list='';
        if (element('list', $result)) {
            foreach (element('list', $result) as $key => $val) {
        
           
                $member_group_name='';
                $where = array(
                    'mem_id' => element('mem_id', $val),
                );
                
                $this->load->model('Member_group_member_model');
                $member_group = $this->Member_group_member_model->get('', '', $where, '', 0, 'mgm_id', 'ASC');
                if ($member_group && is_array($member_group)) {

                    $this->load->model('Member_group_model');

                    foreach ($member_group as $gkey => $gval) {
                        $item = $this->Member_group_model->item(element('mgr_id', $gval));
                        if ($member_group_name) {
                            $member_group_name.= ', ';
                        }
                        $member_group_name .= element('mgr_title', $item);
                        $member_group_post_list['member_group_name_list'][element('mgr_id', $item)]=$member_group_name;
                        $member_group_post_list['search_list'][element('mgr_id', $item)][element('post_id', $val)] = array('mgr_title' => $member_group_name,'post_title' => element('post_title', $val));
                    }


                }
            }
        }
        return $member_group_post_list;
    }
}
