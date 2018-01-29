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

    public $vic_title = array("BTC"=>array(
            'BTC','btc','btc_krw','krw-btc','usdt_btc','btc-btcd','btcusd','BTC_JPY'
            ),"ETH"=>array(
            'ETH','eth','eth_krw','krw-eth','usdt_eth','btc-eth','ethusd'
            ),"DASH"=>array(
            'DASH','dash','dash_krw','krw-dash','usdt_dash','btc-dash','dashusd'
            ),"XRP"=>array(
            'XRP','xrp','xrp_krw','krw-xrp','usdt_xrp','btc-xrp','xrpusd'
            ),"BCH"=>array(
            'BCH','bch','bch_krw','krw-bch','usdt_bch','btc-bch','bchusd'
            ),"LTC"=>array(
            'LTC','ltc','ltc_krw','krw-ltc','usdt_ltc','btc-ltc','ltcusd'
            ),"QTUM"=>array(
            'QTUM','qtum','qtum_krw','krw-qtum','usdt_qtum','btc-qtum','qtumusd'
            ),"ETC"=>array(
            'ETC','etc','etc_krw','krw-etc','usdt_etc','btc-etc','etcusd'
            )
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

        $btcwhere_in = array("vic_title"=>$this->vic_title['BTC']);
        


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

        $btcwhere_in = array("vic_title"=>$this->vic_title['ETH']);


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

        $btcwhere_in = array("vic_title"=>$this->vic_title['DASH']);
            


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

        $btcwhere_in = array("vic_title"=>$this->vic_title['XRP']);
           


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

        $btcwhere_in = array("vic_title"=>$this->vic_title['BCH']);
            


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

        $btcwhere_in = array("vic_title"=>$this->vic_title['LTC']);


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

        $btcwhere_in = array("vic_title"=>$this->vic_title['QTUM']);


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

        $btcwhere_in = array("vic_title"=>$this->vic_title['ETC']);


        $btc_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        $result='';

        foreach($btc_list as $value){
            $result[element('vic_type',$value)][element('vic_key',$value)] = element('vic_value',$value);
        }

        exit(json_encode($result));
        
    }

    public function all_price($json=0)
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_virtual_coin';
        $this->load->event($eventname);

        // 이벤트가 존재하면 실행합니다
        Events::trigger('before', $eventname);

        
        

        $btcwhere_in = array("vic_type"=>array(
            'bitfinex','bittrex','poloniex'
        ));


        $abroad_list = $this->Virtual_coin_model
            ->get_list_in('',$btcwhere_in);

        foreach($abroad_list as $value){
            $title_key='';
            $vic_type='';
            

            foreach($this->vic_title as $tkey =>$tvalue){
                if(in_array(element('vic_title',$value), $tvalue)) {
                    $title_key =$tkey;
                    break;
                }
            }
            if(element('vic_type',$value)==='poloniex'){
                if(element('vic_key',$value)==='last'){
                    $vic_type='current_price';
                    
                } else continue;
            }    
            if(element('vic_type',$value)==='bittrex'){
                if(element('vic_key',$value)==='Last'){
                    $vic_type='current_price';
                }else continue;
            }    
            if(element('vic_type',$value)==='bitfinex'){
                if(element('vic_key',$value)==='last_price'){
                    $vic_type='current_price';
                }else continue;
            }   
            
            $abroad_result[$title_key][element('vic_type',$value)][$vic_type] = element('vic_value',$value);
        }
        $abroad_price='';

        foreach($abroad_result as $key =>$value){
            $abroad_current_price='';
            foreach($value as $value_){
                $abroad_current_price +=element('current_price',$value_,.0);
            }

            $abroad_price[$key]=$abroad_current_price/count($value);
        }

        
        $btc_list = $this->Virtual_coin_model
            ->_get_list_common();

        $result='';
        
        foreach(element('list',$btc_list) as $value){
            $title_key='';
            $vic_type='';
            

            foreach($this->vic_title as $tkey =>$tvalue){
                if(in_array(element('vic_title',$value), $tvalue)) {
                    $title_key =$tkey;
                    break;
                }
            }
            if(element('vic_type',$value)==='bithumb'){
                if(element('vic_key',$value)==='opening_price'){
                    $vic_type='current_price';
                } elseif(element('vic_key',$value)==='closing_price'){
                    $vic_type='open_price';
                }else continue;
                
            } 
            elseif(element('vic_type',$value)==='coinone'){
                if(element('vic_key',$value)==='last'){
                    $vic_type='current_price';
                } elseif(element('vic_key',$value)==='yesterday_last'){
                    $vic_type='open_price';
                }else continue;
            }     
            elseif(element('vic_type',$value)==='upbit'){
                if(element('vic_key',$value)==='tradePrice'){
                    $vic_type='current_price';
                } elseif(element('vic_key',$value)==='openingPrice'){
                    $vic_type='open_price';
                }else continue;
            }    
            elseif(element('vic_type',$value)==='korbit'){
                if(element('vic_key',$value)==='last'){
                    $vic_type='current_price';
                    
                } elseif(element('vic_key',$value)==='yesterday_last'){
                    $vic_type='open_price';
                }else continue;
            }    
            elseif(element('vic_type',$value)==='coinnest'){
                if(element('vic_key',$value)==='last'){
                    $vic_type='current_price';
                } else continue;
            }    
            elseif(element('vic_type',$value)==='poloniex'){
                if(element('vic_key',$value)==='last'){
                    $vic_type='current_price';
                    
                } elseif(element('vic_key',$value)==='yesterday_last'){
                    $vic_type='open_price';
                }else continue;
            }    
            elseif(element('vic_type',$value)==='bittrex'){
                if(element('vic_key',$value)==='Last'){
                    $vic_type='current_price';
                }else continue;
            }    
            elseif(element('vic_type',$value)==='bitfinex'){
                if(element('vic_key',$value)==='last_price'){
                    $vic_type='current_price';
                }else continue;
            }    
            elseif(element('vic_type',$value)==='bitflye'){
                if(element('vic_key',$value)==='ltp'){
                    $vic_type='current_price';
                }else continue;
            }else continue;
            $result[$title_key][element('vic_type',$value)][$vic_type] = element('vic_value',$value);
            if($vic_type==='current_price' && !empty($abroad_price[$title_key])) $result[$title_key][element('vic_type',$value)]['kprime'] = (element('vic_value',$value)-$abroad_price[$title_key])/$abroad_price[$title_key];
        }

        
        if($json)
            exit(json_encode($result));
        else
            return $result;
    }
}
