<?php 

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

            <td class='text-right'><?php echo !empty(element('current_price',$value_)) ? number_format(element('current_price',$value_)/element('current_price',element($key_,element('BTC',element('coin_list',$view)))),5) : '-'; ?></td>
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
