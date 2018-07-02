<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <meta name="naver-site-verification" content="198e8e28067f3f38761488506290231146288364"/> -->
<meta name="google-site-verification" content="6FfNGOyp00RKYp_kGK_GrIRzIJn6KM3jEqVCoJ_sEIE" />
<meta name="naver-site-verification" content="198e8e28067f3f38761488506290231146288364"/>
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
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/renew.css?<?php echo $this->cbconfig->item('browser_cache_version') ?>" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/earlyaccess/nanumgothic.css" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/earlyaccess/jejugothic.css" />
<link rel="stylesheet" type="text/css" href="<?php echo element('layout_skin_url', $layout); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/earlyaccess/nanumgothic.css" />
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/swiper.min.css'); ?>" />


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
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.extension.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/sideview.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.hoverIntent.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ba-outside-events.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/iscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/mobile.sidemenu.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/js.cookie.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/swiper.min.js'); ?>"></script>
<?php echo $this->managelayout->display_js(); ?>
<!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-7419726859237673",
    enable_page_level_ads: true
  });
</script> -->

<script>
    $(document).ready(function(){
        $(window).scroll(function() { 
        if ($(this).scrollTop() > 500) { //250 넘으면 버튼이 보여짐니다. 
            $('.back_top_m').fadeIn(); } else { $('.back_top_m').fadeOut(); } 
        });

        
    });
</script> 

</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>

    <header>
        <h1>
            <a href="<?php echo site_url()?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/logo.png" alt="logo"></a>
        </h1>
        <div><a href="<?php echo base_url('/mypage') ?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/icon_03.png" alt="회원정보"></a></div>
        <div><a href="<?php echo base_url('/search') ?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/icon_05.png" alt="검색"></a></div>
    </header>   
    
    <nav class='main_nav_m'>
        <ul>
            <?php
            $menuhtml = '';
            $active_key = '';
            if (element('menu', $layout)) {
                $menu = element('menu', $layout);
                $menu_keys=array_keys(element(0, $menu));
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
                            $active='';
                            
                            if(element('men_id',$mval) === element(0,element('active',$menu))) {
                                $active='selectMenu';
                                $active_key = $mkey;
                            }
                            $menuhtml .= '<li class="'.$active.'" ><a href="' . $mlink . '" ' . element('men_custom', $mval);
                            if (element('men_target', $mval)) {
                                $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                            }
                            $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';

                            $menuhtml .= "\n";
                        // }
                    }
                }
            }
            echo $menuhtml;



            if($active_key){
                $i = array_search($active_key, $menu_keys);

                if($i===0)
                    $prev_key = array_pop($menu_keys);
                else 
                    $prev_key = $menu_keys[$i - 1];

                if($i+1 === count($menu_keys))
                    $next_key = array_shift($menu_keys);
                else 
                    $next_key = $menu_keys[$i+1];

                $prev_men_link = element('men_link',element($prev_key,element(0, $menu)));
                $next_men_link = element('men_link',element($next_key,element(0, $menu)));
            } else {
                $prev_men_link = '/';
                $next_men_link = '/';
            }
            ?>
           
        </ul>
    </nav>
    <!-- main start -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" data-location-url="<?php echo $prev_men_link?>"></div>
            <div class="main swiper-slide">
                <div>

                        <!-- 본문 시작 -->
                        <?php if (isset($yield))echo $yield; ?>
                        <!-- 본문 끝 -->

                </div>
            </div>
             <div class="swiper-slide" data-location-url="<?php echo $next_men_link?>"></div>
             
        </div>
    </div>

    <aside class="back_top_m" style="display:none;">
    <div><img src="<?php echo element('layout_skin_url', $layout); ?>/images/backtop_03.png" alt="맨위로"></div>
    </aside>
    <!-- main end -->
    
    <!-- footer start -->
    <?php echo $this->managelayout->display_footer('mobile'); ?>
    <!-- footer end -->

<script type="text/javascript">
$(document).on('click', '.viewpcversion', function(){
    Cookies.set('device_view_type', 'desktop', { expires: 0 });
});
$(document).on('click', '.viewmobileversion', function(){
    Cookies.set('device_view_type', 'mobile', { expires: 0 });
});

$('.back_top_m').click(function(){

            $('html, body').animate({
                scrollTop: $('html, body').offset().top
            }, 500);
});

</script>
<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>
</body>
</html>


<script>
    
    var swiper = new Swiper('.swiper-container', {
      initialSlide :1,
      runCallbacksOnInit : false,
      touchAngle:35,
      
    });

    swiper.on('slideChange', function () {
        if(swiper.activeIndex < 1)
            location.href='<?php echo $prev_men_link?>';
        else if(swiper.activeIndex > 1)
            location.href='<?php echo $next_men_link?>';
            
    });
  </script>