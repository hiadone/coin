<?php 
$vic_title = array("bithumb"=>"빗 썸",
                    "coinone"=>"코 인 원",
                    "korbit"=>"코 빗",
                    "upbit"=>"업 비 트",
                    "coinnest"=>"코인네스트",
                    "bittrex"=>"비트렉스",
                    "poloniex"=>"플로닉스",
                    "bitfinex"=>"비트파이넥스"
                    );

$last = $this->uri->total_segments();
$last_segment = $this->uri->segment($last);

$unit='₩ ';
if($last_segment === 'usd') $unit='$ ';

foreach(element('coin_list',$view) as $key => $value){ ?>

    <div id="tab01_<?php echo $key ?>" class="tab01_cont cont" style="display:none">
        <table>
    <?php foreach($value as $key_ => $value_){ 
        if($key_==="bitfinex") continue;
        ?>
        <tr>
            <td><?php echo element($key_,element('vic_type',$view)); ?></td>
            <td class='text-right' style='padding-right: 5%;'><?php echo !empty(element('current_price',$value_)) ? $unit.number_format(element('current_price',$value_)) : '-'; ?></td>
            <?php 
            if(!empty(element('open_price',$value_))) {
                if((element('current_price',$value_) - element('open_price',$value_)) > 0)
                    echo "<td class='text-right' style='padding-right: 5%;color:red;'>▲ ";
                else echo "<td class='text-right' style='padding-right: 5%;color:blue;'>▼ ";
                echo number_format(abs(element('current_price',$value_) - element('open_price',$value_)));
            }else {
                echo "<td>-";
            }
            ?>  
            </td>
            <td class='text-right' style='padding-right: 5%;'><?php echo !empty(element('kprime',$value_)) ? (number_format(element('kprime',$value_)*100,2)).' %' : '-';?> </td>
        </tr>
    <?php } ?>
        </table>
    </div>
<?php } ?>
        
