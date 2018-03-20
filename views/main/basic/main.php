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

<article class="img_slide"> 
    <ul>
        <?php echo banner('main_bxslider','order',3,0,'<li>','</li>'); ?>
    </ul>
</article>

<article class="content01">
    <section class="coin_mall">
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

    <section class="tab" id="news">
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

    <section class="tab" id="community">
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
</article>
<?php
$k = 0;
$is_open = false;
if (element('board_list', $view)) {
    foreach (element('board_list', $view) as $key => $board) {
        $config = array(
            'skin' => 'basic',
            'brd_key' => element('brd_key', $board),
            'limit' => 5,
            'length' => 40,
            'is_gallery' => '',
            'image_width' => '',
            'image_height' => '',
            'cache_minute' => 1,
        );
        if ($k % 2 === 0) {
            echo '<div>';
            $is_open = true;
        }
        echo $this->board->latest($config);
        if ($k % 2 === 1) {
            echo '</div>';
            $is_open = false;
        }
        $k++;
    }
}
if ($is_open) {
    echo '</div>';
    $is_open = false;
}
