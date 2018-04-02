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
echo element('deal_bas_r',element('deal_bas_r',$view));
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
                
                <?php 
                foreach(element('coin_list',$view) as $key => $value){
                    if(array_key_exists($key,$vic_name)){
                ?>
                    <tr>
                        <td>
                            <figure>
                                <img src="<?php echo base_url('views/_layout/basic/images/store_logo/'.$key.'.png') ?>" alt="<?php echo $key ?>_logo_img">
                                <figcaption><?php echo $vic_name[$key]?></figcaption>
                            </figure>
                        </td>
                        <td ><?php echo number_format(element('price_usd',$value),2); ?></td>
                        <td><?php echo number_format(element('price_btc',$value),5); ?></td>
                        <td><?php echo number_format(element('price_usd',$value),2); ?></td>
                        <td><?php echo number_format(element('price_usd',$value)); ?></td>
                        <td><?php echo number_format(element('price_usd',$value)); ?></td>
                        <td><?php echo number_format(element('percent_change_24h',$value),2); ?>%</td>
                        <td><?php echo number_format(element('market_cap_usd',$value)); ?></td>
                        <td><?php echo number_format(element('24h_volume_usd',$value)); ?></td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </section>
   