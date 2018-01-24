<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Virtual_coin class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 소셜로그인 관련 controller 입니다.
 */
class Virtual_coin extends CB_Controller
{

    /**
     * 모델을 로딩합니다
     */
    protected $models = array('Virtual_coin');

    /**
     * 헬퍼를 로딩합니다
     */
    protected $helpers = array('form', 'array');

    public $primetype = array(
        'bitfinex',
        'bittrex',
        'poloniex',
        'bitflye',
    );

    function __construct()
    {
        parent::__construct();

        /**
         * 라이브러리를 로딩합니다
         */
        $this->load->library(array('querystring'));
    }




    public function btc_price()
    {

       
        $eventname = 'event_virtual_coin';
        $this->load->event($eventname);

        // 이벤트가 존재하면 실행합니다
        Events::trigger('before', $eventname);

        $where = array("vic_type"=> "bithumb");

        $btcwhere_in = array("vic_title"=>array(
            'BTC','btc','btc_krw','krw-btc','usdt_btc','btc-btcd','btcusd','BTC_JPY'
        ));
        


        $btc_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        $result='';

        foreach($btc_list as $value){
            $result[element('vic_type',$value)][element('vic_key',$value)] = element('vic_value',$value);
        }

        exit(json_encode($result));
      
    }

    public function bithumb_prime()
    {

       
        $eventname = 'event_virtual_coin';
        $this->load->event($eventname);

        // 이벤트가 존재하면 실행합니다
        Events::trigger('before', $eventname);

        $btcwhere_in = array("vic_type"=>array(
            'bitfinex','bittrex','poloniex','bitflye'
        ));


        $btc_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        $result='';

        foreach($btc_list as $value){
            $result[element('vic_type',$value)][element('vic_key',$value)] = element('vic_value',$value);
        }

        exit(json_encode($result));
      
    }

    public function eth_price()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_virtual_coin';
        $this->load->event($eventname);

        // 이벤트가 존재하면 실행합니다
        Events::trigger('before', $eventname);

        $btcwhere_in = array(
            'ETH','eth','eth_krw','krw-eth','usdt_eth','btc-eth','ethusd'
        );


        $btc_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        $result='';

        foreach($btc_list as $value){
            $result[element('vic_type',$value)][element('vic_key',$value)] = element('vic_value',$value);
        }

        exit(json_encode($result));
      
    }


    

    public function dash_price()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_virtual_coin';
        $this->load->event($eventname);

        // 이벤트가 존재하면 실행합니다
        Events::trigger('before', $eventname);

        $btcwhere_in = array(
            'DASH','dash','dash_krw','krw-dash','usdt_dash','btc-dash','dashusd'
        );


        $btc_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        $result='';

        foreach($btc_list as $value){
            $result[element('vic_type',$value)][element('vic_key',$value)] = element('vic_value',$value);
        }

        exit(json_encode($result));
        
    }

    public function xrp_price()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_virtual_coin';
        $this->load->event($eventname);

        // 이벤트가 존재하면 실행합니다
        Events::trigger('before', $eventname);

        $btcwhere_in = array(
            'XRP','xrp','xrp_krw','krw-xrp','usdt_xrp','btc-xrp','xrpusd'
        );


        $btc_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        $result='';

        foreach($btc_list as $value){
            $result[element('vic_type',$value)][element('vic_key',$value)] = element('vic_value',$value);
        }

        exit(json_encode($result));
        
    }

    public function bch_price()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_virtual_coin';
        $this->load->event($eventname);

        // 이벤트가 존재하면 실행합니다
        Events::trigger('before', $eventname);

        $btcwhere_in = array(
            'BCH','bch','bch_krw','krw-bch','usdt_bch','btc-bch','bchusd'
        );


        $btc_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        $result='';

        foreach($btc_list as $value){
            $result[element('vic_type',$value)][element('vic_key',$value)] = element('vic_value',$value);
        }

        exit(json_encode($result));
        
    }

    public function ltc_price()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_virtual_coin';
        $this->load->event($eventname);

        // 이벤트가 존재하면 실행합니다
        Events::trigger('before', $eventname);

        $btcwhere_in = array(
            'LTC','ltc','ltc_krw','krw-ltc','usdt_ltc','btc-ltc','ltcusd'
        );


        $btc_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        $result='';

        foreach($btc_list as $value){
            $result[element('vic_type',$value)][element('vic_key',$value)] = element('vic_value',$value);
        }

        exit(json_encode($result));
        
    }

    public function qtum_price()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_virtual_coin';
        $this->load->event($eventname);

        // 이벤트가 존재하면 실행합니다
        Events::trigger('before', $eventname);

        $btcwhere_in = array(
            'QTUM','qtum','qtum_krw','krw-qtum','usdt_qtum','btc-qtum','qtumusd'
        );


        $btc_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        $result='';

        foreach($btc_list as $value){
            $result[element('vic_type',$value)][element('vic_key',$value)] = element('vic_value',$value);
        }

        exit(json_encode($result));
        
    }

    public function etc_price()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_virtual_coin';
        $this->load->event($eventname);

        // 이벤트가 존재하면 실행합니다
        Events::trigger('before', $eventname);

        $btcwhere_in = array(
            'ETC','etc','etc_krw','krw-etc','usdt_etc','btc-etc','etcusd'
        );


        $btc_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        $result='';

        foreach($btc_list as $value){
            $result[element('vic_type',$value)][element('vic_key',$value)] = element('vic_value',$value);
        }

        exit(json_encode($result));
        
    }
}
