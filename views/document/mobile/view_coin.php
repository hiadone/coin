<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<script>
    
    // rolling_news 영역 스크립트
        var postact_flag=false;
        var global_cur_unit='krw';
        var coinActiveTab='tab01_BTC';
        setInterval('view_coin(global_cur_unit)',10000);

    // 전체 스크립트 
    $(document).ready(function(){
         $("html,body").animate({scrollTop:0});

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
					<li class='noevent pull-right swiper-slide'>
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

