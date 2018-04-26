<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/jquery.bxslider.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/plugins/jquery.easing.1.3.js'); ?>"></script>
<script>
    // rolling_news 영역 스크립트
        var postact_flag=false;
        var global_cur_unit='krw';
        var coinActiveTab='tab01_btc';
        // setInterval('view_coin(global_cur_unit)',10000);

    // 전체 스크립트 
    $(document).ready(function(){
         $("html,body").animate({scrollTop:0});

        // tab01 영역 스크립트
            $(".tab01_cont").hide();
            $(".tab01_cont:first").show();

            $("ul.tab01_tabs li").click(function (){

                $("ul.tab01_tabs li").removeClass("active").css("color" , "#333");
                $(this).addClass("active").css("color", "#1c446d");
                $(".tab01_cont").hide();
                coinActiveTab = $(this).attr("rel");
                $("#" + coinActiveTab).fadeIn();
            });

        //tab02 영역 스크립트
            $(".tab02_cont").hide();
            $(".tab02_cont:first").show();

            $("ul.tab02_tabs li").click(function () {
                $("ul.tab02_tabs li").removeClass("active").css("color" , "#333");
                $(this).addClass("active").css({"color": "#1c446d"});
                $(this).addClass("active").css("color", "#1c446d");
                $(".tab02_cont").hide()
                var activeTab = $(this).attr("rel");
                var boardUrl = $(this).data("board_url");
                $(this).parent().parent().find('h3 a.board_url').attr('href',boardUrl);
                
                $("#" + activeTab).fadeIn()
            });

        //tab03 영역 스크립트
            $(".tab03_cont").hide();
            $(".tab03_cont:first").show();

            $("ul.tab03_tabs li").click(function () {
                $("ul.tab03_tabs li").removeClass("active").css("color" , "#333");
                $(this).addClass("active").css({"color": "#1c446d"});
                $(this).addClass("active").css("color", "#1c446d");
                $(".tab03_cont").hide()
                var activeTab = $(this).attr("rel");
                var boardUrl = $(this).data("board_url");
                $(this).parent().parent().find('h3 a.board_url').attr('href',boardUrl);
                $("#" + activeTab).fadeIn()
            });

        //tab04 영역 스크립트
            $(".tab04_cont").hide();
            $(".tab04_cont:first").show();

            $("ul.tab04_tabs li").click(function () {
                $("ul.tab04_tabs li").removeClass("active").css("color" , "#333");
                $(this).addClass("active").css({"color": "#1c446d"});
                $(this).addClass("active").css("color", "#1c446d");
                $(".tab04_cont").hide()
                var activeTab = $(this).attr("rel");
                var boardUrl = $(this).data("board_url");
                $(this).parent().parent().find('h3 a.board_url').attr('href',boardUrl);
                $("#" + activeTab).fadeIn()
            });

        //tab05 영역 스크립트
            $(".tab05_cont").hide();
            $(".tab05_cont:first").show();

            $("ul.tab05_tabs li").click(function () {
                $("ul.tab05_tabs li").removeClass("active").css("color" , "#333");
                $(this).addClass("active").css({"color": "#1c446d"});
                $(this).addClass("active").css("color", "#1c446d");
                $(".tab05_cont").hide()
                var activeTab = $(this).attr("rel");
                var boardUrl = $(this).data("board_url");
                $(this).parent().parent().find('h3 a.board_url').attr('href',boardUrl);
                $("#" + activeTab).fadeIn()
            });

        //tab07 영역 스크립트
            $(".tab07_cont").hide();
            $(".tab07_cont:first").show();

            $("ul.tab07_tabs li").click(function () {
                $("ul.tab07_tabs li").removeClass("active").css("color" , "#333");
                $(this).addClass("active").css({"color": "#1c446d"});
                $(this).addClass("active").css("color", "#1c446d");
                $(".tab07_cont").hide()
                var activeTab = $(this).attr("rel");
                var boardUrl = $(this).data("board_url");
                $(this).parent().parent().find('h3 a.board_url').attr('href',boardUrl);
                $("#" + activeTab).fadeIn()
            });

        // tab09 영역 스크립트
            $(".tab09_cont").hide();
            $(".tab09_cont:first").show();

            $("ul.tab09_tabs li").click(function () {
                $("ul.tab09_tabs li").removeClass("active").css("color" , "#333");
                $(this).addClass("active").css({"color": "#1c446d"});
                $(".tab09_cont").hide()
                activeTab = $(this).attr("rel");
                var boardUrl = $(this).data("board_url");
                $(this).parent().parent().find('h3 a.board_url').attr('href',boardUrl);
                $("#" + activeTab).fadeIn();
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

        // 인물트위터 , 코인공식트위터 , 거래소 더보기 영역 스크립트
            // 인물트위터 , 코인공식트위터 , 거래소 더보기 버튼 클릭시 cover
                $('.table_li tr:last-child td:last-child').click(function(){
                    $('.cover_menu_sub').css({'z-index':'200'});
                    $('.cover_menu_sub .cover_sub').animate({'opacity' : '0.5'} , 500);
                        // $('html, body').css({'overflow': 'hidden', 'height': '100%'}); // 모달팝업 중 html,body의 scroll을 hidden시킴
                        // $("html, body").bind('scroll  mousewheel', function(e){e.preventDefault();e.stopPropagation();return false;});
                    });

            // 인물트위터 , 코인공식트위터 , 거래소 더보기의 X 버튼 클릭시 (모든 popup메뉴 닫기)
                $('span.clear').click(function(){
                    $('.cover_menu_sub .cover_sub').animate({'opacity' : '0'} , 500);
                    $('.pop').animate({'opacity' : '0'} , 700);
                    $('.pop').css('display' , 'none');
                            // $('html, body').css({'overflow': 'auto', 'height': '100%'}); //scroll hidden 해제
                            $("html, body").unbind('scroll  mousewheel');
                            setTimeout(function(){
                                $('.cover_menu_sub').css({'z-index':'-100'});if(postact_flag)location.reload();
                            },700); 
                        });

            // 인물트위터 더보기 클릭시 해당 팝업 보여주기
                $('.person_twitter tr:last-child td:last-child').click(function(){
                    $('.person_twitter_more').css('display' , 'block');
                    $('.person_twitter_more').animate({'opacity' : '1'} , 700);
                    view_twitter('person_twitter', 'person_twitter');
                });

            // 코인공식 트위터 더보기 클릭시 해당 팝업 보여주기
                $('.coin_twitter tr:last-child td:last-child').click(function(){
                    $('.coin_twitter_more').css('display' , 'block');
                    $('.coin_twitter_more').animate({'opacity' : '1'} , 700);
                    view_twitter('coin_twitter', 'coin_twitter');
                });

            // 거래소 더보기 클릭시 해당 팝업 보여주기
                $('.coin_trade tr:last-child td:last-child').click(function(){
                    $('.coin_trade_more').css('display' , 'block');
                    $('.coin_trade_more').animate({'opacity' : '1'} , 700);
                    view_twitter('coin_trade', 'coin_trade');
                });

            // +버튼(추가) 클릭시 체크버튼,입력란 보여주기
                $('.pop div span.plus').click(function(){
                    $(this).css('display' , 'none');                                        // +버튼 숨기기
                    $('.pop table td span').css('display' , 'none');                        
                    $('.pop div span.plus').hide();
                    $('.pop div span.minus').hide();
                    $('.pop div span.minus_check').hide();
                    $('.pop div span.plus_check').show();
                    
                    
                    $(this).parents('div').siblings('ul').slideDown();
                });

            // -버튼 or 체크버튼(추가) 클릭시
                $('.pop div span.plus_check').click(function(){
                    
                    if(twitter_action('twitter_update',$(this).data('bng_name'))){
                        
                        // $(this).siblings('span:nth-child(3)').css('display' , 'block');             
                        
                        $('.pop div span.plus').show();
                        $('.pop div span.minus').show();
                        $('.pop div span.minus_check').hide();
                        $('.pop div span.plus_check').hide();

                        $('.pop table td span').css('display' , 'none');
                        $('.pop ul').slideUp();
                        view_twitter($(this).data('bng_name'),$(this).data('bng_name'));
                        postact_flag=true;
                    }
                   
                });


                        


                $('.pop div span.minus').click(function(){
                    $('.pop table td span').css('display' , 'block');
                    // $(this).siblings('span:nth-child(3)').css('display' , 'none');
                    $('.pop div span.plus').hide();
                    $('.pop div span.minus').hide();
                    $('.pop div span.plus_check').hide();
                    $('.pop div span.minus_check').show();
                    
                    
                });

                $('.pop div span.minus_check').click(function(){
                    
                    $('.pop div span.plus_check').hide();
                    $('.pop div span.minus_check').hide();
                    $('.pop div span.plus').show();
                    $('.pop div span.minus').show();
                    $('.pop table td span').css('display' , 'none');
                   
                });

            // 삭제버튼 클릭시
                // $('.pop table td span').click(function(){
                //     $(this).parents('td').parents('tr').remove();
                // });

        // 롤링텍스트
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
                        controls: true, //좌, 우 컨트롤 버튼 출력  여부
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
                        prevText: '▲',

                        onSliderLoad: function(){
                        $('.rolling_news ul').css('visibility','visible');
                        }   
                    });

                    // 클릭시 멈춤 현상 해결 //
                    $(document).bind('click','a.bx-prev' , function(){   
                        slider.stopAuto();
                        slider.startAuto();
                    });     
    });
</script> 


<article class="cover_menu_sub">
    <section class="cover_sub">
    </section>

    <!-- 인물트위터 더보기 클릭시 팝업 내용-->
        <section class="person_twitter_more pop">
            <?php
            $attributes = array('name' => 'ftwitterlist', 'id' => 'ftwitterlist');
            echo form_open('', $attributes);
            ?>
            <!-- 타이틀 영역 -->
            <div class="header">
                <span class="clear">
                    <img src="<?php echo base_url('/assets/images/clear02.png') ?>" alr="clear">
                </span>

                <h2>인 물 트 위 터</h2>

                <span data-bng_name="person_twitter"  class="plus" style="margin-right:2%">
                    <img src="<?php echo base_url('/assets/images/plus.png') ?>" alr="plus">
                </span>
                <span data-bng_name="person_twitter"  class="minus">
                    <img src="<?php echo base_url('/assets/images/minus.png') ?>" alr="minus">
                </span>
                <span data-bng_name="person_twitter"  style="display:none;float: right;" class="plus_check">
                    <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
                </span>
                <span data-bng_name="person_twitter"  style="display:none;float: right;" class="minus_check">
                    <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
                </span>
            </div>
            <!-- +버튼 클릭시 , 추가 입력란 영역--> 
            <ul>
                <li><input type="text" name="ban_title_person_twitter" placeholder="인물 트위터 명을 입력해주세요." onfocus="this.placeholder=''" onblur="this.placeholder='인물 트위터 명을 입력해주세요.'">
                </li>
                <li><input type="text" name="ban_url_person_twitter" placeholder="클릭 시 이동할 주소를 적어 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='클릭 시 이동할 주소를 적어 주세요.'">
                </li>
            </ul>
            <!-- 리스트 영역-->
            <div id="person_twitter">
            </div>
        </section>

    <!-- 코인 공식트위터 더보기 클릭시 팝업 내용-->
        <section class="coin_twitter_more pop">
            <!-- 타이틀 영역 -->
            <div class="header">
                <span class="clear">
                    <img src="<?php echo base_url('/assets/images/clear02.png') ?>" alr="clear">
                </span>

                <h2>코인 공식 트위터</h2>
                <span data-bng_name="coin_twitter"  class="plus" style="margin-right:2%">
                    <img src="<?php echo base_url('/assets/images/plus.png') ?>" alr="plus">
                </span>
                <span data-bng_name="coin_twitter"  class="minus">
                    <img src="<?php echo base_url('/assets/images/minus.png') ?>" alr="minus">
                </span>
                <span data-bng_name="coin_twitter"  style="display:none;float: right;" class="plus_check">
                    <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
                </span>
                <span data-bng_name="coin_twitter"  style="display:none;float: right;" class="minus_check">
                    <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
                </span>

                

                
            </div>
            <!-- +버튼 클릭시 , 추가 입력란 영역--> 
            <ul>
                <li><input type="text" name="ban_title_coin_twitter" placeholder="코인 공식 트위터 명을 입력해주세요." onfocus="this.placeholder=''" onblur="this.placeholder='코인 공식 트위터 명을 입력해주세요.'">
                </li>
                <li><input type="text" name="ban_url_coin_twitter" placeholder="클릭 시 이동할 주소를 적어 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='클릭 시 이동할 주소를 적어 주세요.'">
                </li>
            </ul>
            <!-- 리스트 영역-->
            <div id="coin_twitter">
            </div>
        </section>

    <!-- 거래소 바로가기 더보기 클릭시 팝업 내용-->
        <section class="coin_trade_more pop">
            <!-- 타이틀 영역 -->
            <div class="header">
                <span class="clear">
                    <img src="<?php echo base_url('/assets/images/clear02.png') ?>" alr="clear">
                </span>

                <h2>거래소 바로가기</h2>

                <span data-bng_name="coin_trade"  class="plus" style="margin-right:2%">
                    <img src="<?php echo base_url('/assets/images/plus.png') ?>" alr="plus">
                </span>
                <span data-bng_name="coin_trade"  class="minus">
                    <img src="<?php echo base_url('/assets/images/minus.png') ?>" alr="minus">
                </span>
                <span data-bng_name="coin_trade"  style="display:none;float: right;" class="plus_check">
                    <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
                </span>
                <span data-bng_name="coin_trade"  style="display:none;float: right;" class="minus_check">
                    <img src="<?php echo base_url('/assets/images/check.png') ?>" alr="check">
                </span>

                
                
            </div>
            <!-- +버튼 클릭시 , 추가 입력란 영역--> 
            <ul>
                <li><input type="text" name="ban_title_coin_trade" placeholder="거래소 명을 입력해주세요." onfocus="this.placeholder=''" onblur="this.placeholder='거래소 명을 입력해주세요.'">
                </li>
                <li><input type="text" name="ban_url_coin_trade" placeholder="클릭 시 이동할 주소를 적어 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='클릭 시 이동할 주소를 적어 주세요.'">
                </li>
            </ul>
            <div id="coin_trade">
            </div>
            <!-- 리스트 영역-->
            <?php echo form_close(); ?>        
        </section>
</article>

<article class="wrap01">
    <section class="loing_join">
        <ul class="small_font">
            <?php
            if($this->member->is_member()){
                echo '<li onClick=\'location.href="'.site_url('mypage').'";\'  title="마이페이지">
                <figure><img src="'.base_url('assets/images/mo_head_spoon/spoon_'.$this->member->item('mem_level').'.png').'" alt="spoon"><figcaption>'.$this->member->item('mem_nickname').
                '</figcaption></figure></li>';
                echo '<li>|</li>';
                echo '<li onClick=\'location.href="'.site_url('/board/event').'";\'  title="스토어">스토어</li>';
                echo '<li>|</li>';
                 echo '<li onClick=\'location.href="'.site_url('mypage').'";\'>회원정보</li>';
                 echo '<li>|</li>';
                 echo '<li onClick=\'location.href="'.site_url('login/logout?url=' . urlencode(current_full_url())).'";\'  title="로그아웃">로그아웃</li>';
            } else {


                echo '<li onClick=\'location.href="'.site_url('login?url=' . urlencode(current_full_url())).'";\'  title="로그인" style="width:32%;">로 그 인</li>';
                echo '<li>|</li>';
                echo '<li onClick=\'location.href="'.site_url('login/register').'";\'  title="회원가입" style="width:32%;">회 원 가 입</li>';
                echo '<li>|</li>';
                echo '<li onClick=\'location.href="'.site_url('/board/event').'";\'  title="스토어" style="width:32%;">스 토 어</li>';
            }
            ?>
            
            
        </ul>
    </section>

    <!-- 롤링 뉴스 영역 -->
        <section class="rolling_news">
            <ul class="big_font" style="visibility:hidden">
                 <?php
                 $board='';
                 $config = array(

                    'brd_key' => 'live_news',
                    'limit' => 5,
                    'length' => 40,
                    'post_notice' => 3,
                    );
                   $board=$this->board->data($config);

                   if (element('latest', element('view', $board))) {
                    foreach (element('latest', element('view', $board)) as $key => $value)  {?>
                    <li><a style="display:inline-block;" href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>" class="middle_font"><?php echo sprintf("%02d",($key+1)) ?>. <?php echo html_escape(element('title', $value)); ?></a></li> 
                    <?php 
                    }
                    }
                    
                    ?>
            </ul>
        </section>

    <!-- tab01(거래소별 시세) 영역 -->
        <section class="tab01 middle_font">
            <ul class="tab01_tabs tabs ">
                <li class="active" rel="tab01_btc">BTC</li>
                <li rel="tab01_eth">ETH</li>
                <li rel="tab01_xrp">XRP</li>
                <li rel="tab01_bch">BCH</li>
                <li rel="tab01_ltc">LTC</li>
                <li rel="tab01_eos">EOS</li>
                <li rel="tab01_xmr">XMR</li>
                <li rel="tab01_dash">DASH</li>
                <li rel="tab01_etc">ETC</li>
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

    <!-- 접기 버튼 -->
        <button class="btn_up">
            ▲ 접 기
        </button>

    <!-- tab02(자유게시판,채굴정보,코인뉴스,실시간 정보) 영역 -->
        <section class="tab02 wrap middle_font">
            <h3><a href="<?php echo site_url('/board/free') ?>" class="board_url">
                커뮤니티
                <span><img src="assets/images/more.png" alr="more_img"></span>
                </a>
            </h3>
            <ul class="tab02_tabs tabs">
                <li class="active" rel="tab02_free" data-board_url="<?php echo site_url('/board/free') ?>" style="width:25%">자유게시판</li>
                <li rel="tab02_mine_info" style="width:25%" data-board_url="<?php echo site_url('/board/mine_info') ?>">호재정보</li>
                <li rel="tab02_profit" style="width:25%" data-board_url="<?php echo site_url('/board/profit') ?>">코인분석</li>
                <li rel="tab02_b-1" style="width:25%" data-board_url="<?php echo site_url('/board/b-1') ?>">추천코인</li>
            </ul>

            <div class="tab02_wrap cont_wrap">
                <?php
                    $tab02=array('free','mine_info','profit','b-1');

                    foreach($tab02 as $tvalue){
                        $config = array(
                            'brd_key' => $tvalue,
                            'limit' => 5,
                            'length' => 40,
                            );
                        $board=$this->board->data($config);

                        if (element('latest', element('view', $board))) {

                            echo '<div id="tab02_'.element('brd_key',$config).'" class="tab02_cont cont">
                            <table>';
                                foreach (element('latest', element('view', $board)) as $key => $value) {?>
                                <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                                    <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                                    <td class="text-left">
                                        <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>" id="img_text"><?php } ?>
                                        <?php echo html_escape(element('title', $value)); ?>
                                    </td>
                                    <td><?php echo element('display_datetime', $value); ?></td>
                                </tr>                        
                                <?php 
                            }
                            echo '
                            </table>
                            </div>';
                            } else {
                                echo '<div id="tab02_'.element('brd_key',$config).'" class="tab02_cont cont">
                                <table>
                                    <tr>
                                        <td colspan="3">게시물이 없습니다.</td>
                                    </tr>
                                </table>
                            </div>';
                        }
                    }
                ?>  
            </div>
        </section>

    <!-- ad 영역 -->
        <section class="ad">
           <!-- <?php echo banner('main_mobile_banner') ?> -->
          <script src="http://zone5.adpopcon.com/cgi-bin/PelicanC.dll?impr?pageid=08yB&out=script"></script>
        </section>

    <!-- tab07(최신뉴스,인기뉴스) 영역 -->
        <section class="tab007 wrap middle_font">
            <h3><a href="<?php echo site_url('/board/live_news') ?>" class="board_url">
                뉴스정보
                <span><img src="assets/images/more.png" alr="more_img"></span>
                </a>
            </h3>
            <ul class="tab07_tabs tabs">
                <li class="active" rel="tab07_live_news" data-board_url="<?php echo site_url('/board/live_news') ?>">최신뉴스</li>
                <li rel="tab07_hot_news" data-board_url="<?php echo site_url('/board/live_news?post_notice=4') ?>">인기뉴스</li>
            </ul>

            <div class="tab07_wrap cont_wrap">
            <?php
                $config = array(
                    'brd_key' => 'live_news',
                    'limit' => 4,
                    'length' => 40,
                    'is_gallery'=> 1,
                    'image_width'=> 120,
                    'image_height'=> 90,

                    );
                $board=$this->board->data($config);
                
                if (element('latest', element('view', $board))) {

                    echo '<div id="tab07_'.element('brd_key',$config).'" class="tab07_cont cont">
                    <ul>';
                        foreach (element('latest', element('view', $board)) as $key => $value) {?>
                        <li class='gallery_news'>
                            <a href="<?php echo element('url', $value); ?>">
                            <figure>
                       <img src="<?php echo element('thumb_url', $value); ?>" alr="<?php echo html_escape(element('title', $value)); ?>">
                                <figcaption>
                                <h3 class="normal_font">
                                    <?php if (element('is_new', $value)) { ?><img  src="<?php echo base_url('/assets/images/new.png') ?>" id="img_text" ><?php } ?>
                                    <?php echo html_escape(element('title', $value)); ?>
                                </h3>
                                <p class="display_content"><?php echo element('display_content', $value); ?></p>
                                </figcaption>
                            </figure>
                        </a>
                        </li>                        
                        <?php 
                    }
                    echo '
                    </ul>
                    </div>';
                    } else {
                        echo '<div id="tab07_'.element('brd_key',$config).'" class="tab07_cont cont">
                         <table>
                            <tr>
                                <td colspan="3">게시물이 없습니다.</td>
                            </tr>
                        </table>
                    </div>';
                }
                
            ?>  

            <?php
                $config = array(
                    'brd_key' => 'live_news',
                    'limit' => 4,
                    'length' => 40,
                    'is_gallery'=> 1,
                    'image_width'=> 120,
                    'image_height'=> 90,
                    'post_notice'=> 4,
                    );
                $board=$this->board->data($config);
                
                if (element('latest', element('view', $board))) {

                    echo '<div id="tab07_hot_news" class="tab07_cont cont">
                    <ul>';
                        foreach (element('latest', element('view', $board)) as $key => $value) {?>
                        <li class='gallery_news'>
                            <a href="<?php echo element('url', $value); ?>">
                            <figure>
                                <img src="<?php echo element('thumb_url', $value); ?>" alr="<?php echo html_escape(element('title', $value)); ?>"> 
                                <figcaption>
                                <h3 class="normal_font">
                                    <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>" id="img_text"><?php } ?>
                                    <?php echo html_escape(element('title', $value)); ?>
                                    
                                </h3>
                                <p class="display_content"><?php echo element('display_content', $value); ?></p>
                                </figcaption>
                            </figure>
                        </a>
                        </li>                        
                        <?php 
                    }
                    echo '
                    </ul>
                    </div>';
                    } else {
                        echo '<div id="tab07_hot_news" class="tab07_cont cont">
                         <table>
                            <tr>
                                <td colspan="3">게시물이 없습니다.</td>
                            </tr>
                        </table>
                    </div>';
                }
                
            ?>  
            </div>
        </section>
                    
    <!-- tab03(동영상강좌,코인지식,ICO,거래소별 코인) 영역 -->
        <section class="tab03 wrap middle_font">
            <h3><a href="<?php echo site_url('/board/video') ?>" class="board_url">
                코인강좌
                <span><img src="assets/images/more.png" alr="more_img"></span>
                </a>
            </h3>
            <ul class="tab03_tabs tabs">
                <li class="active" rel="tab03_video" data-board_url="<?php echo site_url('/board/video') ?>">동영상 강좌</li>
                <li rel="tab03_coin_int" data-board_url="<?php echo site_url('/board/coin_int') ?>">코인 지식</li>
                <li rel="tab03_ico" data-board_url="<?php echo site_url('/board/ico') ?>">ICO</li>
                <li rel="tab03_exchange" data-board_url="<?php echo site_url('/board/exchange') ?>">질문/답변</li>
            </ul>

            <div class="tab03_wrap cont_wrap">
                <?php
                    $tab02=array('video','coin_int','ico','exchange');

                    foreach($tab02 as $tvalue){
                        $config = array(
                            'brd_key' => $tvalue,
                            'limit' => 5,
                            'length' => 40,
                        );
                    $board=$this->board->data($config);

                    if (element('latest', element('view', $board))) {

                        echo '<div id="tab03_'.element('brd_key',$config).'" class="tab03_cont cont">
                        <table>';
                        foreach (element('latest', element('view', $board)) as $key => $value) {?>
                            <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                                <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                                <td class="text-left">
                                    <?php if (element('is_new', $value)) { ?><img  src="<?php echo base_url('/assets/images/new.png') ?>" id="img_text"><?php } ?>
                                    <?php echo html_escape(element('title', $value)); ?>
                                </td>
                                <td><?php echo element('display_datetime', $value); ?></td>
                            </tr>                        
                            <?php 
                                }
                                echo '
                            </table>
                        </div>';
                    }else {
                        echo '<div id="tab03_'.element('brd_key',$config).'" class="tab03_cont cont">
                        <table>
                            <tr>
                                <td colspan="3">게시물이 없습니다.</td>
                            </tr>
                        </table>
                    </div>';
                    }
                    }
                    ?>  
            </div>
        </section>
        <section class="ad">
            <?php echo banner('main_mobile_banner2') ?>
        </section>
        
   
   

    <!-- tab09(웹툰 영역) -->
           <section class="tab09 wrap middle_font">
                <h3>

                    <a href="<?php echo site_url('/board/w-3') ?>" class="board_url">
                    웹 툰
                    <span><img src="assets/images/more.png" alr="more_img"></span>
                    </a>
                </h3>
                <ul class="tab09_tabs tabs">
                    <li class='active' rel='tab09_w-3' data-board_url="<?php echo site_url('/board/w-3') ?>">월간신작 TOP 9</li>
                    <li rel='tab09_w-2' data-board_url="<?php echo site_url('/board/w-2') ?>">학원 / 액션</li>
                    <li rel='tab09_w-1' style="width: 34%;" data-board_url="<?php echo site_url('/board/w-1') ?>">드 라 마</li>
                </ul>

                 <div class="tab09_wrap cont_wrap">
               <?php
                $tab04=array('w-3','w-2','w-1');
                foreach($tab04 as $tvalue){
                    $config = array(
                        'brd_key' => $tvalue,
                        'limit' => 9,
                        'length' => 140,
                        'is_gallery'=> 1,
                        'image_width'=> 120,
                        'image_height'=> 90,
                        );

                    echo '<div id="tab09_'.element('brd_key',$config).'" class="tab09_cont cont">
                        <script src="https://ssl-hiadone.ad4989.co.kr/cgi-bin/PelicanC.dll?impr?pageid=08y7&lang=utf-8&out=script"></script>
                </div>';
                    
                }
                ?> </div> 
                
           </section>

    <!-- tab05(유머,자유갤러리) 영역-->
        <section class="tab05 wrap middle_font">
            <h3><a href="<?php echo site_url('/board/free_gallery') ?>" class="board_url">
                갤러리/유머
                <span><img src="assets/images/more.png" alr="more_img"></span>
                </a>
            </h3>
            <ul class="tab05_tabs tabs">
                <li class="active" rel="tab05_free_gallery" data-board_url="<?php echo site_url('/board/free_gallery') ?>">자유갤러리</li>
                <li rel="tab05_humor" data-board_url="<?php echo site_url('/board/humor') ?>">유 머</li>
            </ul>

            <div class="tab05_wrap cont_wrap">
                
                <?php
                    
                    $config = array(
                        'brd_key' => 'free_gallery',
                        'limit' => 9,
                        'length' => 40,
                        'is_gallery'=> 1,
                        'image_width'=> 120,
                        'image_height'=> 90,
                        );
                    $board=$this->board->data($config);

                    if (element('latest', element('view', $board))) {
                        echo '<div id="tab05_'.element('brd_key',$config).'" class="tab05_cont cont">
                        <ul>';
                            foreach (element('latest', element('view', $board)) as $key => $value) {?>
                            <li>
                                <a href="<?php echo element('url', $value); ?>">
                                <img src="<?php echo element('thumb_url', $value); ?>" alr="<?php echo html_escape(element('title', $value)); ?>">
                                </a>
                            </li>                        
                            <?php 
                        }
                        echo '
                    </ul>
                </div>';
                } else {
                    echo '<div id="tab05_'.element('brd_key',$config).'" class="tab05_cont cont">
                    <table>
                        <tr>
                            <td colspan="3">게시물이 없습니다.</td>
                        </tr>
                    </table>
                </div>';
                }
           
            ?>  
            </div>
           

            <div class="tab05_wrap cont_wrap">
                    <?php
                    
                    $config = array(
                        'brd_key' => 'humor',
                        'limit' => 5,
                        'length' => 40,
                        );
                    $board=$this->board->data($config);

                    if (element('latest', element('view', $board))) {
                        echo '<div id="tab05_'.element('brd_key',$config).'" class="tab05_cont cont">
                        <table>';
                            foreach (element('latest', element('view', $board)) as $key => $value) {?>
                            <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                                <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                                <td class="text-left">
                                    <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>" id="img_text"><?php } ?>
                                    <?php echo html_escape(element('title', $value)); ?>
                                </td>
                                <td><?php echo element('display_datetime', $value); ?></td>
                            </tr>                        
                            <?php 
                        }
                        echo '
                    </table>
                </div>';
                } else {
                    echo '<div id="tab05_'.element('brd_key',$config).'" class="tab05_cont cont">
                    <table>
                        <tr>
                            <td colspan="3">게시물이 없습니다.</td>
                        </tr>
                    </table>
                </div>';
                }
           
            ?>  
            </div>
        </section>
        
         <!-- tab04(이벤트 , 출석체크 , 가입인사) 영역 -->
        <section class="tab04 wrap middle_font">
            <h3><a href="<?php echo site_url('/attendance') ?>" class="board_url">
                서비스
                <span><img src="assets/images/more.png" alr="more_img"></span>
                </a>
            </h3>
            <ul class="tab04_tabs tabs">
                
                <li class="active" rel="tab04_attendance" data-board_url="<?php echo site_url('/attendance') ?>">출석체크</li>
                <li rel="tab04_express" data-board_url="<?php echo site_url('/board/express') ?>">가입인사</li>
                <li rel="tab04_notice" data-board_url="<?php echo site_url('/board/notice') ?>">공지사항</li>
            </ul>

            <div class="tab04_wrap cont_wrap">
                    <?php
                    $tab04=array('attendance','express','notice');
                    foreach($tab04 as $tvalue){

                        $config = array(
                            'brd_key' => $tvalue,
                            'limit' => 5,
                            'length' => 40,
                            );
                        $board=$this->board->data($config);

                        if (element('latest', element('view', $board))) {
                            echo '<div id="tab04_'.element('brd_key',$config).'" class="tab04_cont cont">
                            <table>';
                                foreach (element('latest', element('view', $board)) as $key => $value) {?>
                                <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                                    <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                                    <td class="text-left">
                                        <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>" id="img_text"><?php } ?>
                                        <?php echo html_escape(element('title', $value)); ?>
                                    </td>
                                    <td><?php echo element('display_datetime', $value); ?></td>
                                </tr>                        
                                <?php 
                            }
                            echo '
                        </table>
                    </div>';
                } else {
                    echo '<div id="tab04_'.element('brd_key',$config).'" class="tab04_cont cont">
                    <table>
                        <tr>
                            <td colspan="3">게시물이 없습니다.</td>
                        </tr>
                    </table>
                         </div>';
                    }
                    }
                    ?>  
            </div>
        </section>

    <!-- 가상화폐 인물 트위터 리스트 영역-->
        <section class="table_li person_twitter">
            <h3>가상화폐 인물 트위터</h3>
            <table>
                <?php echo twitter("person_twitter",'order',11,"<td>","</td>") ?>
            </table>
        </section>

    <!-- 가상화폐 코인 공식 트위터 리스트 영역-->
        <section class="table_li coin_twitter">
            <h3>가상화폐 코인 공식 트위터</h3>
            <table>
                <?php echo twitter("coin_twitter",'order',15,"<td>","</td>") ?>
            </table>
        </section>

    <!-- 거래소 바로가기 리스트 영역 -->
        <section class="table_li coin_trade">
            <h3>거래소 바로가기</h3>
            <table>
                <?php echo twitter("coin_trade",'order',11,"<td>","</td>") ?>
            </table>
        </section>

    <!-- ad 영역 -->
        <section class="ad">
           <!--  <?php echo banner('main_mobile_banner3') ?> -->
            <script src="http://zone5.adpopcon.com/cgi-bin/PelicanC.dll?impr?pageid=08yC&out=script"></script>
        </section>
    
    <!-- N버튼 영역 -->
        <div class='new_btn'>
            <span>
                <a href='<?php echo site_url('/board/post_hit') ?>'>
                    <img src='<?php echo site_url('/assets/images/new_click.png') ?>' alt='newclick_img'>
                </a>
            </span>
        </div>
</article>


<script type="text/javascript">
    //<![CDATA[
    function view_twitter(id,twitter_key) {
        var list_url = cb_url + '/main/twitter/' + twitter_key;
        $('#' + id).load(list_url);
        $('.pop div span.plus').show();
        $('.pop div span.minus').show();
        $('.pop div span.plus_check').hide();
        $('.pop div span.minus_check').hide();
        $('.pop ul').slideUp();
        postact_flag = false;
    }

    function view_coin(cur_unit) {
        global_cur_unit = cur_unit;
        var list_url = cb_url + '/main/show_coin_data/' + global_cur_unit;
        $('#coin_data').load(list_url,function(){
            $("#" + coinActiveTab).hide();
            $("#" + coinActiveTab).fadeIn();
        }); 
    }

    function twitter_action(action_type, bng_name, msg) {
        var flag=false;
        var href;
        if ( action_type == '') {
            return false;
        }
        if ( msg) {
            if ( ! confirm(msg)) { return false; }
        }
        href = cb_url + '/postact/' + action_type + '/' + bng_name;
        var $that = $(this);
        $.ajax({
            async: false,
            url : href,
            type : 'post',
            data :  $('#ftwitterlist').serialize() + '&csrf_test_name=' + cb_csrf_hash,
            dataType : 'json',
            success : function(data) {
                if (data.error) {
                    alert(data.error);
                    flag = false;
                } else if (data.success) {
                    flag = true;
                }
            }
        });
        return flag;
    }

    function twitter_delete(ban_id,bng_name) {
        var flag=false;
        var href;
        if ( ban_id < 1) {
            return false;
        }
        
        href = cb_url + '/postact/twitter_delete/' + ban_id;
        var $that = $(this);
        $.ajax({
            async: false,
            url : href,
            type : 'get',
            dataType : 'json',
            success : function(data) {
                if (data.error) {
                    alert(data.error);
                    postact_flag = false;
                    return ;
                } else if (data.success) {
                    view_twitter(bng_name,bng_name);
                    postact_flag  = true;
                    return ;
                }
            }
        });
        return ;
    }
    //]]>
</script>
