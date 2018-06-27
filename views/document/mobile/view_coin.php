<?php //$this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php $this->managelayout->add_css('/assets/css/swiper.min.css '); ?>
<?php $this->managelayout->add_js('/assets/js/swiper.min.js'); ?>




<script>
    
    // rolling_news 영역 스크립트
        var postact_flag=false;
        var global_cur_unit='krw';
        var coinActiveTab='tab01_BTC';
        setInterval('view_coin(global_cur_unit)',10000);

    // 전체 스크립트 
    $(document).ready(function(){
         

        // tab01 영역 스크립트
            $(".tab01_cont").hide();
            $(".tab01_cont:first").show();

            $("ul.tab01_tabs li").not('.noevent').click(function (){

                $("ul.tab01_tabs li").removeClass("active").css("color" , "#333");
                $(this).addClass("active").css("color", "#1c446d");
                $(".tab01_cont").hide();
                coinActiveTab = $(this).attr("rel");
                $("#" + coinActiveTab).fadeIn();
            });

        //tab02 영역 스크립트
            $(".tab02_cont").hide();
            $(".tab02_cont:first").show();

           
var swiper = new Swiper('.swiper-container', {
      slidesPerView: 6.5,
      spaceBetween: 3,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
      
    });

function view_coin(cur_unit) {
    global_cur_unit = cur_unit;
    var list_url = cb_url + '/main/show_coin_data/' + global_cur_unit;
    $('#coin_data').load(list_url,function(){
        $("#" + coinActiveTab).hide();
        $("#" + coinActiveTab).fadeIn();
    }); 
}
</script> 
 
<div class="foot_padding">
<!-- tab01(거래소별 시세) 영역 -->
    <section class="wrap_con">
        <h3 class="hidden"><?php echo html_escape(element('board_name', element('board', element('list', $view))));?></h3>
        
        <?php 
        if (element('menu', $layout)) {
            $menu = element('menu', $layout);
            echo '<ul class="nav nav-sub nav-pills nav-justified ">';
            if (element(element(0,element('active',$menu)), $menu)) {
                
                foreach (element(element(0,element('active',$menu)),$menu) as $mkey => $mval) {

                    $active='';
                
                    if(element(1,element('active',$menu)) === element('men_id',$mval)) {
                        
                        $active='active';
                    }

                
                    echo '<li class="'.$active.'" ><a href="'.base_url(element('men_link',$mval)).'">'.element('men_name',$mval).'</a></li>';
                    echo "\n";
                }
                
            }
            echo '</ul>';
        }
        ?>
 
        <section class="tab01 middle_font">
            <div class="swiper-container">
                <ul class="tab01_tabs tabs swiper-wrapper" >

                    <?php
                        $i=0;
                        if (element('select_coin_list', $view)) {
                            foreach (element('select_coin_list', $view) as $result) {
                                if(empty($i)) $active="active";
                                else $active='';

                     ?>
                            <li class="swiper-slide <?php echo $active ?>" rel="tab01_<?php echo $result?>">
                                <?php echo $result?>
                            </li>

                    <?php
                        $i++;
                        }
                    }
                    ?>
                    <li class='swiper-slide noevent pull-right mr10'>
                    <a href="<?php echo base_url('mypage/user_coin_set') ?>" ><i class="fa fa-cog big-fa" style="font-size:1.3em;"></i></a>
                    </li>
                </ul>
            </div>
            <table>

                <tr>
                    <th>거래소별</th>
                    <th>
                        <select name="cur_unit" id="cur_unit" onchange="view_coin(this.value);">
                            <option value="krw">원화 (KRW)</option>
                            <option value ="usd">달러 (USD)</option>
                        </select>
                    </th>
                    <th>전일대비</th>
                    <th>프리미엄</th>
                </tr>

            </table>

            <div class="tab01_wrap cont_wrap" id="coin_data" >
                <?php 
                if (element('view_coin', $view)) { 
                    echo element('view_coin', $view);
                }
                ?>
                


                
            </div>
        </section>
    </section>
    <!-- 접기 버튼 -->
</div>

