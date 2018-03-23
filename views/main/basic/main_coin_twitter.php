<script>
    // 전체 스크립트 
    $(document).ready(function(){
        var slider = $('.img_slide ul').bxSlider({
            mode:'horizontal',            // 슬라이드의 이동방향 설정 vertical,fade
            speed: 700, // m/s ex > 1000 = 1s
            easing: 'ease-in-out', // 동작 가속도 css와 동일
            sliderMargin: 10, // img 와 img 사이 간격
            startSlide: 0, // 시작시 로드될 이미지 (0부터 시작)
            preloadImages: 'visible', // 'visible'은 보여질때 이미지를 로드,'all'로 설정 하게 되면 모든 이미지가 로드되어야만 slide가 작동
            sliderMargin: 10, // img 와 img 사이 간격
            startSlide: 0, // 시작시 로드될 이미지 (0부터 시작)
            preloadImages: 'visible', // 'visible'은 보여질때 이미지를 로드,'all'로 설정 하게 되면 모든 이미지가 로드되어야만 slide가 작동
            randomStart: false, // 시작시 랜덤으로 이미지 로드 여부 (boolean)
            adaptiveHeight: false, //각 이미지의 높이에 따라 슬라이더 높이의 유동적 조절 여부
            adaptiveHeightSpeed: 500, //adaptiveHeight 동작속도,
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
            pause: 4000, // 자동 재생 시 각 슬라이드 별 노출 시간
            autoStart: true, // 페이지 로드가 되면, 슬라이드의 자동시작 여부
            autoDirection: 'next', // 자동 재생시에 정순, 역순(prev) 방식 설정
            autoHover: true, // 슬라이드 오버시 재생 중단 여부 (false : 오버무시)
            autoDelay: 0, // 자동 재생 전 대기 시간 설정.
            infiniteLoop: true, //마지막에 도달 했을시, 첫페이지로 갈 것인가 멈출것인가
            //pagerCustom: '#bx-pager' // pager
        });

        $(document).on('click','.bx-next, .bx-prev , .bx-pager',function() {
            slider.stopAuto();
            slider.startAuto();
        });

        $(document).bind('touchend' , function(){
            slider.stopAuto();
            slider.startAuto();
        });

        //tab 메뉴(메인의) 스크립트
        $('.tab_cont div').hide();
        $('.tab_cont div:first-child').show();

        //tab메뉴 클릭시
        $('.menu_list li').click(function(){
            $(this).siblings('li').removeClass('active');
            $(this).addClass('active');

            $(this).parents("ul").siblings(".tab_cont").find("div").hide();

            // 클릭한 메뉴의 순번 
            var index = $(this).index();
            // 클릭한 메뉴탭의 id 값
            var click_class = $(this).parents('ul').parents('section').attr('id');

            $("#" + click_class + " .tab_cont div:eq(" + index + ")").fadeIn();
        });


        // 인물트위터 , 코인공식트위터 , 거래소 더보기 버튼 클릭시 cover
        $('table.twitter_table tr:last-child td:last-child').click(function(){

            $('.pop').fadeIn();
            $('section.' + $(this).parent().parent().parent().data('bng_name')+'_more').fadeIn();
            view_twitter($(this).parent().parent().parent().data('bng_name'),$(this).parent().parent().parent().data('bng_name'));
            // $('.twit_pop').fadeIn();
                // $('html, body').css({'overflow': 'hidden', 'height': '100%'}); // 모달팝업 중 html,body의 scroll을 hidden시킴
                // $("html, body").bind('scroll  mousewheel', function(e){e.preventDefault();e.stopPropagation();return false;});
        });

        var popup_hei = $('html').height() + 100;
        $('.pop').css('height' , popup_hei);
        
        // 스크롤바 따라 다니는 스크립트
        var currentPosition = parseInt($(".pop section").css("top"));  

        var position = $(window).scrollTop();
        if((position+$(".pop section").height()) < $(document).height()){

            console.log((position+$(".pop section").height())+"//"+$(document).height());

        $(window).scroll(function(){  
            var position = $(window).scrollTop(); // 현재 스크롤바의 위치값을 반환합니다.  
            
            if((position+$(".pop section").height()) < $(document).height()){
                $(".pop section").stop().animate({"top":position+currentPosition+"px"},500);  
                
            }
        });
        }

        // +버튼(추가) 클릭시 체크버튼,입력란 보여주기
        $('.popup ul li.plus').click(function(){
            $(this).css('display' , 'none');                                        // +버튼 숨기기
            $('.popup table td span').css('display' ,'none');
            $('.popup ul li.plus').hide();
            $('.popup ul li.minus').hide();
            $('.popup ul li.minus_check').hide();
            $('.popup ul li.plus_check').show();
            
            $('.popup div.ftwitterlist').slideDown();
            
        });

        // -버튼 or 체크버튼(추가) 클릭시
        $('.popup ul li.plus_check').click(function(){
            
            if(twitter_action('twitter_update',$(this).data('bng_name'))){
                
                // $(this).siblings('span:nth-child(3)').css('display' , 'block');             
                
                $('.popup ul li.plus').show();
                $('.popup ul li.minus').show();
                $('.popup ul li.minus_check').hide();
                $('.popup ul li.plus_check').hide();

                $('.popup table td span').css('display' ,'none');
                $('.popup div.ftwitterlist').slideUp();
                view_twitter($(this).data('bng_name'),$(this).data('bng_name'));
                postact_flag=true;
            }
           
        });


                


        $('.popup ul li.minus').click(function(){
            $('.popup table td span').css('display' ,'block');
            // $(this).siblings('span:nth-child(3)').css('display' , 'none');
            $('.popup ul li.plus').hide();
            $('.popup ul li.minus').hide();
            $('.popup ul li.minus_check').show();
            $('.popup ul li.plus_check').hide();
            
            
        });

        $('.popup ul li.minus_check').click(function(){
            
            $('.popup ul li.plus').show();
            $('.popup ul li.minus').show();
            $('.popup ul li.minus_check').hide();
            $('.popup ul li.plus_check').hide();
            $('.popup table td span').css('display' ,'none');
           
        });


        // X 버튼 클릭시
        $('.popup > span').click(function(){
            $('.pop').fadeOut();
            $('.popup').fadeOut();
                
            setTimeout(function(){
                $('.popup div.ftwitterlist').slideUp();
                $('.popup table td span').css('display' ,'none');
                $('.popup ul li.plus').show();
                $('.popup ul li.minus').show();
                $('.popup ul li.minus_check').hide();
                $('.popup ul li.plus_check').hide();
                if(postact_flag)location.reload();
                
            },500);
        });

        // // 팝업창의 순번 넣기
        //     $('.twit_pop table tr').each(function(){
        //         var index_num ='0' + ($(this).index()+1) + '.';
        //         $(this).children("td:first-child").html(index_num);
        //     });

        // // 삭제버튼 클릭시
        //     $('.twit_pop td span').click(function(){
        //         $(this).parents('td').parents('tr').remove();

        //         $('.twit_pop table tr').each(function(){
        //             var index_num = '0' + ($(this).index()+1) + '.';
        //             $(this).children("td:first-child").html(index_num);
        //         });
        //     });
    });
</script>

<article class="pop">
    <?php
        $attributes = array('name' => 'ftwitterlist', 'id' => 'ftwitterlist');
        echo form_open('', $attributes);
        ?>
    <section class='person_twitter_more twit_pop popup'>
        
        <h4>인 물 트 위 터</h4>
        <!-- 타이틀 영역 -->
        
        <span>
            <img src="<?php echo base_url('/assets/images/clear02.png') ?>" alr="clear">
        </span>

        
        <ul>
            <li data-bng_name="person_twitter"  class="plus">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/plus.png" alt="plus_img">
            </li>

            <li data-bng_name="person_twitter"  class="minus">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/minus.png" alt="minus_img">
            </li>

            <li data-bng_name="person_twitter"  style="display:none;float: right;" class="plus_check">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/check.png" alt="check_img">
            </li>

            <li data-bng_name="person_twitter"  style="display:none;float: right;" class="minus_check">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/check.png" alt="check_img">
            </li>
        </ul>
        
        <!-- +버튼 클릭시 , 추가 입력란 영역--> 
        <div class="ftwitterlist" style="display:none">
            
                <input type="text" name="ban_title_person_twitter" placeholder="인물 트위터 명을 입력해주세요." onfocus="this.placeholder=''" onblur="this.placeholder='인물 트위터 명을 입력해주세요.'">
            
            
                <input type="text" name="ban_url_person_twitter" placeholder="클릭 시 이동할 주소를 적어 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='클릭 시 이동할 주소를 적어 주세요.'">
            
        </div>
            
        <!-- 리스트 영역-->
        <div id="person_twitter">
        </div>
    </section>

<!-- 코인 공식트위터 더보기 클릭시 팝업 내용-->
    <section class="coin_twitter_more twit_pop popup">
        <!-- 타이틀 영역 -->
        <h4>코인 공식 트위터</h4>
        <span>
            <img src="<?php echo base_url('/assets/images/clear02.png') ?>" alr="clear">
        </span>

        <ul>
            <li data-bng_name="coin_twitter"  class="plus">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/plus.png" alt="plus_img">
            </li>

            <li data-bng_name="coin_twitter"  class="minus">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/minus.png" alt="minus_img">
            </li>

            <li data-bng_name="coin_twitter"  style="display:none;float: right;" class="plus_check">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/check.png" alt="check_img">
            </li>

            <li data-bng_name="coin_twitter"  style="display:none;float: right;" class="minus_check">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/check.png" alt="check_img">
            </li>
        </ul>

           

        <!-- +버튼 클릭시 , 추가 입력란 영역--> 
        <div class="ftwitterlist" style="display:none">
            <input type="text" name="ban_title_coin_twitter" placeholder="코인 공식 트위터 명을 입력해주세요." onfocus="this.placeholder=''" onblur="this.placeholder='코인 공식 트위터 명을 입력해주세요.'">
            <input type="text" name="ban_url_coin_twitter" placeholder="클릭 시 이동할 주소를 적어 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='클릭 시 이동할 주소를 적어 주세요.'">
        </div>
        <!-- 리스트 영역-->
        <div id="coin_twitter">
        </div>
    </section>

<!-- 거래소 바로가기 더보기 클릭시 팝업 내용-->
    <section class="coin_trade_more twit_pop popup">
        <!-- 타이틀 영역 -->
        <h4>거래소 바로가기</h4>
        <span>
            <img src="<?php echo base_url('/assets/images/clear02.png') ?>" alr="clear">
        </span>

        <ul>
            <li data-bng_name="coin_trade"  class="plus">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/plus.png" alt="plus_img">
            </li>

            <li data-bng_name="coin_trade"  class="minus">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/minus.png" alt="minus_img">
            </li>

            <li data-bng_name="coin_trade"  style="display:none;float: right;" class="plus_check">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/check.png" alt="check_img">
            </li>

            <li data-bng_name="coin_trade"  style="display:none;float: right;" class="minus_check">
                <img src="<?php echo element('layout_skin_url', $layout); ?>/images/check.png" alt="check_img">
            </li>
        </ul>
        <!-- +버튼 클릭시 , 추가 입력란 영역--> 


        <!-- +버튼 클릭시 , 추가 입력란 영역--> 
        <div class="ftwitterlist" style="display:none">
            <input type="text" name="ban_title_coin_trade" placeholder="거래소 명을 입력해주세요." onfocus="this.placeholder=''" onblur="this.placeholder='거래소 명을 입력해주세요.'">
            <input type="text" name="ban_url_coin_trade" placeholder="클릭 시 이동할 주소를 적어 주세요." onfocus="this.placeholder=''" onblur="this.placeholder='클릭 시 이동할 주소를 적어 주세요.'">
        </div>
        <div id="coin_trade">
        </div>
        <!-- 리스트 영역-->
        
    </section>
    <?php echo form_close(); ?>        
</article>



<article class="img_slide" style="display:none"> 
    <ul>
        <?php echo banner('main_bxslider','order',3,0,'<li>','</li>'); ?>
    </ul>
</article>

<article class="content03">
    <section class="coin_mall" style="display:none">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/bitcoin.png" alt="bitcoin_logo_img">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/ethereum.png" alt="ethereum_logo_img">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/ripple.png" alt="ripple_logo_img">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/bitcoin.png" alt="bitcoin_logo_img">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/litecoin.png" alt="litecoin_logo_img">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/dash.png" alt="dash_logo_img">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/monero.png" alt="monero_logo_img">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/ethereum_classic.png" alt="ethereum_classic_logo_img">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/zcash.png" alt="zcash_logo_img">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/qtum.png" alt="qtum_logo_img">
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
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/store_logo/eos.png" alt="eos_logo_img">
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

    <section class="tab" id="news" style="display:none">
        <h2>뉴 스 정 보<span><a href="<?php echo site_url('/group/g-c/live_news') ?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/more.png" alt="more_img"></a></span></h2>

        <ul class="menu_list">
            <li class="active">최신뉴스</li>
            <li>인기뉴스</li>
        </ul>

        <div class="tab_cont">
            <div>
                <table>
                <?php
                $config = array(
                    'brd_key' => 'live_news',
                    'limit' => 6,
                    'length' => 40,
                    'is_gallery'=> 1,
                    'image_width'=> 120,
                    'image_height'=> 90,

                    );
                $board=$this->board->data($config);
                
                if (element('latest', element('view', $board))) {
                    foreach (element('latest', element('view', $board)) as $key => $value) {
                ?>
                        <tr class="">
                            <td onclick='location.href="<?php echo element('url', $value); ?>"'>
                                <figure>
                                    <img src="<?php echo element('thumb_url', $value); ?>" alr="<?php echo html_escape(element('title', $value)); ?>">
                                    <figcaption>
                                        <h3><?php echo html_escape(element('title', $value)); ?>
                                        <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>" ><?php } ?>
                                        </h3>
                                        <p>
                                            <?php echo element('display_content', $value); ?>
                                        </p>
                                    </figcaption>
                                </figure>   
                            </td>
                        </tr>
                            
                <?php 
                    }
                     
                } else {
                    echo '
                        <tr>
                            <td>게시물이 없습니다.</td>
                        </tr>
                        ';
                }
                    
                ?>  
                </table>
            </div>

            <div>
                <table>
                    <?php
                    $config = array(
                        'brd_key' => 'live_news',
                        'limit' => 6,
                        'length' => 40,
                        'is_gallery'=> 1,
                        'image_width'=> 120,
                        'image_height'=> 90,
                        'post_notice'=> 4,
                    );
                    $board=$this->board->data($config);
                    
                    if (element('latest', element('view', $board))) {
                        foreach (element('latest', element('view', $board)) as $key => $value) {
                    ?>
                            <tr class="">
                                <td onclick='location.href="<?php echo element('url', $value); ?>"'>
                                    <figure>
                                        <img src="<?php echo element('thumb_url', $value); ?>" alr="<?php echo html_escape(element('title', $value)); ?>">
                                        <figcaption>
                                            <h3><?php echo html_escape(element('title', $value)); ?>
                                            <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>" ><?php } ?>
                                            </h3>
                                            <p>
                                                <?php echo element('display_content', $value); ?>
                                            </p>
                                        </figcaption>
                                    </figure>   
                                </td>
                            </tr>
                                
                    <?php 
                        }
                         
                    } else {
                        echo '
                            <tr>
                                <td>게시물이 없습니다.</td>
                            </tr>
                            ';
                    }
                        
                    ?>  
                </table>
            </div>
        </div>
    </section>

    <section class="tab" id="community" style="display:none">
        <h2>커 뮤 니 티<span><a href="<?php echo site_url('/group/g-b/free') ?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/more.png" alt="more_img"></a></span></h2>

        <ul class="menu_list">
            <li class="active">자유게시판</li>
            <li>호 재 정 보</li>
            <li>코 인 분 석</li>
        </ul>

        <div class="tab_cont">
            <?php
            $tab02=array('free','mine_info','profit');

            foreach($tab02 as $tvalue){
                $config = array(
                    'brd_key' => $tvalue,
                    'limit' => 20,
                    'length' => 70,
                    );
                $board=$this->board->data($config);

                if (element('latest', element('view', $board))) {

                    echo '<div>
                    <table class="tab_text">';
                        foreach (element('latest', element('view', $board)) as $key => $value) {?>
                        <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                            <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                            <td class="text-left"><?php echo html_escape(element('title', $value)); ?>
                                
                                <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>"><?php } ?>
                            </td>
                            <td><?php echo element('display_datetime', $value); ?></td>
                        </tr>                        
                        <?php 
                    }
                    echo '
                    </table>
                    </div>';
                    } else {
                        echo '<div>
                        <table >
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


    <section class="tab" id="coin_info" style="display:none">
        <h2>코 인 지 식<span><a href="<?php echo site_url('/group/g-a/video') ?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/more.png" alt="more_img"></a></span></h2>
        <ul class="menu_list">
            <li class="active">동영상강좌</li>
            <li>코 인 지 식</li>
            <li>I C O</li>
            <li>질 문 / 답변 </li>
        </ul>

        <div class="tab_cont">
            <?php
            $tab02=array('video','coin_int','ico','exchange');

            foreach($tab02 as $tvalue){
                $config = array(
                    'brd_key' => $tvalue,
                    'limit' => 20,
                    'length' => 70,
                    );
                $board=$this->board->data($config);

                if (element('latest', element('view', $board))) {

                    echo '<div>
                    <table class="tab_text">';
                        foreach (element('latest', element('view', $board)) as $key => $value) {?>
                        <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                            <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                            <td class="text-left"><?php echo html_escape(element('title', $value)); ?>
                                
                                <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>"><?php } ?>
                            </td>
                            <td><?php echo element('display_datetime', $value); ?></td>
                        </tr>                        
                        <?php 
                    }
                    echo '
                    </table>
                    </div>';
                    } else {
                        echo '<div>
                        <table >
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

    <section class="tab" id="service" style="display:none">
        <h2>서 비 스<span><a href="<?php echo site_url('/group/g-b-a/free_gallery') ?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/more.png" alt="more_img"></a></span></h2>

        <ul class="menu_list">
            <li class="active">자 유 갤 러 리</li>
            <li>유 머</li>
        </ul>

        <div class="tab_cont tab_cont02">
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

                echo '<div>
                <table class="tab_img">';
                    foreach (element('latest', element('view', $board)) as $key => $value) {
                    if($key % 3===0 || $key ===0) echo '<tr>';
                        ?>

                    
                        
                        <td>
                            <a href="<?php echo element('url', $value); ?>">
                                <img src="<?php echo element('thumb_url', $value); ?>" alr="<?php echo html_escape(element('title', $value)); ?>">
                            </a>
                        </td>                        
                    
                    <?php 
                    if($key % 3===2) echo '</tr>';
                }
                echo '
                </table>
                </div>';
                } else {
                    echo '<div>
                    <table >
                        <tr>
                            <td colspan="3">게시물이 없습니다.</td>
                        </tr>
                    </table>
                </div>';
            }
            
            ?>  

            <?php
                    
                $config = array(
                    'brd_key' => 'humor',
                    'limit' => 10,
                    'length' => 70,
                    );
                $board=$this->board->data($config);

                if (element('latest', element('view', $board))) {
                    echo '<div >
                    <table class="tab_text">';
                        foreach (element('latest', element('view', $board)) as $key => $value) {?>
                        <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                            <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                            <td class="text-left"><?php echo html_escape(element('title', $value)); ?>
                                <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>" ><?php } ?>
                            </td>
                            <td><?php echo element('display_datetime', $value); ?></td>
                        </tr>                        
                        <?php 
                    }
                    echo '
                </table>
            </div>';
            } else {
                echo '<div>
                <table >
                    <tr>
                        <td colspan="3">게시물이 없습니다.</td>
                    </tr>
                </table>
            </div>';
            }
           
            ?>  
        </div>
    </section>

    <section class="tab" id="event" style="display:none">
        <h2>이 벤 트<span><a href="<?php echo site_url('/group/other/event') ?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/more.png" alt="more_img"></a></span></h2>
        <ul class="menu_list">
            <li class="active">이 벤 트</li>
            <li>출 석 체 크</li>
            <li>가 입 인 사</li>
        </ul>

        <div class="tab_cont tab_cont02">

            <?php
                $tab04=array('event','attendance','express');
                foreach($tab04 as $tvalue){

                    $config = array(
                        'brd_key' => $tvalue,
                        'limit' => 10,
                        'length' => 70,
                        );
                    $board=$this->board->data($config);

                    if (element('latest', element('view', $board))) {
                        echo '<div>
                        <table class="tab_text">';
                            foreach (element('latest', element('view', $board)) as $key => $value) {?>
                            <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                                <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                                <td class="text-left">
                                    <?php echo html_escape(element('title', $value)); ?>
                                    <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>"><?php } ?>
                                </td>
                                <td><?php echo element('display_datetime', $value); ?></td>
                            </tr>                        
                            <?php 
                        }
                        echo '
                    </table>
                </div>';
            } else {
                echo '<div>
                <table >
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

    <section class="tab" id="notice" style="display:none">
        <h2>공 지 사 항<span><a href="<?php echo site_url('/faq/notice') ?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/more.png" alt="more_img"></a></span></h2>

        <ul class="menu_list">
            <li class="active">공 지 사 항</li>
            <li>F A Q</li>
        </ul>

        <div class="tab_cont tab_cont02">
            <?php
                $tab04=array('notice','faq');
                foreach($tab04 as $tvalue){

                    $config = array(
                        'brd_key' => $tvalue,
                        'limit' => 10,
                        'length' => 70,
                        );
                    $board=$this->board->data($config);

                    if (element('latest', element('view', $board))) {
                        echo '<div>
                        <table class="tab_text">';
                            foreach (element('latest', element('view', $board)) as $key => $value) {?>
                            <tr onClick="location.href='<?php echo element('url', $value); ?>'">
                                <td><?php echo sprintf("%02d",($key+1)) ?>.</td>
                                <td class="text-left">
                                    <?php echo strip_tags(element('title', $value)); ?>
                                    <?php if (element('is_new', $value)) { ?><img src="<?php echo base_url('/assets/images/new.png') ?>"><?php } ?>
                                </td>
                                <td><?php echo element('display_datetime', $value); ?></td>
                            </tr>                        
                            <?php 
                        }
                        echo '
                    </table>
                </div>';
            } else {
                echo '<div>
                <table >
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

    <section class="twit">
        <div id="people_twit">
            <h2>가상화폐 인물트위터</h2>
            <table class="twitter_table" data-bng_name="person_twitter">
                <?php echo twitter("person_twitter",'order',11,"<td>","</td>") ?>
            </table>
        </div>

        <div id='coin_twit'>
            <h2>가상화폐 코인 공식 트위터</h2>
            <table class="twitter_table" data-bng_name="coin_twitter">
                <?php echo twitter("coin_twitter",'order',11,"<td>","</td>") ?>
            </table>
        </div>

        <div id='coin_store'>
            <h2>거래소 바로가기</h2>
            <table class="twitter_table" data-bng_name="coin_trade">
                <?php echo twitter("coin_trade",'order',11,"<td>","</td>") ?>
            </table>
        </div>
    </section>
</article>
<script type="text/javascript">
    //<![CDATA[
    function view_twitter(id,twitter_key) {
        var list_url = cb_url + '/main/twitter/' + twitter_key;
        $('#' + id).load(list_url);
        $('.popup ul li.plus').show();
        $('.popup ul li.minus').show();
        $('.popup ul li.plus_check').hide();
        $('.popup ul li.minus_check').hide();
        $('.popup div.ftwitterlist').slideUp();
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