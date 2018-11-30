<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
       
    });
</script> 

</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>

    <header>
        <h1>
            <a href="<?php echo site_url()?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/logo.png" alt="logo"></a>
        </h1>
        <div>
            <?php 
            if($this->member->is_member()) 
                echo '<a href="'.base_url('/mypage').'"><img src="'.element('layout_skin_url', $layout).'/images/icon_user_config.png" alt="회원정보" style="width:35px;">';
            else 
                echo '<a href="'.base_url('/login').'"><img src="'.element('layout_skin_url', $layout).'/images/icon_03.png" alt="회원정보">';
             ?>
        </div>
        <div><a href="<?php echo base_url('/search') ?>"><img src="<?php echo element('layout_skin_url', $layout); ?>/images/icon_05.png" alt="검색"></a></div>
    </header>   
    
   
    <!-- main start -->
    
    <div class="main">
        <div>

                <!-- 본문 시작 -->
                <?php if (isset($yield))echo $yield; ?>
                <!-- 본문 끝 -->

        </div>
    </div>
    <!-- main end -->
    
    <!-- footer start -->
    <?php //echo $this->managelayout->display_footer('mobile'); ?>
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


<!-- <script>
    
    var swiper = new Swiper('.swiper-container', {
      initialSlide :1,
      runCallbacksOnInit : false,
      
    });

    swiper.on('slideChange', function () {

            location.href='/';

            
    });
  </script> -->