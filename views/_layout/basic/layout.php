<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=1280">
<title><?php echo html_escape(element('page_title', $layout)); ?></title>
<?php if (element('meta_description', $layout)) { ?><meta name="description" content="<?php echo html_escape(element('meta_description', $layout)); ?>"><?php } ?>
<?php if (element('meta_keywords', $layout)) { ?><meta name="keywords" content="<?php echo html_escape(element('meta_keywords', $layout)); ?>"><?php } ?>
<?php if (element('meta_author', $layout)) { ?><meta name="author" content="<?php echo html_escape(element('meta_author', $layout)); ?>"><?php } ?>
<?php if (element('favicon', $layout)) { ?><link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" /><?php } ?>
<?php if (element('canonical', $view)) { ?><link rel="canonical" href="<?php echo element('canonical', $view); ?>" /><?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/import.css?<?php echo $this->cbconfig->item('browser_cache_version') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/earlyaccess/nanumgothic.css" />
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/ui-lightness/jquery-ui.css" />
<?php echo $this->managelayout->display_css(); ?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
// 자바스크립트에서 사용하는 전역변수 선언
var cb_url = "<?php echo trim(site_url(), '/'); ?>";
var cb_cookie_domain = "<?php echo config_item('cookie_domain'); ?>";
var cb_charset = "<?php echo config_item('charset'); ?>";
var cb_time_ymd = "<?php echo cdate('Y-m-d'); ?>";
var cb_time_ymdhis = "<?php echo cdate('Y-m-d H:i:s'); ?>";
var layout_skin_path = "<?php echo element('layout_skin_path', $layout); ?>";
var view_skin_path = "<?php echo element('view_skin_path', $layout); ?>";
var is_member = "<?php echo $this->member->is_member() ? '1' : ''; ?>";
var is_admin = "<?php echo $this->member->is_admin(); ?>";
var cb_admin_url = <?php echo $this->member->is_admin() === 'super' ? 'cb_url + "/' . config_item('uri_segment_admin') . '"' : '""'; ?>;
var cb_board = "<?php echo isset($view) ? element('board_key', $view) : ''; ?>";
var cb_board_url = <?php echo ( isset($view) && element('board_key', $view)) ? 'cb_url + "/' . config_item('uri_segment_board') . '/' . element('board_key', $view) . '"' : '""'; ?>;
var cb_device_type = "<?php echo $this->cbconfig->get_device_type() === 'mobile' ? 'mobile' : 'desktop' ?>";
var cb_csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
var cookie_prefix = "<?php echo config_item('cookie_prefix'); ?>";
</script>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo base_url('assets/js/html5shiv.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.extension.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/sideview.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/js.cookie.js'); ?>"></script>
<?php echo $this->managelayout->display_js(); ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/jquery.bxslider.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/plugins/jquery.easing.1.3.js'); ?>"></script>
<script>

$(document).ready(function(){
    // ham 메뉴 움직이는 스크립트
        var move = true;

        function ham_slide(){
            move = !move;
            if(move){
                $('.ham').animate({'right':'-320'} , 800);
                $('.ham > div > img').attr('src' , '<?php echo element('layout_skin_url', $layout); ?>/images/ham_btn.png');
            }else{

                $('.ham').animate({'right':'0'} , 800);
                $('.ham > div > img').attr('src' , '<?php echo element('layout_skin_url', $layout); ?>/images/ham_btn02.png');
            }
        }
        // ham 의 화살표 이미지 클릭시 ham 메뉴 움직이는 스크립트
            $('.ham > div > img').click(function(){
                <?php if ($this->member->is_member()) { ?>
                    view_mypage('view_member');
                <?php }else{ ?>
                    view_login('view_member');
                <?php } ?>
                ham_slide();
            });

        // 로그인 , 회원 가입 클릭시 ham 메뉴 움직이는 스크립트
            $('li.login-li').click(function(){
                view_login('view_member');
                ham_slide();
            });


        // 회원정보 클릭시 ham 메뉴 움직이는 스크립트
            $('li.user_info').click(function(){
                view_mypage('view_member');
                ham_slide();
            });

        

        // 회원탈퇴의 회원탈퇴 클릭시
            $('.good_bye02').click(function(){
                var result = confirm('정말로 회원탈퇴를 하시겠습니까? 탈퇴한 회원정보는 복구할 수 없으므로 신중히 선택하여주세요. 확인을 누르시면 탈퇴가 완료됩니다.');
                if(result){ 
        
                  }
            });

        

    // 로그인 롤링 텍트스   
        var slider_noice = $('.login_noice ul').bxSlider({
        mode:    'vertical',            // 슬라이드의 이동방향 설정 vertical,fade
        speed: 500, // m/s ex > 1000 = 1s
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
            prevText: '▲',

            onSliderLoad: function(){
                $('.login_noice').css('visibility','visible');
            }
        });
        
        // 클릭시 멈춤 현상 해결 //
            $(document).on('click','.bx-next, .bx-prev , .bx-pager',function() {
                slider_noice.stopAuto();
                slider_noice.startAuto();
            });

            $(document).bind('touchend' , function(){
                slider_noice.stopAuto();
                slider_noice.startAuto();
            });

 
           
    // footer의 TOP 클릭시 맨 상단으로 이동
        $(".footer p span").click(function(){
            $('html,body').animate({'scrollTop' : '0'} , '1000');
        });

    

    // // 팝업창 스크립트
    //     var popup_hei = $('html').height() + 100;
    //         $('.pop').css('height' , popup_hei);

    //     // 스크롤바 따라 다니는 스크립트
    //         var currentPosition = parseInt($(".pop section").css("top"));  
    //         $(window).scroll(function(){  
    //             var position = $(window).scrollTop(); // 현재 스크롤바의 위치값을 반환합니다.  
    //             $(".pop section").stop().animate({"top":position+currentPosition+"px"},500);  
    //         });

    //     // 팝업창의 + 버튼 클릭시 입력창
    //         $('.twit_pop li:first-child').click(function(){
    //             $('.twit_pop form').slideDown();
    //             $('.twit_pop li:first-child').css('display' , 'none');
    //             $('.twit_pop li:nth-child(2)').css('display' , 'none');
    //             $('.twit_pop li:last-child').css('display' , 'block');
    //         });

    //     // 팝업창의 - 버튼 클릭시
    //         $('.twit_pop li:nth-child(2)').click(function(){
    //             $('.twit_pop td span').css('display' ,'block');
    //             $('.twit_pop li:first-child').css('display' , 'none');
    //             $('.twit_pop li:nth-child(2)').css('display' , 'none');
    //             $('.twit_pop li:last-child').css('display' , 'block');
    //         });

    //     // 체크버튼 클릭시 
    //         $('.twit_pop li:nth-child(3)').click(function(){
    //             $('.pop form').slideUp();
    //             $('.twit_pop li:first-child').css('display' , 'block');
    //             $('.twit_pop li:nth-child(2)').css('display' , 'block');
    //             $('.twit_pop li:last-child').css('display' , 'none');
    //             $('.twit_pop td span').css('display' ,'none');
    //         });

    //     // X 버튼 클릭시
    //         $('.popup > span').click(function(){
    //             $('.pop').fadeOut();
    //             $('.popup').fadeOut();
                    
    //             setTimeout(function(){
    //                 $('.pop form').slideUp();
    //                 $('.twit_pop li:first-child').css('display' , 'block');
    //                 $('.twit_pop li:nth-child(2)').css('display' , 'block');
    //                 $('.twit_pop li:last-child').css('display' , 'none');
    //                 $('.twit_pop td span').css('display' , 'none');
    //             },500);
    //         });

    //     // 팝업창의 순번 넣기
    //         $('.twit_pop table tr').each(function(){
    //             var index_num ='0' + ($(this).index()+1) + '.';
    //             $(this).children("td:first-child").html(index_num);
    //         });

    //     // 삭제버튼 클릭시
    //         $('.twit_pop td span').click(function(){
    //             $(this).parents('td').parents('tr').remove();

    //             $('.twit_pop table tr').each(function(){
    //                 var index_num = '0' + ($(this).index()+1) + '.';
    //                 $(this).children("td:first-child").html(index_num);
    //             });
    //         });
            
    //     // 트위터(메인의) 더보기 클릭시   
    //         $('.twit .twit_add').click(function(){
    //             $('.pop').fadeIn();
    //             $('.twit_pop').fadeIn();
    //                 if($(this).parents("div").attr("id") == 'people_twit'){
    //                     $('.twit_pop h4').text('인물트위터');
    //                     $('.pop form input:first-child').attr('placeholder' , '인물트위터 명을 입력해 주세요.');

    //                     $('.pop form input:first-child').blur(function(){
    //                         $(this).attr('placeholder' , '인물트위터 명을 입력해 주세요.');
    //                     });

    //                 }else if($(this).parents("div").attr("id") == 'coin_twit'){
    //                     $('.twit_pop h4').text('공식 트위터');   
    //                     $('.pop form input:first-child').attr('placeholder' , '공식 트위터 명을 입력해 주세요.');

    //                     $('.pop form input:first-child').blur(function(){
    //                         $(this).attr('placeholder' , '공식 트위터 명을 입력해 주세요.');
    //                     });
    //                 }else if($(this).parents("div").attr("id") == 'coin_store'){
    //                     $('.twit_pop h4').text('거래소 바로가기');
    //                     $('.pop form input:first-child').attr('placeholder' , '거래소명을 입력해 주세요.');

    //                     $('.twit_pop form input:first-child').blur(function(){
    //                         $(this).attr('placeholder' , '거래소 명을 입력해 주세요.');
    //                     }); 
    //                 }
    //         });
            
    // // submenu 의 화살표 이동 스크립트
    //     $('.submenu li').click(function(){
    //         if($(this).index() == '0'){
    //             $('li.submenu_arrow').animate({'left':'66'});
    //         }else if($(this).index() == '2'){
    //             $('li.submenu_arrow').animate({'left':'222'});
    //         }else if($(this).index() == '4'){
    //             $('li.submenu_arrow').animate({'left':'378'});
    //         }else if($(this).index() == '6'){
    //             $('li.submenu_arrow').animate({'left':'534'});
    //         }
    //     });

    // // post_table의 클릭한 메뉴의 리스트 보여주기 스크립트
    //         var click_id = $('.submenu li.menu_active').children('a').attr('href');
    //         $(click_id).css('display' , 'block');

    //         $('.submenu li').click(function(){
    //             // $('html,body').animate({'scrollTop' : '0'} , '1000');
    //             $('.submenu li').removeClass('menu_active');
    //             $(this).addClass('menu_active');

    //             var click_id = $(this).children('a').attr('href');
    //             $('.post_table').css('display' , 'none');
    //             $(click_id).css('display' , 'block');

    //             if(click_id == '#event02'){
    //                 $('.bar').css('height' , '60');
    //             }else{
    //                 $('.bar').css('height' , '30');
    //             }
    //         });

    // // post_table 의 순번 넣기 스크립트
    //         $('.post_table').each(function(){
    //             var tr_count = $(this).find('.post_table_li tr').length; 
    //             $(this).find('td:first-child').each(function(){
    //                 if($(this).html() ==''){
    //                     var table_count = tr_count - $(this).parents('tr').index();
    //                     $(this).html(table_count);
    //                 }
                    
    //             });
                
    //         });

    //     //post page 스크립트
    //         $('.post_page li').click(function(){
    //             if($(this).attr('id') == 'prev_all'){                               // 맨처음으로 버튼 클릭시
    //                 $('.post_page li').removeClass('page_active');
    //                 $('.post_page li:nth-child(3)').addClass('page_active');

    //             }else if($(this).attr('id') == 'prev'){                             // 한칸 앞으로 버튼 클릭시
    //                 var pager_num = $('.post_page li.page_active').index() -1;
    //                 if($('.post_page li').eq(pager_num).attr('class') != 'page_arrow'){
    //                     $('.post_page li').removeClass('page_active');
    //                     $('.post_page li').eq(pager_num).addClass('page_active');
    //                 }

    //             }else if($(this).attr('id') == 'next_all'){                         // 맨뒤로 버튼 클릭시
    //                 var pager_num = $('.post_page li').length - 3;
    //                 $('.post_page li').removeClass('page_active');
    //                 $('.post_page li').eq(pager_num).addClass('page_active');

    //             }else if($(this).attr('id') == 'next'){                             // 한칸뒤로 버튼 클릭시 
    //                 var pager_num = $('.post_page li.page_active').index() +1
    //                 if($('.post_page li').eq(pager_num).attr('class') != 'page_arrow'){
    //                     $('.post_page li').removeClass('page_active');
    //                     $('.post_page li').eq(pager_num).addClass('page_active');
    //                 }

    //             }else if($(this).attr('class') != 'page_arrow'){
    //                 $('.post_page li').removeClass('page_active');
    //                 $(this).addClass('page_active');
    //             }
    //         });

    // // 댓글영역 스크립트
    //     // 글자수 카운터 스크립트
    //         $('.write_area').keyup(function(){
    //             var reply_cont = $(this).val();
    //             $(this).siblings('span').html(reply_cont.length + '/1000');
    //         });

    //         $('.write_area').keyup();

    //     // 댓글의 글자수 초과시 팝업창 스크립트
    //         $('.write_area').keydown(function(){
    //             var reply_cont = $(this).val().length;
    //             if(reply_cont == 1000){
    //                 alert('최대 1000자까지만 가능합니다.');
    //             }
    //         });

    //     // 수정버튼 클릭시 수정영역 보여주기 스크립트
    //         $('.modify').click(function(){
    //             $('.reply_modify').slideUp();
    //             var modify = $(this).parents('.reply_cont').siblings('.reply_modify');
    //             if(modify.css('display') == 'none'){
    //                 $(modify).slideDown();
    //             }else if(modify.css('display') == 'block'){
    //                 $(modify).slideUp();
    //             }
    //         });

    //     // 삭제버튼 클릭시 리스트에서 삭제 스크립트
    //         $('.clear').click(function(){
    //             $(this).parents('li').remove();
    //         });

    // // 출석체크 스크립트
    //     $('.atten_date li').click(function(){
    //         $('.atten_date li').removeClass('active');
    //         $(this).addClass('active');
    //     });

    //     // 포인트 정책보기(이벤트의 출석체크) 클릭시
    //         $('.point').click(function(){
    //             $('.pop').fadeIn();
    //              $('.point_pop').fadeIn();
    //         });
});

</script>
</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>

<aside class="ham">
    <div>
        <img class="pointer pull-left" src="<?php echo element('layout_skin_url', $layout); ?>/images/ham_btn.png" alt="ham_btn_img">
    </div>
    <div id="view_member" class="ham_cont" >
    </div>
    
</aside>

<header>
    <div class="ad">
        <a href="<?php echo site_url(); ?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/head_ad.png" alt="head_ad_img"></a>
    </div>

    <h1>
        <a href="<?php echo site_url(); ?>">
        <span class="small_font">비트코인 정보를 한번에!!</span>
        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/logo.png" alt="logo_img">
        </a>
    </h1>

    <div class="head_search">
        <form name="header_search" id="header_search" action="<?php echo site_url('search'); ?>" onSubmit="return headerSearch(this);">
            <input type="text" class="form-control px150" placeholder="Search" onfocus="this.placeholder=''" onblur="this.placeholder='Search'" name="skeyword" accesskey="s" />
            <input type="image" class="search_img" src="<?php echo element('layout_skin_url', $layout); ?>/images/head_find.png" alt="head_find_img">
        </form>
        <script type="text/javascript">
        //<![CDATA[
        $(function() {
            $('#topmenu-navbar-collapse .dropdown').hover(function() {
                $(this).addClass('open');
            }, function() {
                $(this).removeClass('open');
            });
        });
        function headerSearch(f) {
            var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
            if (skeyword.length < 2) {
                alert('2글자 이상으로 검색해 주세요');
                f.skeyword.focus();
                return false;
            }
            return true;
        }
        //]]>
        </script>

        
        
    </div>
</header>

<aside class="login">
    <section class="login_cont">
        <div class="login_noice" style="visibility:hidden;">
            <h5>알 림</h5>
            <ul>
            <?php
            $board='';
            $config = array(

               'brd_key' => 'live_news',
               'limit' => 5,
               'length' => 80,
               'post_notice' => 3,
               );
              $board=$this->board->data($config);

              if (element('latest', element('view', $board))) {
                   foreach (element('latest', element('view', $board)) as $key => $value)  {?>
                   <li><a style="display:inline-block;color:#fff" href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>" class=""><?php echo sprintf("%02d",($key+1)) ?>. <?php echo html_escape(element('title', $value)); ?></a></li> 
                   <?php 
                   }
               }
               
            ?>
              
            </ul>
        </div>

        <div class="login_list">
            <ul>   
                <?php if (!$this->member->is_member()) { ?>
                <li class="pointer login-li"   title="로그인">로그인</li>
                <li>|</li>
                <li class="pointer login-li"   title="회원가입">회원가입</li>
                <?php } else { ?>
                <li class='user_info pointer' >
                    <figure>
                        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/spoon_<?php echo $this->member->item('mem_level') ?>.png" alt="spoon_<?php echo $this->member->item('mem_level') ?>">
                        <figcaption><?php echo $this->member->item('mem_nickname') ?></figcaption>
                    </figure>
                </li>
                <li>|</li>
                <li><?php echo '포인트 '.number_format($this->member->item('mem_point')).'P';?></li>
                <li>|</li>
                <li class='user_info pointer' title="회원정보">회원정보</li>
                <li>|</li>
                <li class="pointer" onClick='location.href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url()))?>";'  title="로그아웃">로그아웃</li>
                <?php } ?>
            </ul>
        </div>
    </section>
</aside>


<nav>
    <ul>
        <?php
        $menuhtml = '';
        if (element('menu', $layout)) {
            $menu = element('menu', $layout);
            if (element(0, $menu)) {
                foreach (element(0, $menu) as $mkey => $mval) {
                    // if (element(element('men_id', $mval), $menu)) {
                    //     $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                    //     $menuhtml .= '<li class="dropdown">
                    //     <a href="' . $mlink . '" ' . element('men_custom', $mval);
                    //     if (element('men_target', $mval)) {
                    //         $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                    //     }
                    //     $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a>
                    //     <ul class="dropdown-menu">';

                    //     foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
                    //         $slink = element('men_link', $sval) ? element('men_link', $sval) : 'javascript:;';
                    //         $menuhtml .= '<li><a href="' . $slink . '" ' . element('men_custom', $sval);
                    //         if (element('men_target', $sval)) {
                    //             $menuhtml .= ' target="' . element('men_target', $sval) . '"';
                    //         }
                    //         $menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
                    //     }
                    //     $menuhtml .= '</ul></li>';

                    // } else {
                        $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                        $menuhtml .= '<li><a href="' . $mlink . '" ' . element('men_custom', $mval);
                        if (element('men_target', $mval)) {
                            $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                        }
                        $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';

                        $menuhtml .= '<li>|</li>';
                    // }
                }
            }
        }
        echo $menuhtml;
        ?>
       
    </ul>
</nav>

<!-- main start -->
<div class="">
    <?php if (element('use_sidebar', $layout)) {?>
        <div class="left">
    <?php } ?>

    <!-- 본문 시작 -->
    <?php if (isset($yield))echo $yield; ?>
    <!-- 본문 끝 -->

    <?php if (element('use_sidebar', $layout)) {?>

        </div>
        <div class="sidebar">
            <?php $this->load->view(element('layout_skin_path', $layout) . '/sidebar'); ?>
        </div>

    <?php } ?>
</div>

<!-- main end -->
<!-- footer start -->
<?php echo $this->managelayout->display_footer('basic'); ?>
<!-- footer end -->
    


<script type="text/javascript">
$(document).on('click', '.viewpcversion', function(){
    Cookies.set('device_view_type', 'desktop', { expires: 1 });
});
$(document).on('click', '.viewmobileversion', function(){
    Cookies.set('device_view_type', 'mobile', { expires: 1 });
});
</script>
<script type="text/javascript">
//<![CDATA[
function view_mypage(id) {

    var comment_url = cb_url + '/mypage';
    var hash = window.location.hash;

    $('#' + id).load(comment_url, function() {
        if (hash) {
            var st = $(hash).offset().top;
            $('html, body').animate({ scrollTop: st }, 200); //200ms duration
        }
    });
}

function view_login(id) {
    
    var comment_url = cb_url + '/login?url=<?php echo urlencode(current_full_url());?>' ;
    var hash = window.location.hash;

    $('#' + id).load(comment_url, function() {
        if (hash) {
            var st = $(hash).offset().top;
            $('html, body').animate({ scrollTop: st }, 200); //200ms duration
        }
    });
}

function view_memberleave(id) {
    
    var comment_url = cb_url + '/membermodify/memberleave' ;
    var hash = window.location.hash;

    $('#' + id).load(comment_url, function() {
        if (hash) {
            var st = $(hash).offset().top;
            $('html, body').animate({ scrollTop: st }, 200); //200ms duration
        }
    });
}

//]]>
</script>
<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>

<!--
Layout Directory : <?php echo element('layout_skin_path', $layout); ?>,
Layout URL : <?php echo element('layout_skin_url', $layout); ?>,
Skin Directory : <?php echo element('view_skin_path', $layout); ?>,
Skin URL : <?php echo element('view_skin_url', $layout); ?>,
-->

</body>
</html>
