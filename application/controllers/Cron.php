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

        $currency_pair=array('btc_krw','eth_krw','dash_krw','xrp_krw','bch_krw','ltc_krw','qtum_krw','etc_krw','xmr_krw','zec_krw','btg_krw','eos_krw');
        $currency_pair=array();
        foreach(config_item('coinname_list') as $key => $value){

            array_push($currency_pair,strtolower($key).'_krw');
            
        }
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
        $currency_pair=array('btc','krw-eth','krw-dash','krw-xrp','krw-bch','krw-ltc','krw-qtum','krw-etc','krw-xmr','krw-zec','krw-btg','krw-eos');
        
        $currency_pair=array();
        foreach(config_item('coinname_list') as $key => $value){

            array_push($currency_pair,'krw-'.strtolower($key));
            
        }

        foreach($currency_pair as $cvalue){
            $url = 'https://crix-api-endpoint.upbit.com/v1/crix/candles/days?code=CRIX.UPBIT.'.strtoupper($cvalue);
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

        $currency_pair=array('btc','eth','dash','xrp','bch','ltc','qtum','etc','xmr','zec','btg','eos');

        $currency_pair=array();
        foreach(config_item('coinname_list') as $key => $value){

            array_push($currency_pair,strtolower($key));
            
        }

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

        $currency_pair=array('usdt_btc','usdt_eth','usdt_dash','usdt_xrp','usdt_bch','usdt_ltc','usdt_qtum','usdt_etc','usdt_xmr','usdt_zec','usdt_btg','usdt_eos');

        $currency_pair=array();
        foreach(config_item('coinname_list') as $key => $value){

            array_push($currency_pair,'usdt_'.strtolower($key));
            
        }

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

        $currency_pair=array('usdt-btc','usdt-eth','usdt-dash','usdt-xrp','usdt-bcc','usdt-ltc','usdt-qtum','usdt-etc','usdt-xmr','usdt-zec','usdt-btg','usdt-eos');
        
        $currency_pair=array();
        foreach(config_item('coinname_list') as $key => $value){

            array_push($currency_pair,'usdt-'.strtolower($key));
            
        }

        foreach($currency_pair as $cvalue){

            if($cvalue==='usdt-qtum'){
                $url = 'https://api.coinhills.com/v1/cspa/qtum/usd/';
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


                    foreach(element('CSPA:QTUM/USD',element('data',$json)) as $key => $value){
                        
                        if($key==='cspa')
                        $virtualcoindata['Last'] = element('cspa',element('CSPA:QTUM/USD',element('data',$json)),'');
                        
                        // if($key==='cspa_change_24h')
                        // $virtualcoindata['yesterday_last'] = element('cspa_change_24h',element('CSPA:QTUM/USD',element('data',$json)),'');
                        
                    }
                    $this->Virtual_coin_model->save('bittrex',$cvalue, $virtualcoindata);
                }
            } else {
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
        
    }

    public function bitfinex_price()
    {   
        // {"mid":"13580.5","bid":"13580.0","ask":"13581.0","last_price":현재가,"low":"12874.34212454","high":"14373.0","volume":"거래량","timestamp":"1515981771.364414"}
        $currency_pair=array('btcusd','ethusd','dashusd','xrpusd','bchusd','ltcusd','qtumusd','etcusd','xmrusd','zecusd','btgusd','eosusd');

        $currency_pair=array();
        foreach(config_item('coinname_list') as $key => $value){

            array_push($currency_pair,strtolower($key).'usd');
            
        }

        foreach($currency_pair as $cvalue){
            $url = 'https://api.bitfinex.com/v1/pubticker/'.$cvalue;

            echo $url."<br>";
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
        $currency_pair=array('btcusd','ethusd','dashusd','xrpusd','bchusd','ltcusd','qtumusd','etcusd','xmrusd','zecusd','btgusd','eosusd');

        $currency_pair=array();
        foreach(config_item('coinname_list') as $key => $value){

            array_push($currency_pair,strtolower($key).'usd');
            
        }
        
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

    public function coinmarketcap_price()
    {   

        // {"product_code":"BTC_JPY","timestamp":"2018-01-15T02:04:05.733","tick_id":3090049,"best_bid":1714507.0,"best_ask":1715277.0,"best_bid_size":2.7064,"best_ask_size":10.39996,"total_bid_depth":2515.0200327,"total_ask_depth":2762.33896938,"ltp":거래가"volume":93727.63585889,"volume_by_product":거래량}
        

        
        $url = 'https://api.coinmarketcap.com/v1/ticker/?limit=200';
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
                'vic_type' => 'coinmarketcap',
            );
        $this->Virtual_coin_model->delete_where($tempwhere);
        
        $virtualcoindata='';
        foreach($json as $key => $value){
            
            foreach($value as $key_ => $value_){
                $virtualcoindata[$key_] = $value_;
            }

            $this->Virtual_coin_model->save('coinmarketcap',$value['symbol'], $virtualcoindata);
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
        $this->get_deal_bas_r();

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

        

            
            if(element('deal_bas_r',element(0,$json))){
                $tempwhere = array(
                        'vic_type' => 'deal_bas_r',
                        'vic_title' => 'deal_bas_r',
                    );
                $this->Virtual_coin_model->delete_where($tempwhere);
                
                $virtualcoindata=array();
                    
                        
                        
                $virtualcoindata['ttb'] = str_replace(",","",element('ttb',element(0,$json)));
                $virtualcoindata['tts'] = str_replace(",","",element('tts',element(0,$json)));
                $virtualcoindata['deal_bas_r'] = str_replace(",","",element('deal_bas_r',element(0,$json)));
                        
                        
                    
                $this->Virtual_coin_model->save('deal_bas_r','deal_bas_r', $virtualcoindata);
            }
    }

    public function attendance_scheduler()
    {

        if ( ! $this->cbconfig->item('use_attendance')) {
            return ;
        }

        $this->load->model('Attendance_model');
        
        $max_data = $this->Attendance_model->get_today_max_ranking();

        $max_ranking = element('att_ranking', $max_data);

        if (empty($max_ranking)) {
            $my_ranking = 1;
            
        } else {
            $my_ranking = $max_ranking + 1;
        }

        $attendance_default_memo = str_replace(
            array("\r\n", "\r", "\n"),
            "\n",
            $this->cbconfig->item('attendance_default_memo')
        );
        $default_memo = explode("\n", $attendance_default_memo);
        shuffle($default_memo);
        
        $attendance_att_demo = str_replace(
            array("\r\n", "\r", "\n"),
            "\n",
            config_item('att_demo')
        );
        $att_demo = explode("\n", $attendance_att_demo);
        shuffle($att_demo);

        
        $curdatetime = cdate('Y-m-d H:i:s', ctimestamp() - rand(1,60) * 6);

        $insertdata = array(
            'mem_id' => 41,
            'att_point' => $this->cbconfig->item('attendance_point'),
            'att_memo' => html_escape(element(0, $default_memo)),
            'att_continuity' => 0,
            'att_ranking' => $my_ranking,
            'att_date' => cdate('Y-m-d'),
            'att_datetime' => $curdatetime,
            'att_demo' => html_escape(element(0, $att_demo)),
        );
        $att_id = $this->Attendance_model->insert($insertdata);
    }


    public function express_scheduler()
    {

        

        $this->load->model('Post_model');
        
        $attendance_att_demo = str_replace(
            array("\r\n", "\r", "\n"),
            "\n",
            config_item('att_demo')
        );
        $att_demo = explode("\n", $attendance_att_demo);
        shuffle($att_demo);

        $express_default_memo = str_replace(
            array("\r\n", "\r", "\n"),
            "\n",
            config_item('express_default_memo')
        );
        $default_memo = explode("\n", $express_default_memo);
        shuffle($default_memo);


        $post_num = $this->Post_model->next_post_num();
        $post_reply = '';

        $curdatetime = cdate('Y-m-d H:i:s', ctimestamp() - rand(1,60) * 6);

        $updatedata = array(
            'post_num' => $post_num,
            'post_reply' => $post_reply,
            'post_title' => html_escape(element(0, $default_memo)),
            'post_content' => html_escape(element(1, $default_memo)),
            'post_html' => 1,
            'post_datetime' => $curdatetime,
            'post_updated_datetime' => $curdatetime,
            'post_ip' => $this->input->ip_address(),
            'brd_id' => 13,
        );


        $updatedata['mem_id'] = 41;
        $updatedata['post_userid'] = '';
        $updatedata['post_username'] = html_escape(element(0, $att_demo));
        $updatedata['post_nickname'] = html_escape(element(0, $att_demo));
        $updatedata['post_email'] = '';
        $updatedata['post_homepage'] = '';
        $updatedata['post_notice'] = 99;


        $post_id = $this->Post_model->insert($updatedata);
    }

    public function board_scheduler()
    {

        

        $this->load->model('Post_model');
        $this->load->model('Post_extra_vars_model');
        
        
        $where=array('brd_id' => 27,'pev_key' =>'upload_time','pev_value<' =>date('Y-m-d H:i'));

        $post_list = $this->Post_extra_vars_model->get('','',$where);

        
        foreach($post_list as $value){
            $extravars = $this->Post_extra_vars_model->get_all_meta(element('post_id', $value));            
            
            if(!empty(element('push_noti', $extravars)) && $this->cron_post_copy('move',element('post_id', $value))) {

                $post = $this->Post_model->get_one(element('post_id', $value));
                $board = $this->board->item_all(element('brd_id', $post));

                $url = 'http://vicjoa.bitcoissue.com/master/22_board/register_proc_curl.php';
                $data = array(
                    'title' => element('post_title',$post),
                    'contents' => element('sub_title', $extravars,''),
                    'noti_flag' => 'https://www.bitcoissue.com/post/'.element('post_id',$post),
                    'send_push' => '1'
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, sizeof($data));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($ch);
                curl_close($ch);

                $obj = json_decode($result);

                print_r($obj);
            }
        }
            
        
        
    }


    /**
     * 게시물 복사 밎 이동
     */
    public function cron_post_copy($type = 'move', $post_id)
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_helptool_post_copy';
        $this->load->event($eventname);

        if (empty($post_id)) {
                show_404();
        }

        $view = array();
        $view['view'] = array();

        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before'] = Events::trigger('before', $eventname);

        $this->load->model(array(
            'Blame_model', 'Board_model', 'Board_group_model',
            'Comment_model', 'Like_model', 'Post_extra_vars_model',
            'Post_file_model', 'Post_file_download_log_model', 'Post_history_model',
            'Post_link_model', 'Post_link_click_log_model', 'Post_meta_model',
            'Post_poll_model', 'Post_tag_model', 'Scrap_model'
        ));

        
        $post_id_list = $post_id;
        
        $view['view']['post_id_list'] = $post_id_list;

        $post = $this->Post_model->get_one($post_id);
        $board = $this->board->item_all(element('brd_id', $post));

        
        
        $typetext = ($type === 'copy') ? '복사' : '이동';

        

        /**
         * 유효성 검사를 하지 않는 경우, 또는 유효성 검사에 실패한 경우입니다.
         * 즉 글쓰기나 수정 페이지를 보고 있는 경우입니다
         */
        

            // 이벤트가 존재하면 실행합니다
            $view['view']['event']['formruntrue'] = Events::trigger('formruntrue', $eventname);

            $old_brd_id = element('brd_id', $board);

            $extravars = $this->Post_extra_vars_model->get_all_meta($post_id);
            if(element('upload_board',$extravars) === '뉴스정보' )
                $new_brd_id = 5;
            elseif(element('upload_board',$extravars) === '호재정보' ) 
                $new_brd_id = 4;
            elseif(element('upload_board',$extravars) === '코인지식' ) 
                $new_brd_id = 2;

            
            if ($post_id_list) {
                $arr = explode(',', $post_id_list);
                if ($arr) {
                    $arrsize = count($arr);
                    for ($k= $arrsize-1; $k>= 0; $k--) {
                        $post_id = element($k, $arr);
                        if (empty($post_id)) {
                            continue;
                        }

                        $post = $this->Post_model->get_one($post_id);
                        $board = $this->board->item_all(element('brd_id', $post));

                        
                        if ($type === 'move') {

                            // 이벤트가 존재하면 실행합니다
                            $view['view']['event']['move_before'] = Events::trigger('move_before', $eventname);

                            // post table update
                            $postupdate = array(
                                'brd_id' => $new_brd_id,
                                'post_datetime' => cdate('Y-m-d H:i:s'),
                            );

                            if ($this->cbconfig->item('use_copy_log')) {
                                $post_content = $post['post_content'];
                                $br = $post['post_html'] ? '<br /><br />' : "\n";
                                $post_content .= $br . '[이 게시물은 '
                                    . $this->member->item('mem_nickname') . ' 님에 의해 '
                                    . cdate('Y-m-d H:i:s') . ' '
                                    . element('brd_name', $board) . ' 에서 이동됨]';
                                $postupdate['post_content'] = $post_content;
                            }

                            $this->Post_model->update($post_id, $postupdate);


                            $dataupdate = array(
                                'brd_id' => $new_brd_id,

                            );
                            $where = array(
                                'target_id' => $post_id,
                                'target_type' => 1,
                            );
                            $this->Blame_model->update('', $dataupdate, $where);
                            $this->Like_model->update('', $dataupdate, $where);

                            $where = array(
                                'post_id' => $post_id,
                            );
                            $this->Comment_model->update('', $dataupdate, $where);
                            $this->Post_extra_vars_model->update('', $dataupdate, $where);
                            $this->Post_file_model->update('', $dataupdate, $where);
                            $this->Post_file_download_log_model->update('', $dataupdate, $where);
                            $this->Post_history_model->update('', $dataupdate, $where);
                            $this->Post_link_model->update('', $dataupdate, $where);
                            $this->Post_link_click_log_model->update('', $dataupdate, $where);
                            $this->Post_meta_model->update('', $dataupdate, $where);
                            $this->Post_poll_model->update('', $dataupdate, $where);
                            $this->Post_tag_model->update('', $dataupdate, $where);
                            $this->Scrap_model->update('', $dataupdate, $where);

                            // 이벤트가 존재하면 실행합니다
                            $view['view']['event']['move_after'] = Events::trigger('move_after', $eventname);

                        }
                    }
                }
            }

            // 이벤트가 존재하면 실행합니다
            $view['view']['event']['after'] = Events::trigger('after', $eventname);

            return true;
            
        
    }
}
