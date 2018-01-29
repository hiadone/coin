<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Bannerclick class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 관리자>페이지설정>배너 클릭 controller 입니다.
 */
class Cron extends CB_Controller {

 

    protected $models = array('Virtual_coin');

    function __construct()
    {
        parent::__construct();

        /**
         * 라이브러리를 로딩합니다
         */
        

        /**
         * 로그인이 필요한 페이지입니다
         */
        
    }

    public function member_laverup(){

        $this->load->model(array('Member_model', 'Member_level_history_model','Member_group_member_model'));
        // 이벤트 라이브러리를 로딩합니다

        $updatedata = array(
            'mem_level' => $next_level,
        );
        $this->Member_model->update($mem_id, $updatedata);

        
        $levelhistoryinsert = array(
            'mem_id' => $mem_id,
            'mlh_from' => $this->member->item('mem_level'),
            'mlh_to' => $next_level,
            'mlh_datetime' => cdate('Y-m-d H:i:s'),
            'mlh_reason' => '레벨업',
            'mlh_ip' => $this->input->ip_address(),
        );
        $this->Member_level_history_model->insert($levelhistoryinsert);

        
        $deletewhere = array(
            'mem_id' => $mem_id,
        );
        $this->Member_group_member_model->delete_where($deletewhere);
        if ($this->input->post('member_group')) {
            foreach ($this->input->post('member_group') as $gkey => $gval) {
                $mginsert = array(
                    'mgr_id' => $gval,
                    'mem_id' => $mem_id,
                    'mgm_datetime' => cdate('Y-m-d H:i:s'),
                );
                $this->Member_group_member_model->insert($mginsert);
            }
        }
    }

    

    public function bithumb_price()
    {

        // $deletewhere = array(
        //     'mem_id' => $mem_id,
        // );
        // $this->Virtual_coin_model->delete_where($deletewhere);

         // status  결과 상태 코드 (정상 : 0000, 정상이외 코드는 에러 코드 참조)
        // opening_price   최근 24시간 내 시작 거래금액
        // closing_price   최근 24시간 내 마지막 거래금액
        // min_price   최근 24시간 내 최저 거래금액
        // max_price   최근 24시간 내 최고 거래금액
        // average_price   최근 24시간 내 평균 거래금액
        // units_traded    최근 24시간 내 Currency 거래량
        // volume_1day 최근 1일간 Currency 거래량
        // volume_7day 최근 7일간 Currency 거래량
        // buy_price   거래 대기건 최고 구매가
        // sell_price  거래 대기건 최소 판매가
        // date    현재 시간 Timestamp
        // 이벤트 라이브러리를 로딩합니다


        $url = 'https://api.bithumb.com/public/ticker/ALL';
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
        if(element('status',$json)==="0000"){
            $tempwhere = array(
                    'vic_type' => 'bithumb',
                );
            $this->Virtual_coin_model->delete_where($tempwhere);

            foreach(element('data',$json) as $key => $value){
                $virtualcoindata='';
                if($key==='date'){
                    $virtualcoindata = array(
                        $key => element($key,element('data',$json),''),
                    );
                } else {
                    foreach($value as $key_ => $value_){
                        $virtualcoindata[$key_] = element($key_,element($key,element('data',$json)),'');
                    }
                }
                $this->Virtual_coin_model->save('bithumb',$key, $virtualcoindata);
            }
        }
        
    }

    public function coinone_price()
    {   
        /*
        last : 현 거래가
        yesterday_volume : 어제 거래량
        yesterday_last : 어제 마지막 거래가 
        */
    
        $url = 'https://api.coinone.co.kr/ticker?currency=all';
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

        if(element('errorCode',$json)==="0"){
            $tempwhere = array(
                    'vic_type' => 'coinone',
                );
            $this->Virtual_coin_model->delete_where($tempwhere);
            foreach($json as $key => $value){
                $virtualcoindata='';
                if(is_array($value)){

                    foreach($value as $key_ => $value_){
                        $virtualcoindata[$key_] = element($key_,element($key,$json),'');
                    }
                    
                    
                } else {
                    if($key==='timestamp'){
                        $virtualcoindata = array(
                            $key => element($key,$json,''),
                        );
                    }

                }
                $this->Virtual_coin_model->save('coinone',$key, $virtualcoindata);
            }
        }
    }

    public function korbit_price()
    {

        


        /**
             * get_ticker_detailed
             *
             * 시장 현황 상세정보
             *
             * @param   array       $param
             *          string      $param['currecy_pair']      btc_krw (비트코인) / etc_krw (이더리움 클래식) / eth_krw (이더리움) / xrp_krw (리플)
             *
             * @return  array       $data
             *          int         $data['timestamp']          최종 체결 시각.
             *          int         $data['last']               최종 체결 가격.
             *          int         $data['bid']                최우선 매수호가. 매수 주문 중 가장 높은 가격.
             *          int         $data['ask']                최우선 매도호가. 매도 주문 중 가장 낮은 가격.
             *          int         $data['low']                (최근 24시간) 저가. 최근 24시간 동안의 체결 가격 중 가장 낮 가격.
             *          int         $data['high']               (최근 24시간) 고가. 최근 24시간 동안의 체결 가격 중 가장 높은 가격.
             *          int         $data['volume']             거래량.
             *          int         $data['change']             변동가.
             *          int         $data['changePercent']             변동률.
             */

        $currency_pair=array('btc_krw','eth_krw','dash_krw','xrp_krw','bch_krw','ltc_krw','qtum_krw','etc_krw','xmr_krw','zec_krw','btg_krw');

        foreach($currency_pair as $cvalue){
            $url = 'https://api.korbit.co.kr/v1/ticker/detailed?currency_pair='.$cvalue;
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
            
            if(element('timestamp',$json)){
                $tempwhere = array(
                        'vic_type' => 'korbit',
                        'vic_title' => $cvalue,
                    );
                $this->Virtual_coin_model->delete_where($tempwhere);
                $virtualcoindata='';
                foreach($json as $key => $value){
                    
                    
                    $virtualcoindata[$key] = element($key,$json,'');
                    
                    
                }
                $virtualcoindata['yesterday_last'] = element('last',$json,'')-element('change',$json,'');
                $this->Virtual_coin_model->save('korbit',$cvalue, $virtualcoindata);
            }
        }
    }

    public function upbit_price()
    {   
        /*
        openingPrice:시작가
        tradePrice : 현제 거래가
        candleAccTradeVolume : 거래량 
        */
        $currency_pair=array('krw-btc','krw-eth','krw-dash','krw-xrp','krw-bch','krw-ltc','krw-qtum','krw-etc','krw-xmr','krw-zec','krw-btg');
        
        foreach($currency_pair as $cvalue){
            $url = 'https://crix-api-endpoint.upbit.com/v1/crix/candles/minutes/10?code=CRIX.UPBIT.'.strtoupper($cvalue);
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

            if(element('tradePrice',element(0,$json))){
                $tempwhere = array(
                        'vic_type' => 'upbit',
                        'vic_title' => $cvalue,
                    );
                $this->Virtual_coin_model->delete_where($tempwhere);
                $virtualcoindata='';
                foreach(element(0,$json) as $key => $value){
                    
                    
                    $virtualcoindata[$key] = element($key,element(0,$json),'');
                    
                    
                }
                $this->Virtual_coin_model->save('upbit',$cvalue, $virtualcoindata);
            }
        }
        
    }

    public function coinnest_price()
    {

        // {"high":최고가,"low":최저가,"last":거래가,"vol":거래량,"time":1515980159}

        $currency_pair=array('btc','eth','dash','xrp','bch','ltc','qtum','etc','xmr','zec','btg');

        foreach($currency_pair as $cvalue){
            $url = 'https://api.coinnest.co.kr/api/pub/ticker?coin='.$cvalue;
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

            if(element('time',$json)){
                $tempwhere = array(
                        'vic_type' => 'coinnest',
                        'vic_title' => $cvalue,
                    );
                $this->Virtual_coin_model->delete_where($tempwhere);
                $virtualcoindata='';
                foreach($json as $key => $value){
                    
                    
                    $virtualcoindata[$key] = element($key,$json,'');
                    
                    
                }
                $this->Virtual_coin_model->save('coinnest',$cvalue, $virtualcoindata);
            }
        }
        
    }

    public function poloniex_price()
    {   

        // "id":121,"last":현재가,"percentChange":"변동률","quoteVolume":"거래량"

        $currency_pair=array('usdt_btc','usdt_eth','usdt_dash','usdt_xrp','usdt_bch','usdt_ltc','usdt_qtum','usdt_etc','usdt_xmr','usdt_zec','usdt_btg');


        $url = 'https://poloniex.com/public?command=returnTicker';
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

        foreach($currency_pair as $cvalue){            

            if(element(strtoupper($cvalue),$json)){
                $tempwhere = array(
                        'vic_type' => 'poloniex',
                        'vic_title' => $cvalue,
                    );
                $this->Virtual_coin_model->delete_where($tempwhere);
                $virtualcoindata='';
                foreach(element(strtoupper($cvalue),$json) as $key => $value){
                    $virtualcoindata[$key] = element($key,element(strtoupper($cvalue),$json),'');
      
                }
                $virtualcoindata['yesterday_last'] = element('last',element(strtoupper($cvalue),$json),'') - (element('last',element(strtoupper($cvalue),$json),'') * element('percentChange',element(strtoupper($cvalue),$json),''));
                
                
                $this->Virtual_coin_model->save('poloniex',$cvalue, $virtualcoindata);
            }
            
        }
    }

    public function bittrex_price()
    {

        // {"success":true,"message":"","result":[{"MarketName":"BTC-ETH","Volume":거래량 ,"Last":거래가,"BaseVolume":거래량,"TimeStamp":"2018-01-15T01:59:22.003","Bid":0.09850041,"Ask":0.09868444,"OpenBuyOrders":6140,"OpenSellOrders":3942,"PrevDay":0.09670000,"Created":"2015-08-14T09:02:24.817"}]}

        $currency_pair=array('usdt-btc','usdt-eth','usdt-dash','usdt-xrp','usdt-bch','usdt-ltc','usdt-qtum','usdt-etc','usdt-xmr','usdt-zec','usdt-btg');

        foreach($currency_pair as $cvalue){
            $url = 'https://bittrex.com/api/v1.1/public/getmarketsummary?market='.$cvalue;
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

            if(element('success',$json)){
                
                $tempwhere = array(
                        'vic_type' => 'bittrex',
                        'vic_title' => $cvalue,
                    );
                $this->Virtual_coin_model->delete_where($tempwhere);
                $virtualcoindata='';
                foreach(element(0,element('result',$json)) as $key => $value){
                    
                    
                    $virtualcoindata[$key] = element($key,element(0,element('result',$json)),'');
                    
                    
                }
                $this->Virtual_coin_model->save('bittrex',$cvalue, $virtualcoindata);
            }
        }
        
    }

    public function bitfinex_price()
    {   
        // {"mid":"13580.5","bid":"13580.0","ask":"13581.0","last_price":현재가,"low":"12874.34212454","high":"14373.0","volume":"거래량","timestamp":"1515981771.364414"}
        $currency_pair=array('btcusd','ethusd','dashusd','xrpusd','bchusd','ltcusd','qtumusd','etcusd','xmrusd','zecusd','btgusd');

        foreach($currency_pair as $cvalue){
            $url = 'https://api.bitfinex.com/v1/pubticker/'.$cvalue;
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

            if(element('mid',$json)){
                $tempwhere = array(
                        'vic_type' => 'bitfinex',
                        'vic_title' => $cvalue,
                    );
                $this->Virtual_coin_model->delete_where($tempwhere);
                $virtualcoindata='';
                foreach($json as $key => $value){
                    
                    
                    $virtualcoindata[$key] = element($key,$json,'');
                    
                    
                }
                $this->Virtual_coin_model->save('bitfinex',$cvalue, $virtualcoindata);
            }
        }
        
    }


    public function bitflyer_price()
    {   

        // {"product_code":"BTC_JPY","timestamp":"2018-01-15T02:04:05.733","tick_id":3090049,"best_bid":1714507.0,"best_ask":1715277.0,"best_bid_size":2.7064,"best_ask_size":10.39996,"total_bid_depth":2515.0200327,"total_ask_depth":2762.33896938,"ltp":거래가"volume":93727.63585889,"volume_by_product":거래량}
        $currency_pair=array('btcusd','ethusd','dashusd','xrpusd','bchusd','ltcusd','qtumusd','etcusd','xmrusd','zecusd','btgusd');

        
        $url = 'https://api.bitflyer.jp/v1/ticker';
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

        if(element('product_code',$json)){
            $tempwhere = array(
                    'vic_type' => 'bitflye',
                    'vic_title' => 'BTC_JPY',
                );
            $this->Virtual_coin_model->delete_where($tempwhere);
            
            $virtualcoindata='';
                foreach($json as $key => $value){
                    
                    
                    $virtualcoindata[$key] = element($key,$json,'');
                    
                    
                }
            $this->Virtual_coin_model->save('bitflye','BTC_JPY', $virtualcoindata);
        }
    
        
    }

    public function all_price(){
        $this->bithumb_price();
        $this->coinone_price();
        $this->korbit_price();
        $this->upbit_price();
        $this->coinnest_price();
        $this->poloniex_price();
        $this->bittrex_price();
        $this->bitfinex_price();
        $this->bitflyer_price();

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

            

            

            $tempwhere = array(
                    'vic_type' => 'deal_bas_r',
                    'vic_title' => 'deal_bas_r',
                );
            $this->Virtual_coin_model->delete_where($tempwhere);
            
            $virtualcoindata=array();
                
                    
                    
            $virtualcoindata['deal_bas_r'] = str_replace(",","",element('deal_bas_r',element(0,$json)));;
                    
                    
                
            $this->Virtual_coin_model->save('deal_bas_r','deal_bas_r', $virtualcoindata);
    }
}
