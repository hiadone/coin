<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/jquery.bxslider.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/plugins/jquery.easing.1.3.js'); ?>"></script>

<?php 
$last = $this->uri->total_segments();
$record_num = $this->uri->segment($last);

?>
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
        //     var self=this; 
        //     if(!this.div.isover){ 
        //       this.div.scrollTop+=this.speed; 
        //       if(this.div.scrollTop>this.div.scrollHeight/2){ 
        //         this.div.scrollTop=0; 
        //       }else{ 
        //         this.h+=this.speed; 
        //         if(this.h>=this.height){ 
        //           if(this.h>this.height|| this.div.scrollTop%this.height !=0){ 
        //             this.div.scrollTop-=this.h%this.height; 
        //           } 
        //           this.h=0; 
        //           window.setTimeout(function(){self.play()},this.sec1); 
        //           return; 
        //         } 
        //       } 
        // } 
        // window.setTimeout(function(){self.play()},this.sec2); 
        // }, 
        // prev:function(){ 
        //     if(this.div.scrollTop == 0) 
        //     this.div.scrollTop = this.div.scrollHeight/2; 
        //     this.div.scrollTop -= this.height; 
        // }, 
        // next:function(){ 
        //     if(this.div.scrollTop ==  this.div.scrollHeight/2) 
        //     this.div.scrollTop =0; 
        //     this.div.scrollTop += this.height; 
        // } 
        // }; 

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
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn()
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

<!-- tab01 영역 -->
    <section class="tab01 middle_font">
        <ul class="tab01_tabs tabs">
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000</td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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
                        <td>빗썸</td>
                        <td>20,081,000</td>
                        <td>▲1,159,00 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코인원</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
                        <td>28.3%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>코빗</td>
                        <td>20,081,000</td>
                        <td>▼1,159,000 </td>
                        <td>27.47%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>업비트</td>
                        <td>20,170,000</td>
                        <td>▲1,159,000 </td>
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
                        <td>▼1,159,000 </td>
                        <td>27.88%</td>
                    </tr>

                    <tr onClick="location.href=''">
                        <td>비트파이넥스</td>
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


//]]>
</script>

