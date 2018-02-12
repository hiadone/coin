<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/jquery.bxslider.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/plugins/jquery.easing.1.3.js'); ?>"></script>

<?php 
$last = $this->uri->total_segments();
$record_num = $this->uri->segment($last);

?>
<script>

    var postact_flag=false;
    var global_cur_unit='krw';
    var coinActiveTab='tab01_btc';
    setInterval('view_coin(global_cur_unit)',5000);


$(document).ready(function(){
// tab01 영역 스크립트
    view_board('view_board','<?php echo $record_num ?>');
    $(".tab01_cont").hide();
    $(".tab01_cont:first").show();

    $("ul.tab01_tabs li").click(function () {
        $("ul.tab01_tabs li").removeClass("active").css("color" , "#333");
        $(this).addClass("active").css({"color": "#1c446d"});
        $(this).addClass("active").css("color", "#1c446d");
        $(".tab01_cont").hide()
        coinActiveTab = $(this).attr("rel");
        $("#" + coinActiveTab).fadeIn()
    });

// tab06 영역 스크립트
   $("ul.tab06_tabs li").click(function () {
        
        view_board('view_board',$(this).attr('id'));
    });

// 접기버튼 클릭시 conin_info 슬라이드 업 스크립트
    $('.btn_up').click(function(){
        $('.tab01').slideToggle();
        if($(this).html()=='▼ 펼 치 기'){
            $(this).html('▲ 접 기');
        }else{
            $(this).html('▼ 펼 치 기');
        }
    });


    var slider = $('.rolling_news ul').bxSlider({
        mode: 'vertical',
        speed: 300, // m/s ex > 1000 = 1s
        easing: 'ease-in-out', // 동작 가속도 css와 동일
        sliderMargin: 10, // img 와 img 사이 간격
        startSlide: 0, // 시작시 로드될 이미지 (0부터 시작)
        preloadImages: 'visible', // 'visible'은 보여질때 이미지를 로드,'all'로 설정 하게 되면 모든 이미지가 로드되어야만 slide가 작동
        sliderMargin: 10, // img 와 img 사이 간격
        startSlide: 0, // 시작시 로드될 이미지 (0부터 시작)
        preloadImages: 'visible', // 'visible'은 보여질때 이미지를 로드,'all'로 설정 하게 되면 모든 이미지가 로드되어야만 slide가 작동
        randomStart: false, // 시작시 랜덤으로 이미지 로드 여부 (boolean)
        adaptiveHeight: false, //각 이미지의 높이에 따라 슬라이더 높이의 유동적 조절 여부
        adaptiveHeightSpeed: 300, //adaptiveHeight 동작속도,
        video: false,// slider에 video 사용여부, 사용할 시에 plugins/jquery.fitvids.js 파일 include 필요
        captions: false, // img 태그에 title속성값을 출력여부, 단 css .bx-wrapper .bx-caption 수정필요

        //responsive method
                    responsive: true, // 반응형 지원 여부
                    touchEnabled: true,// 터치스와이프 기능 사용여부
                    swipeThreshold: 50, // 터치하여 스와이프 할때 변환 효과에 소모되는 시간 설정
                    onoToOneTouch: true, // fade효과가 아닌 슬라이드는 손가락의 접지상태에 따라 슬라이드를 움직일수있다.
                    preventDefaultSwipeX: false, //onoToOneTouch 에서 true일 경우, 손가락을따라 x축으로 움직일지에 대한 여부
                    preventDefaultSwipeY: false, //onoToOneTouch 에서 true일 경우, 손가락을따라 y축으로 움직일지에 대한 여부

        //control method
            controls: false, //좌, 우 컨트롤 버튼 출력  여부
            auto: true, // 자동 재생 활성화.
            autoControls: false, //자동재생 제어버튼 활성화 단, auto모드 활성화필요
            autoControlsCombine: false, // 재생시 중지버튼 활성화(toggle)
            pause: 3000, // 자동 재생 시 각 슬라이드 별 노출 시간
            autoStart: true, // 페이지 로드가 되면, 슬라이드의 자동시작 여부
            autoDirection: 'next', // 자동 재생시에 정순, 역순(prev) 방식 설정
            autoHover: true, // 슬라이드 오버시 재생 중단 여부 (false : 오버무시)
            autoDelay: 0, // 자동 재생 전 대기 시간 설정.
            infiniteLoop: true, //마지막에 도달 했을시, 첫페이지로 갈 것인가 멈출것인가
            //pagerCustom: '#bx-pager' // pager
        });

        // 클릭시 멈춤 현상 해결 //
        $(document).bind('touchend' , function(){
            slider.stopAuto();
            slider.startAuto();
        });   
});

</script>



<article class="wrap01">
    <section class="loing_join">
        <ul class="small_font">
            <?php
            if($this->member->is_member()){
                echo '<li style="text-align:right" onClick=\'location.href="'.site_url('mypage').'";\'  title="마이페이지">
                <figure><img style="height:14px;" src="'.base_url('assets/images/gold_spoon.png').'" alt="spoon"><figcaption>'.$this->member->item('mem_nickname').
                '</figcaption></figure></li>';
                echo '<li>|</li>';
                 echo '<li style="text-align:left" onClick=\'location.href="'.site_url('login/logout?url=' . urlencode(current_full_url())).'";\'  title="로그아웃">로 그 아 웃</li>';
            } else {


                echo '<li onClick=\'location.href="'.site_url('login?url=' . urlencode(current_full_url())).'";\'  title="로그인" style="text-align:right;">로 그 인</li>';
                echo '<li>|</li>';
                echo '<li onClick=\'location.href="'.site_url('login?url=' . urlencode(current_full_url())).'";\'  title="회원가입" style="text-align:left;"">회 원 가 입</li>';
            }
            ?>
            
            
        </ul>
    </section>
<!-- rolling_news 영역-->
    <section class="rolling_news">
        <ul class="big_font">

        <?php

        $board='';
        $config = array(
            'brd_key' => 'live_news',
            'limit' => 5,
            'length' => 40,
            'headline' => 1,
        );
        $board=$this->board->data($config);

        if (element('latest', element('view', $board))) {
            foreach (element('latest', element('view', $board)) as $key => $value) {?>
                
                    <li><a style="display:inline-block;" href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>" class="middle_font"><?php echo sprintf("%02d",($key+1)) ?>. <?php echo html_escape(element('title', $value)); ?></a></li> 
                
        <?php 
            }
        }
        ?>
        </ul> 
    
</section>

<!-- tab01 영역 -->
<section class="tab01 middle_font">
    <ul class="tab01_tabs tabs ">
        <li class="active" rel="tab01_btc">BTC</li>
        <li rel="tab01_eth">ETH</li>
        <li rel="tab01_dash">DASH</li>
        <li rel="tab01_xrp">XRP</li>
        <li rel="tab01_ltc">LTC</li>
        <li rel="tab01_etc">ETC</li>
        <li rel="tab01_bch">BCH</li>
        <li rel="tab01_xmr">XMR</li>
        <li rel="tab01_zec">ZEC</li>
        <li rel="tab01_qtum">QTUM</li>
        <li rel="tab01_btg">BTG</li>
    </ul>
    <table>
        
        <tr>
            <th>거래소별</th>
            <th>
                <select name="cur_unit" id="cur_unit" onchange="view_coin(this.value);">
                    <option value="krw">원화 (KRW)</option>
                    <option value ="usd">달러 (USD)</option>
                </select>
            </th>
            <th>변동률</th>
            <th>프리미엄</th>
        </tr>

    </table>

    <div class="tab01_wrap cont_wrap" id="coin_data">
    <?php 
    if (element('view_coin', $view)) { 
        echo element('view_coin', $view);
    }
    ?>
        



        
    </div>
</section>

    <button class="btn_up">
        ▲ 접 기
    </button>

<!-- tab06 영역 -->
    <section class="tab06 wrap middle_font" style="border-bottom:0;">
        <ul class="tab06_tabs tabs">
            <?php 
            if (element('board_list', $view)) {
                $bcount=count(element('board_list', $view));
                $tab06=array();

                foreach (element('board_list', $view) as $key => $board) {
                    
                    array_push($tab06,element('brd_key',$board));
                    echo '<li id="'.element('brd_key',$board).'" style="width: '.(100/$bcount).'%;">'.element('board_name',$board).'</li>';
                }
            }
             ?>
        </ul>

        <div class="tab06_wrap cont_wrap" id="view_board">

        </div>
    </section>

</article>
<script type="text/javascript">
    //<![CDATA[
    function view_board(id,brd_key) {
        var list_url = cb_url + '/group/view_board/' + brd_key;
        $('#' + id).load(list_url,'',function(){
            $("ul.tab06_tabs li").removeClass("active").css("color" , "#333");
            $('#'+brd_key).addClass("active").css({"color": "#1c446d"});
            $('#'+brd_key).addClass("active").css("color", "#1c446d");

        });
    }

    function view_coin(cur_unit) {
        global_cur_unit = cur_unit;
        var list_url = cb_url + '/main/show_coin_data/' + global_cur_unit;
        $('#coin_data').load(list_url,function(){
            $("#" + coinActiveTab).hide();
            $("#" + coinActiveTab).fadeIn();
        });   
    }
    //]]>
</script>

