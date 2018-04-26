<?php 
$vic_name = array("bitcoin"=>"비트코인",
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
$vic_name = array("bitcoin"=>"비트코인",
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
$last = $this->uri->total_segments();
$last_segment = $this->uri->segment($last);

function won($k) {
       
       $len = strlen ($k);

       $len_ahr = ceil($len/4);

       $len_skanwj = $len%4;


       $a=0;
       $k2='';
       for ($i=1;$i<=$len_ahr;$i++) {
                            
              $sub = array("원", "만", "억","조");
                     
              $a=$a-4;

              if ($i < $len_ahr) {
                     if (substr($k, $a, 4) !="0000") {
                            $str=substr($k, $a, 4)+0;
                            $k2 = $str.$sub[$i-1].$k2;
                     }
              }else {
                     if ($len_skanwj==0) {
                            $len_skanwj=4;
                     }
                     $k2 = substr($k, $a,$len_skanwj).$sub[$i-1].$k2;
              }


       }

       $ch = strpos($k2,"원");

       if ($ch == 0) {
              $k2=$k2."원";
       }


       return $k2;
}


?>  


    <?php 

    foreach(element('coin_list',$view) as $key => $value){?>
        
        <div id="tab01_<?php echo $key ?>" style="display:none;">
        <table class='coin_cont'>
    <?php foreach($value as $key_ => $value_){ 
        
        // if($key_==="bitfinex") continue;
        ?>
        <tr>
            <td class='text-center'><a href="<?php echo element($key_,element('vic_url',$view)); ?>" target="_blank" style="color:blue;" title="<?php echo element($key_,element('vic_type',$view)); ?>"><?php echo element($key_,element('vic_type',$view)); ?></a></td>

            <td class='text-right' style="text-indent:30px;"><?php echo !empty(element('current_price_krw',$value_)) ? '₩ '.number_format(element('current_price_krw',$value_)) : '-'; ?></td>

            <td class='text-right'><?php echo !empty(element('current_price',$value_)) ? number_format(element('current_price',$value_)/element('current_price',element($key_,element('btc',element('coin_list',$view)))),5) : '-'; ?></td>
            <td class='text-right'><?php echo !empty(element('current_price_usd',$value_)) ? '$ '.number_format(element('current_price_usd',$value_),2) : '-'; ?></td>
            
           
            
            <?php 
            if(empty(element('kprime',$value_))){
                echo '<td class="text-right premium">';
            } else {
                if(element('kprime',$value_)>0)
                    echo '<td class="text-right premium" style="color:red;">▲ ';
                else 
                    echo '<td class="text-right premium" style="color:blue;">▼ ';

                echo number_format(abs(element('kprime',$value_))*100,2).' %' ;
            }
                
            ?> 
            </td>

             <?php 
            if(!empty(element('open_price',$value_))) {
                if((element('current_price',$value_) - element('open_price',$value_)) > 0){
                    echo "<td class='text-right rate' style='color:red;'>▲ ";
                    echo number_format(abs(element('current_price',$value_) - element('open_price',$value_))/element('open_price',$value_) *100,2).' % (▲ ₩ '.number_format(abs(element('current_price_krw',$value_) - element('open_price_krw',$value_))).')' ;
                } else {
                    echo "<td class='text-right rate minus' style='color:blue;'>▼ ";
                    echo number_format(abs(element('current_price',$value_) - element('open_price',$value_))/element('open_price',$value_) *100,2).' % (▼ ₩ '.number_format(abs(element('current_price_krw',$value_) - element('open_price_krw',$value_))).')' ;
                }
                
            }else {
                echo "<td>-";
            }
            ?>  
            </td>
            <td class='text-right'><?php echo !empty(element('market_cap_usd',element($key,element('market_cap_usd',$view)))) ? won((int)round(element('market_cap_usd',element($key,element('market_cap_usd',$view))),-10)) : '-'; ?></td>
            <td class='text-right'><?php echo !empty(element('volume_1day',$value_)) ? number_format(element('volume_1day',$value_)).' (BTC)' : '-'; ?></td>
        </tr>
    <?php } ?>
        </table>
        </div>

<?php } ?>

  
   


<!--  <section class="coin_mall">
        <table>
            <tr>
                <th>코인명</th>
                <th>가격(원)</th>
                <th>비트코인</th>
                <th>달러</th>
                <th>달러(원)</th>
                <th>프리미엄</th>
                <th>번동률(24시)</th>
                <th>시가총액</th>
                <th>거래량(24시)</th>
            </tr>
            <?php 
            foreach(element('coin_list',$view) as $key => $value){ ?>

                <div id="tab01_<?php echo $key ?>" class="tab01_cont cont" style="display:none">
                    <table>
                <?php foreach($value as $key_ => $value_){ 
                    // if($key_==="bitfinex") continue;
                    ?>
                    <tr>
                        <td><?php echo element($key_,element('vic_type',$view)); ?></td>

                        <td class='text-right'><?php echo !empty(element('current_price',$value_)) ? $unit.number_format(element('current_price',$value_)) : '-'; ?></td>


                        <?php 
                        if(!empty(element('open_price',$value_))) {
                            if((element('current_price',$value_) - element('open_price',$value_)) > 0)
                                echo "<td class='text-right' style='color:red;'>▲ ";
                            else echo "<td class='text-right' style='color:blue;'>▼ ";
                            echo number_format((element('current_price',$value_) - element('open_price',$value_))/element('open_price',$value_) *100,2).' %' ;
                        }else {
                            echo "<td>-";
                        }
                        ?>  
                        </td>
                        
                        <?php 
                        if(empty(element('kprime',$value_))){
                            echo '<td class="text-right">-';
                        } else {
                            if(element('kprime',$value_)>0)
                                echo '<td class="text-right" style="color:blue;">';
                            else 
                                echo '<td class="text-right" style="color:green;">';

                            echo number_format(element('kprime',$value_)*100,2).' %' ;
                        }
                            
                        ?> 
                        </td>
                    </tr>
                <?php } ?>
                    </table>
                </div>
            <?php } ?>

            <tr>
                <td>
                    <figure>
                        <img src="<?php echo site_url('/views/_layout/basic/images/store_logo/bitcoin.png');?>" alt="bitcoin_logo_img">
                        <figcaption>비트코인</figcaption>
                    </figure>
                </td>
                <td>12,850,000</td>
                <td>1.0000000</td>  
                <td>10,800</td> 
                <td>11,707,256</td>
                <td>1,142,743(9.76%)</td>   
                <td>-0.66%</td>
                <td>198조585억</td>
                <td>9조1,422억</td>   
            </tr>
        </table>
    </section> -->
