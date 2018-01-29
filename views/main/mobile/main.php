<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/jquery.bxslider.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/plugins/jquery.easing.1.3.js'); ?>"></script>

<script>
    // rolling_news 영역 스크립트   
        // var postact_flag=false;
        // function scrolling(objId,sec1,sec2,speed,height){ 
        //     this.objId=objId; 
        //     this.sec1=sec1; 
        //     this.sec2=sec2; 
        //     this.speed=speed; 
        //     this.height=height; 
        //     this.h=0; 
        //     this.div=document.getElementById(this.objId); 
        //     this.htmltxt=this.div.innerHTML; 
        //     this.div.innerHTML=this.htmltxt+this.htmltxt; 
        //     this.div.isover=false; 
        //     this.div.onmouseover=function(){this.isover=false;} 
        //     this.div.onmouseout=function(){this.isover=false;} 
        //     var self=this; 
        //     this.div.scrollTop=0; 
        //     window.setTimeout(function(){self.play()},this.sec1); 
        // } 
        // scrolling.prototype={ 
        //     play:function(){ 
        //         var self=this; 
        //         if(!this.div.isover){ 
        //           this.div.scrollTop+=this.speed; 
        //           if(this.div.scrollTop>this.div.scrollHeight/2){ 
        //             this.div.scrollTop=0; 
        //         }else{ 
        //             this.h+=this.speed; 
        //             if(this.h>=this.height){ 
        //               if(this.h>this.height|| this.div.scrollTop%this.height !=0){ 
        //                 this.div.scrollTop-=this.h%this.height; 
        //             } 
        //             this.h=0; 
        //             window.setTimeout(function(){self.play()},this.sec1); 
        //             return; 
        //         } 
        //     } 
        // } 
        // window.setTimeout(function(){self.play()},this.sec2); 
        // }, 
        // prev:function(){ 
        //     if(this.div.scrollTop == 0) 
        //         this.div.scrollTop = this.div.scrollHeight/2; 
        //     this.div.scrollTop -= this.height; 
        // }, 
        // next:function(){ 
        //     if(this.div.scrollTop ==  this.div.scrollHeight/2) 
        //         this.div.scrollTop =0; 
        //     this.div.scrollTop += this.height; 
        // } 
        // }; 

    // 전체 스크립트 
    $(document).ready(function(){
            // tab01 영역 스크립트
            $(".tab01_cont").hide();
            $(".tab01_cont:first").show();

            $("ul.tab01_tabs li").click(function () {
                $("ul.tab01_tabs li").removeClass("active").css("color" , "#333");
                $(this).addClass("active").css("color", "#1c446d");
                $(".tab01_cont").hide()
                var activeTab = $(this).attr("rel");
                $("#" + activeTab).fadeIn()
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
                $("#" + activeTab).fadeIn()
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
            $('.pop div span:nth-child(3)').click(function(){
                    $(this).css('display' , 'none');                                        // +버튼 숨기기
                    $('.pop table td span').css('display' , 'none');                        
                    $(this).siblings('span:nth-child(4)').children('img').attr('src' , '<?php echo base_url('/assets/images/check.png') ?>');
                    $('#postact_'+$(this).data('bng_name')).addClass('postact');
                    $(this).siblings('span:nth-child(4)').css('float' , 'right');
                    $(this).parents('div').siblings('ul').slideDown();
                });

            // -버튼 or 체크버튼(추가) 클릭시
            $('.pop div span:nth-child(4)').click(function(){
                if($(this).siblings('span:nth-child(3)').css('display') == 'none'){             
                    if($(this).hasClass('postact'))
                        if(twitter_action('twitter_update',$(this).data('bng_name'))){
                            $(this).siblings('span:nth-child(3)').css('display' , 'block');             
                            $(this).children('img').attr('src' , '<?php echo base_url('/assets/images/minus.png') ?>');                   

                            $('.pop table td span').css('display' , 'none');
                            $('.pop ul').slideUp();
                            view_twitter($(this).data('bng_name'),$(this).data('bng_name'));
                            postact_flag=true;
                        }
                    }else if($('.pop div span:nth-child(3)').css('display') == 'block'){    // +-버튼이 모두 있는 경우(-버튼을 클릭한경우)                                                                       
                        $('.pop table td span').css('display' , 'block');
                        $(this).siblings('span:nth-child(3)').css('display' , 'none');
                        $(this).children('img').attr('src' , '<?php echo base_url('/assets/images/check.png') ?>');
                        $(this).css('float' , 'right');
                    }
                });

            // 삭제버튼 클릭시
            $('.pop table td span').click(function(){
                $(this).parents('td').parents('tr').remove();
            });

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

                    <span data-bng_name="person_twitter" style="margin-right:2%">
                        <img src="<?php echo base_url('/assets/images/plus.png') ?>" alr="plus">
                    </span>
                    <span data-bng_name="person_twitter" id="postact_person_twitter" class="">
                        <img src="<?php echo base_url('/assets/images/minus.png') ?>" alr="minus">
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

                    <span data-bng_name="coin_twitter" style="margin-right:2%">
                        <img src="<?php echo base_url('/assets/images/plus.png') ?>" alr="plus">
                    </span>
                    <span data-bng_name="coin_twitter" id="postact_coin_twitter">
                        <img src="<?php echo base_url('/assets/images/minus.png') ?>" alr="minus">
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

                    <span  data-bng_name="coin_trade" style="margin-right:2%">
                        <img src="<?php echo base_url('/assets/images/plus.png') ?>" alr="plus">
                    </span>
                    <span data-bng_name="coin_trade" id="postact_coin_trade">
                        <img src="<?php echo base_url('/assets/images/minus.png') ?>" alr="minus">
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
<!-- rolling_news 영역-->
    <section class="rolling_news">
        <!-- 
         화살표 방향 영역
            <div class="rollBtn" onmouseover="hotKeyword.div.isover=false;" onmouseout="hotKeyword.div.isover=false;"> 
              <a style="display:inline-block;" class="previous" onclick="hotKeyword.prev();" title="위로">▲</a> 
              <a style="display:inline-block;" class="next" onclick="hotKeyword.next();" title="아래로">▼</a> 
            </div> 
            기사 리스트 영역
                <div id="jFavList"> 

                <?php

                $board='';
                $config = array(
                    'brd_key' => 'coin_news',
                    'limit' => 5,
                    'length' => 40,
                    'headline' => 1,
                );
                $board=$this->board->data($config);

                if (element('latest', element('view', $board))) {
                    foreach (element('latest', element('view', $board)) as $key => $value) {?>
                        <ul> 
                            <li><a style="display:inline-block;" href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>" class="big_font"><?php echo sprintf("%02d",($key+1)) ?>. <?php echo html_escape(element('title', $value)); ?></a></li> 
                        </ul>
                <?php 
                    }
                }
                ?>
                </div> 
            <script type="text/javascript"> var hotKeyword = new scrolling("jFavList",4000,1,1,35); </script> 
         -->
         
        <ul class="big_font">
               <?php
               $board='';
               $config = array(
                'brd_key' => 'coin_news',
                'limit' => 5,
                'length' => 40,
                'headline' => 1,
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
            <li class="active" rel="tab01_1">BTC</li>
            <li rel="tab01_2">ETH</li>
            <li rel="tab01_3">DASH</li>
            <li rel="tab01_4">XRP</li>
            <li rel="tab01_5">LTC</li>
            <li rel="tab01_6">ETC</li>
            <li rel="tab01_7">BCH</li>
            <li rel="tab01_8">XMR</li>
            <li rel="tab01_9">ZEC</li>
            <li rel="tab01_10">QTUM</li>
            <li rel="tab01_11">BTG</li>
        </ul>

        <div class="tab01_wrap cont_wrap">

            <div id="tab01_1" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>

            <div id="tab01_2" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>

            <div id="tab01_3" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>

            <div id="tab01_4" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>

            <div id="tab01_5" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>

            <div id="tab01_6" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>

            <div id="tab01_7" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>

            <div id="tab01_8" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>

            <div id="tab01_9" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>

            <div id="tab01_10" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>

            <div id="tab01_11" class="tab01_cont cont">
                <table>
                    <tr>
                        <th>거래소별</th>
                        <th>
                            <select>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                                <option>원화 (KRW)</option>
                            </select>
                        </th>
                        <th>변동률</th>
                        <th>프리미엄</th>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>빗 썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 인 원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코 빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,00</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업 비 트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000</td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인네스트</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트렉스</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>플로닉스</td>
                        <td>20,093,000</td>
                        <td>▼1,159,00</td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트 파이넥스</td>
                        <td>20,170,000</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </table>
            </div>  
        </div>
    </section>

<button class="btn_up">
    ▲ 접 기
</button>

<!-- tab02(자유게시판,채굴정보,코인뉴스 수익인증) 영역 -->
    <section class="tab02 wrap middle_font">
        <ul class="tab02_tabs tabs">
            <li class="active" rel="tab02_free">자유게시판</li>
            <li rel="tab02_mine_info">채굴정보</li>
            <!-- <li rel="tab02_coin_news">코인뉴스</li> -->
            <li rel="tab02_profit">수익인증</li>
        </ul>

        <div class="tab02_wrap cont_wrap">
            <?php
                $tab02=array('free','mine_info','coin_news','profit');

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
                                <td class="text-left"><?php echo html_escape(element('title', $value)); ?></td>
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
        <?php echo banner("index_banner2") ?>
    </section>

<!-- tab03(동영상강좌,코인지식,ICO,거래소별 코인) 영역 -->
    <section class="tab03 wrap middle_font">
        <ul class="tab03_tabs tabs">
            <li class="active" rel="tab03_video">동영상 강좌</li>
            <li rel="tab03_coin_int">코인 지식</li>
            <li rel="tab03_ico">ICO</li>
            <li rel="tab03_exchange">거래소별 코인</li>
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
                            <td class="text-left"><?php echo html_escape(element('title', $value)); ?></td>
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

<!-- tab04(이벤트 , 출석체크 , 가입인사) 영역-->
    <section class="tab04 wrap middle_font">
        <ul class="tab04_tabs tabs">
            <li class="active" rel="tab04_event">이벤트</li>
            <li rel="tab04_attenddata">출석체크</li>
            <li rel="tab04_express">가입인사</li>
        </ul>

        <div class="tab04_wrap cont_wrap">
            <?php
                $tab04=array('event','attenddata','express');
                foreach($tab04 as $tvalue){

                    $config = array(
                        'brd_key' => $tvalue,
                        'limit' => 3,
                        'length' => 40,
                        );
                    $board=$this->board->data($config);

                    if (element('latest', element('view', $board))) {
                        echo '<div id="tab04_'.element('brd_key',$config).'" class="tab04_cont cont">
                        <table>';
                            foreach (element('latest', element('view', $board)) as $key => $value) {?>
                            <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                                <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                                <td class="text-left"><?php echo html_escape(element('title', $value)); ?></td>
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

<!-- tab05(유머,자유갤러리) 영역-->
    <section class="tab05 wrap middle_font">
        <ul class="tab05_tabs tabs">
            <li class="active" rel="tab05_free_gallery">자유갤러리</li>
            <li  rel="tab05_humor">유 머</li>
            
        </ul>

        <div class="tab05_wrap cont_wrap">
            <?php
                $config = array(
                    'brd_key' => 'humor',
                    'limit' => 3,
                    'length' => 40,
                    );
                $board=$this->board->data($config);

                if (element('latest', element('view', $board))) {
                    echo '<div id="tab05_'.element('brd_key',$config).'" class="tab05_cont cont">
                    <table>';
                        foreach (element('latest', element('view', $board)) as $key => $value) {?>
                        <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                            <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                            <td class="text-left"><?php echo html_escape(element('title', $value)); ?></td>
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

            <?php
                $config = array(
                    'brd_key' => 'free_gallery',
                    'limit' => 3,
                    'length' => 40,
                    );
                $board=$this->board->data($config);

                if (element('latest', element('view', $board))) {
                    echo '<div id="tab05_'.element('brd_key',$config).'" class="tab05_cont cont">
                    <table>';
                        foreach (element('latest', element('view', $board)) as $key => $value) {?>
                        <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                            <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                            <td class="text-left"><?php echo html_escape(element('title', $value)); ?></td>
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

<!-- 가상화폐 인물 트위터 리스트 영역-->
    <section class="table_li person_twitter">
        <h2 class="big_font">가상화폐 인물 트위터</h2>
        <table>
            <?php echo twitter("person_twitter",'order',11,"<td>","</td>") ?>
        </table>
    </section>

<!-- 가상화폐 코인 공식 트위터 리스트 영역-->
    <section class="table_li coin_twitter">
        <h2 class="big_font">가상화폐 코인 공식 트위터</h2>
        <table>
            <?php echo twitter("coin_twitter",'order',15,"<td>","</td>") ?>
        </table>
    </section>

<!-- 거래소 바로가기 리스트 영역 -->
    <section class="table_li coin_trade">
        <h2 class="big_font">거래소 바로가기</h2>
        <table>
            <?php echo twitter("coin_trade",'order',11,"<td>","</td>") ?>
        </table>
    </section>

<!-- ad 영역 -->
    <section class="ad">
        <?php echo banner("index_banner") ?>
    </section>
    
</article>


<script type="text/javascript">
    //<![CDATA[
    function view_twitter(id,twitter_key) {
        var list_url = cb_url + '/main/twitter/' + twitter_key;
        $('#' + id).load(list_url);
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
    //]]>
</script>