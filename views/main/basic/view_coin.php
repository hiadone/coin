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

$last = $this->uri->total_segments();
$last_segment = $this->uri->segment($last);

?>  
<section id='coin_mall'>
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

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/bitcoin.png" alt="bitcoin_logo_img">
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

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/ethereum.png" alt="ethereum_logo_img">
                            <figcaption>이더리움</figcaption>
                        </figure>
                    </td>
                    <td>1,026,000</td>
                    <td>0.08043570</td> 
                    <td>859</td>    
                    <td>931,535</td>
                    <td>94,464(10.14%)</td> 
                    <td>-1.72%</td>
                    <td>90조8720억</td>
                    <td>2조4992억</td>    
                </tr>

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/ripple.png" alt="ripple_logo_img">
                            <figcaption>리 플</figcaption>
                        </figure>
                    </td>
                    <td>1,026,000</td>
                    <td>0.08043570</td> 
                    <td>859</td>    
                    <td>931,535</td>
                    <td>94,464(10.14%)</td> 
                    <td>-1.72%</td>
                    <td>90조8720억</td>
                    <td>2조4992억</td>    
                </tr>

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/bitcoin.png" alt="bitcoin_logo_img">
                            <figcaption>비트코인 캐쉬</figcaption>
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

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/litecoin.png" alt="litecoin_logo_img">
                            <figcaption>라이트코인</figcaption>
                        </figure>
                    </td>
                    <td>1,026,000</td>
                    <td>0.08043570</td> 
                    <td>859</td>    
                    <td>931,535</td>
                    <td>94,464(10.14%)</td> 
                    <td>-1.72%</td>
                    <td>90조8720억</td>
                    <td>2조4992억</td>    
                </tr>

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/dash.png" alt="dash_logo_img">
                            <figcaption>대 시</figcaption>
                        </figure>
                    </td>
                    <td>1,026,000</td>
                    <td>0.08043570</td> 
                    <td>859</td>    
                    <td>931,535</td>
                    <td>94,464(10.14%)</td> 
                    <td>-1.72%</td>
                    <td>90조8720억</td>
                    <td>2조4992억</td>    
                </tr>

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/monero.png" alt="monero_logo_img">
                            <figcaption>모네로</figcaption>
                        </figure>
                    </td>
                    <td>1,026,000</td>
                    <td>0.08043570</td> 
                    <td>859</td>    
                    <td>931,535</td>
                    <td>94,464(10.14%)</td> 
                    <td>-1.72%</td>
                    <td>90조8720억</td>
                    <td>2조4992억</td>    
                </tr>

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/ethereum_classic.png" alt="ethereum_classic_logo_img">
                            <figcaption>이더리움 클래식</figcaption>
                        </figure>
                    </td>
                    <td>1,026,000</td>
                    <td>0.08043570</td> 
                    <td>859</td>    
                    <td>931,535</td>
                    <td>94,464(10.14%)</td> 
                    <td>-1.72%</td>
                    <td>90조8720억</td>
                    <td>2조4992억</td>    
                </tr>

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/zcash.png" alt="zcash_logo_img">
                            <figcaption>제트캐시</figcaption>
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

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/qtum.png" alt="qtum_logo_img">
                            <figcaption>큐 텀</figcaption>
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

                <tr>
                    <td>
                        <figure>
                            <img src="images/store_logo/eos.png" alt="eos_logo_img">
                            <figcaption>EOS</figcaption>
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
        </section>
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