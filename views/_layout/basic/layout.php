<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=1280">
<meta name="description" content="가상화폐 정보제공 커뮤니티, 최신뉴스, ICO정보, 코인분석, 가상화폐시세, 가상화폐전망">
<meta property="og:type" content="website">
<meta property="og:title" content="비트이슈">
<meta property="og:description" content="가상화폐 정보제공 커뮤니티, 최신뉴스, ICO정보, 코인분석, 가상화폐시세, 가상화폐전망">
<meta property="og:image" content="https://www.bitcoissue.com/assets/images/bitissue_event_01.png">
<meta property="og:url" content="https://www.bitcoissue.com">
<title><?php echo html_escape(element('page_title', $layout)); ?></title>
<?php if (element('meta_description', $layout)) { ?><meta name="description" content="<?php echo html_escape(element('meta_description', $layout)); ?>"><?php } ?>
<?php if (element('meta_keywords', $layout)) { ?><meta name="keywords" content="<?php echo html_escape(element('meta_keywords', $layout)); ?>"><?php } ?>
<?php if (element('meta_author', $layout)) { ?><meta name="author" content="<?php echo html_escape(element('meta_author', $layout)); ?>"><?php } ?>
<?php if (element('favicon', $layout)) { ?><link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" /><?php } ?>
<?php if (element('canonical', $view)) { ?><link rel="canonical" href="<?php echo element('canonical', $view); ?>" /><?php } ?>

<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/reset.css?<?php echo $this->cbconfig->item('browser_cache_version') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/global.css?<?php echo $this->cbconfig->item('browser_cache_version') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/page.css?<?php echo $this->cbconfig->item('browser_cache_version') ?>" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/earlyaccess/nanumgothic.css" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/earlyaccess/jejugothic.css" />
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/style.css?<?php echo $this->cbconfig->item('browser_cache_version') ?>" />
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
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ba-outside-events.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/iscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/basic.sidemenu.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/js.cookie.js'); ?>"></script>
<?php echo $this->managelayout->display_js(); ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/jquery.bxslider.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/plugins/jquery.easing.1.3.js'); ?>"></script>
<!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7419726859237673",
    enable_page_level_ads: true
  });
</script> -->

<script>

$(document).ready(function(){
    // ham 메뉴 움직이는 스크립트
        var move = true;

        function ham_slide(type){
            
            move = !move;
            if(move){
                $('.ham').animate({'right':'-320'} , 800);
                $('.ham >  img').attr('src' , '<?php echo element('layout_skin_url', $layout); ?>/images/ham_btn.png');

            }else{
                if(type=='point')
                    view_mypoint('view_member');
                else if(type=='register')
                    view_register('view_member');
                else 
                    view_mypage('view_member');
                $('.ham').animate({'right':'0'} , 800);
                $('.ham > img').attr('src' , '<?php echo element('layout_skin_url', $layout); ?>/images/ham_btn02.png');
            }
        }
        // ham 의 화살표 이미지 클릭시 ham 메뉴 움직이는 스크립트
            // $('.ham >  img').click(function(){
            //     ham_slide();
            // });

        // 로그인 , 회원 가입 클릭시 ham 메뉴 움직이는 스크립트
            // $('li.login-li').click(function(){
                
            //     ham_slide();
            // });

            // $('li.register-li').click(function(){
            //     ham_slide('register');
            // });


        // 회원정보 클릭시 ham 메뉴 움직이는 스크립트
            // $('li.user_info').click(function(){
                
            //     ham_slide();
            // });

            // $('li.user_point').click(function(){
                
            //     ham_slide('point');
            // });
        

        // 회원탈퇴의 회원탈퇴 클릭시
            $('.good_bye02').click(function(){
                var result = confirm('정말로 회원탈퇴를 하시겠습니까? 탈퇴한 회원정보는 복구할 수 없으므로 신중히 선택하여주세요. 확인을 누르시면 탈퇴가 완료됩니다.');
                if(result){ 
        
                  }
            });

        // var ham_top = parseInt($(".ham").css("top"));  
        //     $(window).scroll(function(){  
        //         var pos = $(window).scrollTop(); // 현재 스크롤바의 위치값을 반환합니다.  
                
        //         $(".ham").stop().animate({"top":pos+ham_top+"px"},500);  
        //     });

    // 로그인 롤링 텍트스   
        var slider_noice = $('.login_noice ul').bxSlider({
        mode:    'vertical',            // 슬라이드의 이동방향 설정 vertical,fade
        speed: 500, // m/s ex > 1000 = 1s
        easing: 'ease-in-out', // 동작 가속도 css와 동일
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

    // 소멸예정 포인트 팝업
        $(".point_info_cont .dis_point > img").click(function(){
            $('.disapp_point').fadeIn();
            $('.disapp_point').css('z-index' ,"200000000");
        });

        $(".disapp_point h2 span img").click(function(){
            $('.disapp_point').fadeOut();
            $('.disapp_point').css('z-index' ,"-200000000");
        });


});
</script>


</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>
<?php if ($this->member->is_member()) { ?>
<div>
<aside class="ham" id="side_menu">
    <div class="side_wr add_side_wr">
        <div id="isroll_wrap" class="side_inner_rel">
    
           <div id="view_member" class="ham_cont02">
           </div>
        </div>
    </div>
</aside>
<?php } ?>
<header>
    <h1>
        <a href="<?php echo site_url(); ?>">
        <img src="<?php echo element('layout_skin_url', $layout); ?>/images/logo.png" alt="logo_img" class="logo_img">
        </a>
    </h1>
    
    <nav class='nomal_font02'>
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
    <div class="head_search">
        <form name="header_search" id="header_search" action="<?php echo site_url('search'); ?>" onSubmit="return headerSearch(this);">
            <input type="search" class="form-control" placeholder="Search" onfocus="this.placeholder=''" onblur="this.placeholder='Search'" name="skeyword" accesskey="s" />
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
                <li class="pointer login-li"   title="로그인"><a href="<?php echo site_url('/login'); ?>" style="color: inherit;">로그인</a></li>
                <li>|</li>
                <li class="pointer register-li"   title="회원가입"><a href="<?php echo site_url('/login/register'); ?>" style="color: inherit;">회원가입</a></li>
                <?php } else { ?>
                <li class="btn_side pointer" id="btn_side1" data-url="/mypage" >
                    <figure>
                        <img src="<?php echo base_url('assets/images/small_spoon_'.$this->member->item('mem_level').'.png');?>" alt="spoon_<?php echo $this->member->item('mem_level') ?>">
                        <figcaption><?php echo $this->member->item('mem_nickname') ?></figcaption>
                    </figure>
                </li>
                <li>|</li>
                <li class="btn_side pointer" id="btn_side2" data-url="/mypage/point"  title="포인트"><?php echo number_format($this->member->item('mem_point')) ?> P</li>
                <li>|</li>
                <li class='btn_side pointer' id="btn_side3" data-url="/mypage" title="회원정보">회원정보</li>
                <li>|</li>
                <li class="pointer" onClick='location.href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url()))?>";'  title="로그아웃">로그아웃</li>
                <?php } ?>
            </ul>
        </div>
    </section>
</aside>




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
    Cookies.set('device_view_type', 'desktop', { expires: 0 });
});
$(document).on('click', '.viewmobileversion', function(){
    Cookies.set('device_view_type', 'mobile', { expires: 0 });
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

function view_mypoint(id) {

    var comment_url = cb_url + '/mypage/point';
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

function view_register(id) {
    
    var comment_url = cb_url + '/login/register' ;
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
