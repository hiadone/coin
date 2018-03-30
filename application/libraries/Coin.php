<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Member class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * member table 을 관리하는 class 입니다.
 */
class Coin extends CI_Controller
{

    private $CI;

    private $mb;

    private $member_group;

    public $vic_type = array("bithumb"=>"빗 썸",
                    "coinone"=>"코 인 원",
                    "korbit"=>"코 빗",
                    "upbit"=>"업 비 트",
                    "coinnest"=>"코인네스트",
                    "bittrex"=>"비트렉스",
                    "poloniex"=>"플로닉스",
                    "bitfinex"=>"파이넥스"
                    );

    public $vic_name = array("bitcoin"=>"비트코인",
                    "ethereum"=>"이더리움",
                    "ripple"=>"리 플",
                    "bitcoin-cash"=>"비트코인 캐쉬",
                    "litecoin"=>"라이트코인",
                    "dash"=>"대 시",
                    "monero"=>"모네로",
                    "ethereum-classic"=>"이더리움 클래식",
                    "zcash"=>"제트캐시",
                    "qtum"=>"큐 텀",
                    "eos"=>"EOS"
                    );

    public $vic_title = array(
                            "btc"=>array(
                                'BTC','btc','btc_krw','krw-btc','usdt_btc','usdt-btc','btcusd','BTC_JPY'
                            ),
                            "eth"=>array(
                                'ETH','eth','eth_krw','krw-eth','usdt_eth','usdt-eth','ethusd'
                            ),
                            "dash"=>array(
                                'DASH','dash','dash_krw','krw-dash','usdt_dash','usdt-dash','dashusd'
                            ),
                            "xrp"=>array(
                                'XRP','xrp','xrp_krw','krw-xrp','usdt_xrp','usdt-xrp','xrpusd'
                            ),
                            "ltc"=>array(
                                'LTC','ltc','ltc_krw','krw-ltc','usdt_ltc','usdt-ltc','ltcusd'
                            ),
                            "etc"=>array(
                                'ETC','etc','etc_krw','krw-etc','usdt_etc','usdt-etc','etcusd'
                            ),
                            "bch"=>array(
                                'BCH','bch','bch_krw','krw-bch','usdt_bch','usdt-bcc','bchusd'
                            ),
                            "xmr"=>array(
                                'XMR','xmr','xmr_krw','krw-xmr','usdt_xmr','usdt-xmr','xmrusd'
                            ),
                            "zec"=>array(
                                'ZEC','zec','zec_krw','krw-zec','usdt_zec','usdt-zec','zecusd'
                            ),
                            "qtum"=>array(
                                'QTUM','qtum','qtum_krw','krw-qtum','usdt_qtum','usdt-qtum','qtumusd'
                            ),
                            "btg"=>array(
                                'BTG','btg','btg_krw','krw-btg','usdt_btg','usdt-btg','btgusd'
                            ),
                        );

    function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->load->model( array('Virtual_coin_model'));
        $this->CI->load->helper( array('array'));
    }


    
    public function all_price($config)
    {   

        $skin = element('skin', $config);
        $cur_unit = element('cur_unit', $config);

        $cache_minute = element('cache_minute', $config);
        if (empty($skin)) {
            $skin = 'basic';
        }

        if($skin==='mobile'){
            if (empty($cur_unit)) {
                $cur_unit = 'krw';
            }

            $btcwhere_in = array("vic_type"=>array(
                'bitfinex','bittrex','poloniex'
            ));
            $deal_bas_r=0;
            $deal_bas_r = $this->CI->Virtual_coin_model
                ->get_one('','vic_value',array("vic_type"=>"deal_bas_r","vic_title"=>"deal_bas_r","vic_key"=>"deal_bas_r"));
            
            
            
            $abroad_list = $this->CI->Virtual_coin_model
                ->get_list_in('',$btcwhere_in);

            foreach($abroad_list as $value){
                $title_key='';
                $vic_type='';
                
                if(element('vic_type',$value)==='poloniex'){
                    if(element('vic_key',$value)==='last'){
                        $vic_type='current_price';
                        
                    } else continue;
                } elseif(element('vic_type',$value)==='bittrex'){
                    if(element('vic_key',$value)==='Last'){
                        $vic_type='current_price';
                    }else continue;
                } elseif(element('vic_type',$value)==='bitfinex'){
                    if(element('vic_key',$value)==='last_price'){
                        $vic_type='current_price';
                    }else continue;
                }else continue;   

                foreach($this->vic_title as $tkey =>$tvalue){
                    if(in_array(element('vic_title',$value), $tvalue)) {
                        $title_key =$tkey;
                        break;
                    }
                }
                
                if($vic_type==='current_price' && $cur_unit ==='krw') 
                    $abroad_result[$title_key][element('vic_type',$value)][$vic_type] = (element('vic_value',$value)*element('vic_value',$deal_bas_r,0)) ;
                else $abroad_result[$title_key][element('vic_type',$value)][$vic_type] = element('vic_value',$value);
            }
            $abroad_price='';

            foreach($abroad_result as $key =>$value){
                $abroad_current_price='';
                foreach($value as $value_){
                    $abroad_current_price +=element('current_price',$value_,.0);
                }

                $abroad_price[$key]=$abroad_current_price/count($value);
            }

            $findex = "vic_type ='bithumb',vic_type='coinone',vic_type ='korbit',vic_type ='upbit',vic_type ='coinnest',vic_type ='bittrex',vic_type ='poloniex',vic_type ='bitfinex'";
            $btc_list = $this->CI->Virtual_coin_model
                ->get('','','','','',$findex,'DESC');

            $result=array();
            foreach($this->vic_title as $tkey =>$tvalue){
                foreach($this->vic_type as $pkey =>$pvalue){
                    $result[$tkey][$pkey]='';
                }
            }
            
            
            foreach($btc_list as $value){
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
                        $vic_type='open_price';
                    } elseif(element('vic_key',$value)==='closing_price'){                    
                        $vic_type='current_price';
                    }else continue;
                    
                    if($cur_unit ==='usd') 
                     $value['vic_value'] = (element('vic_value',$value)/element('vic_value',$deal_bas_r,0)) ;
                } 
                elseif(element('vic_type',$value)==='coinone'){
                    if(element('vic_key',$value)==='last'){
                        $vic_type='current_price';
                    } elseif(element('vic_key',$value)==='yesterday_last'){
                        $vic_type='open_price';
                    }else continue;

                    if($cur_unit ==='usd') 
                     $value['vic_value'] = (element('vic_value',$value)/element('vic_value',$deal_bas_r,0)) ;
                }     
                elseif(element('vic_type',$value)==='upbit'){
                    if(element('vic_key',$value)==='tradePrice'){
                        $vic_type='current_price';
                    } elseif(element('vic_key',$value)==='openingPrice'){
                        $vic_type='open_price';
                    }else continue;

                    if($cur_unit ==='usd') 
                     $value['vic_value'] = (element('vic_value',$value)/element('vic_value',$deal_bas_r,0)) ;
                }    
                elseif(element('vic_type',$value)==='korbit'){
                    if(element('vic_key',$value)==='last'){
                        $vic_type='current_price';
                        
                    } elseif(element('vic_key',$value)==='yesterday_last'){
                        $vic_type='open_price';
                    }else continue;

                    if($cur_unit ==='usd') 
                     $value['vic_value'] = (element('vic_value',$value)/element('vic_value',$deal_bas_r,0)) ;
                }    
                elseif(element('vic_type',$value)==='coinnest'){
                    if(element('vic_key',$value)==='last'){
                        $vic_type='current_price';
                    } else continue;

                    if($cur_unit ==='usd') 
                     $value['vic_value'] = (element('vic_value',$value)/element('vic_value',$deal_bas_r,0)) ;
                }    
                elseif(element('vic_type',$value)==='poloniex'){

                    if(element('vic_key',$value)==='last'){
                        $vic_type='current_price';
                        
                    } elseif(element('vic_key',$value)==='yesterday_last'){
                        $vic_type='open_price';
                    }else continue;

                    if($cur_unit ==='krw') {
                     $value['vic_value'] = (element('vic_value',$value)*element('vic_value',$deal_bas_r,0)) ;

                    }
                }    
                elseif(element('vic_type',$value)==='bittrex'){
                    if(element('vic_key',$value)==='Last'){
                        $vic_type='current_price';
                    }else continue;
                    if($cur_unit ==='krw') {
                        
                     $value['vic_value'] = (element('vic_value',$value)*element('vic_value',$deal_bas_r,0)) ;
                     
                    }
                 
                }    
                elseif(element('vic_type',$value)==='bitfinex'){
                    if(element('vic_key',$value)==='last_price'){
                        $vic_type='current_price';
                    }else continue;

                    if($cur_unit ==='krw') 
                     $value['vic_value'] = (element('vic_value',$value)*element('vic_value',$deal_bas_r,0)) ;
                // }    
                // elseif(element('vic_type',$value)==='bitflye'){
                //     if(element('vic_key',$value)==='ltp'){
                //         $vic_type='current_price';
                //     }else continue;
                }else continue;

                

                $result[$title_key][element('vic_type',$value)][$vic_type] = element('vic_value',$value);
                if($vic_type==='current_price' && !empty($abroad_price[$title_key]) && (element('vic_type',$value)==='bithumb' || element('vic_type',$value)==='coinone' || element('vic_type',$value)==='upbit' || element('vic_type',$value)==='korbit')) $result[$title_key][element('vic_type',$value)]['kprime'] = (element('vic_value',$value)-$abroad_price[$title_key])/$abroad_price[$title_key];
            }
        } elseif($skin==='basic') {
            
            $deal_bas_r=0;
            $deal_bas_r = $this->CI->Virtual_coin_model
                ->get('','vic_value',array("vic_type"=>"deal_bas_r","vic_title"=>"deal_bas_r"));

            $where=array();

            $where=array(
                'vic_type' => 'coinmarketcap',
            );

            $findex = "rank'";
            $btc_list = $this->CI->Virtual_coin_model
                ->get('','',$where);


            $result=array();
            // foreach($this->vic_title as $tkey =>$tvalue){
            //     foreach($this->vic_type as $pkey =>$pvalue){
            //         $result[$tkey][$pkey]='';
            //     }
            // }

            foreach($btc_list as $value){

                    

                    
                    $result[$value['vic_title']][$value['vic_key']]=$value['vic_value'];    
                    
                    

                
            }

            
        }

        $view['view']['vic_type'] = $this->vic_type;
        $view['view']['coin_list'] = $result;
        $view['view']['deal_bas_r'] = $deal_bas_r;
        $view['view']['skinurl'] = base_url( VIEW_DIR . 'main/' . $skin);
        $html = $this->CI->load->view('main/' . $skin . '/view_coin', $view, true);

        if ($cache_minute> 0) {
            check_cache_dir('latest');
            $this->CI->cache->save($cachename, $html, $cache_minute);
        }

        return $html;

        
    }

    function get_deal_bas_r(){


        $url = 'https://www.koreaexim.go.kr/site/program/financial/exchangeJSON?authkey='.config_item('authkey').'&data=AP01&cur_unit=USD';
            // $url.= sprintf("?client_id=%s&client_secret=%s&grant_type=authorization_code&state=%s&code=%s",
            //     $this->cbconfig->item('naver_client_id'), $this->cbconfig->item('naver_client_secret'), $this->input->get('state', null, ''), $this->input->get('code'));

            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt ($ch, CURLOPT_SSLVERSION,1);
            curl_setopt ($ch, CURLOPT_HEADER, 0);
            curl_setopt ($ch, CURLOPT_POST, 0);
            curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt ($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            $json = json_decode($result, true);

        
    }
    
}
