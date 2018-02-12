<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo html_escape(element('page_title', $layout)); ?></title>
<?php if (element('meta_description', $layout)) { ?><meta name="description" content="<?php echo html_escape(element('meta_description', $layout)); ?>"><?php } ?>
<?php if (element('meta_keywords', $layout)) { ?><meta name="keywords" content="<?php echo html_escape(element('meta_keywords', $layout)); ?>"><?php } ?>
<?php if (element('meta_author', $layout)) { ?><meta name="author" content="<?php echo html_escape(element('meta_author', $layout)); ?>"><?php } ?>
<?php if (element('favicon', $layout)) { ?><link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" /><?php } ?>
<?php if (element('canonical', $view)) { ?><link rel="canonical" href="<?php echo element('canonical', $view); ?>" /><?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/import.css?'.$this->cbconfig->item('browser_cache_version')) ?>" />
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
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.extension.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/sideview.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.hoverIntent.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ba-outside-events.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/iscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/mobile.sidemenu.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/js.cookie.js'); ?>"></script>
<?php echo $this->managelayout->display_js(); ?>

<script>
    $(document).ready(function(){
        // ham 클릭시 ham_menu 이동 스크립트(메뉴 보여주기)
            $('header span:first-child img').click(function(){
                 $('.cover_menu').css({'z-index':'200'});
                $('.cover_menu .cover').animate({'opacity' : '0.5'} , 500);
                $('.cover_menu .ham_cont').animate({'left' : '0'} , 700);
                // $('html, body').css({'overflow': 'hidden', 'height': '100%'}); // 모달팝업 중 html,body의 scroll을 hidden시킴
                // $("html, body").bind('scroll  mousewheel', function(e){e.preventDefault();e.stopPropagation();return false;});                
            });

        // ham 메뉴의 X버튼 클릭시 ham_menu이동 스크립트(메뉴 숨기기)
            $('.ham_cont > img').click(function(){
                $('.cover_menu .cover').animate({'opacity' : '0'} , 500);
                $('.cover_menu .ham_cont').animate({'left' : '-85%'} , 700);
                // $('html, body').css({'overflow': 'auto', 'height': '100%'}); //scroll hidden 해제
                $("html, body").unbind('scroll  mousewheel');
                setTimeout(function(){
                    $('.cover_menu').css({'z-index':'-100'});
                    // $('.ham_cont ul').css({'display' : 'block'});
                },700);     
            });

        // ham 메뉴의 대메뉴 접기 펴기 스크립트
            $('.ham_cont ol > li').click(function(){

                $(this).children('ul').slideToggle();
                if($(this).children('span').html()=='▼'){
                    $(this).children('span').html('▲');
                }else{
                    $(this).children('span').html('▼');
                }                   
            });

        // ham 메뉴의 로그인 시 회원 닉네임 영역 높이값 스크립트
            var hei = $('.ham_cont div table figure img').height();
            $('.ham_cont div table figcaption').css('height' , hei);
            $('.ham_cont div table a').css('line-height' , hei -2 + "px");

        // find 클릭시 검색영역 이동 스크립트
            var hei = $('header').height();
            $('.cover_menu02').css('height' , hei);

            $('header span:nth-child(3) img').click(function(){
                $('.cover_menu02').css({'z-index':'200'});
                $('.find_area').animate({'right' : '0'} , 700);
                $('.find_area').css('height' ,hei+5);
                $('.find_area').css('z-index' ,500);
            }); 

        // find 의 X버튼 클릭시
            $('.find_area > img').click(function(){
                $('.find_area').animate({'right' : '-100%'} , 700);
                // $('html, body').css({'overflow': 'auto', 'height': '100%'}); //scroll hidden 해제
                $("html, body").unbind('scroll  mousewheel');
                setTimeout(function(){
                    $('.cover_menu02').css({'z-index':'-100'});
                },700);     
            }); 
    });
</script> 

</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>
    <article class="cover_menu">
        <section class="cover">
        </section>

        <!-- ham_menu 의 내용-->
            <section class="ham_cont">
                <!-- ham메뉴의 X버튼 -->
                    <img src="<?php echo site_url('/assets/images/clear.png')?>" alr="clear">
                    <div>
                        <!-- <table>
                            <?php if ($this->member->is_member()) { ?>
                                <tr>
                                    <th colspan="3" class="big_font"><a  href="<?php echo site_url('mypage'); ?>"><?php echo $this->member->item('mem_nickname') ?>님 안녕하세요 </a><button type="button" class="btn-sm small_font" title="로그아웃" onclick="location.href='<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>';"><i class="fa fa-sign-out"></i> 로그아웃</button></th>
                                </tr>
                                
                            <?php } else { ?>
                                <tr>
                                    <th colspan="3" class="small_font">SNS 아이디로 로그인 하세요.</th>
                                </tr>
                                <tr>
                                    <td><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" class="" title="로그인"><img src="<?php echo site_url('/assets/images/naver.png')?>" alt="naver"></a></td>
                                    <td><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" class="" title="로그인"><img src="<?php echo site_url('/assets/images/kakao.png')?>" alt="kakao"></a></td>
                                    <td><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" class="" title="로그인"><img src="<?php echo site_url('/assets/images/face.png')?>" alt="facebook"></a></td>
                                </tr>
                            <?php } ?>
                        </table> -->

                        
                        <?php if (!$this->member->is_member()) { ?>
                        <p class="small_font">SNS 아이디로 로그인 하세요.</p>
                        <ul>
                            <li style="background: url('assets/images/naver_bg.png') no-repeat center; background-size: 100%;">
                                <a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>">
                                   <figure>
                                       <figcaption class="small_font">
                                           네 이 버
                                       </figcaption>
                                   </figure>
                                </a>
                            </li>

                            <li style="background: url('assets/images/kakao_bg.png') no-repeat center; background-size: 100%;">
                                <a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>">
                                   <figure>
                                       <figcaption class="small_font" style="color: #3c2324;">
                                           카카오톡
                                       </figcaption>
                                   </figure>
                                </a>
                            </li>

                            <li style="background: url('assets/images/face_bg.png') no-repeat center; background-size: 100%;">
                                <a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>">
                                   <figure>
                                       <figcaption class="small_font">
                                           페이스북
                                       </figcaption>
                                   </figure>
                                </a>
                            </li>
                        </ul>
                        <?php } else { ?>
                            <table>
                                <tr>
                                    <th colspan="3" class="big_font" >



                                    <figure>
                                        <img src="<?php echo base_url('assets/images/gold_spoon.png') ?>" alt="gold_spoon">
                                        <figcaption>
                                            <a style="color:#fff; " href="<?php echo site_url('mypage'); ?>"><?php echo $this->member->item('mem_nickname') ?>님 안녕하세요 </a>
                                        </figcaption>
                                    </figure>
                                    






                                    <button type="button" class="btn-sm small_font" title="로그아웃" onclick="location.href='<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>';">
                                    <i class="fa fa-sign-out"></i>
                                    로그아웃
                                    </button>




                                    </th>
                                </tr>
                            </table>
                        <?php } ?>
                        <ol >
                            <?php
                            $menuhtml = '';
                            if (element('menu', $layout)) {
                                $menu = element('menu', $layout);
                                if (element(0, $menu)) {
                                    foreach (element(0, $menu) as $mkey => $mval) {
                                        if (element(element('men_id', $mval), $menu)) {
                                            $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                                            $menuhtml .= '<li>
                                            <a style="color:#fff;" href="' . $mlink . '" ' . element('men_custom', $mval);
                                            if (element('men_target', $mval)) {
                                                $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                                            }
                                            $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a><span>▲</span>
                                            <ul class="' . $mkey . '">';

                                            foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
                                                $menuhtml .= '<li class="middle_font" onClick="javascript:event.stopPropagation();"><a style="display:inline-block;" href="' . element('men_link', $sval) . '" ' . element('men_custom', $sval);
                                                if (element('men_target', $sval)) {
                                                    $menuhtml .= ' target="' . element('men_target', $sval) . '"';
                                                }
                                                $menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
                                            }
                                            $menuhtml .= '</ul></li>';

                                        } else {
                                            $mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
                                            $menuhtml .= '<li><a style="color:#fff;display:inline-block;" href="' . $mlink . '" ' . element('men_custom', $mval);
                                            if (element('men_target', $mval)) {
                                                $menuhtml .= ' target="' . element('men_target', $mval) . '"';
                                            }
                                            $menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
                                        }
                                    }
                                }
                            }
                            echo $menuhtml;
                            ?>
                        </ol>
                    </div>
            </section>
    </article>

    <article class="cover_menu02">
        <!-- find 영역 -->
            <section class="find_area">
                <form action="<?php echo base_url('/search'); ?>" onSubmit="return headerSearch(this);">
                <input type="hidden" name="sfield" value="post_both">
                   <input name="skeyword" placeholder="사이트 통합검색" onfocus="this.placeholder=''" onblur="this.placeholder='사이트 통합검색'" >
                   <button type="submit" class="middle_font">검색</button>
                </form>
                <img src="<?php echo base_url('/assets/images/clear03.png') ?>" alt="clear">

            </section>
            <script type="text/javascript">
            //<![CDATA[
           
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
    </article>
    <header>
            <span>
                <img src="<?php echo site_url('/assets//images/ham.png')?> " alt="ham">
            </span>
            <h1>
                <a href="<?php echo site_url(); ?>" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>"><img src="<?php echo site_url('/assets/images/logo.png')?>" alt="logo"></a>
            </h1>
            <span>
                <img src="<?php echo site_url('/assets/images/find.png')?>" alt="find">
            </span>
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
    <?php echo $this->managelayout->display_footer(); ?>
    <!-- footer end -->

<script type="text/javascript">
$(document).on('click', '.viewpcversion', function(){
    Cookies.set('device_view_type', 'desktop', { expires: 1 });
});
$(document).on('click', '.viewmobileversion', function(){
    Cookies.set('device_view_type', 'mobile', { expires: 1 });
});
</script>
<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>
</body>
</html>


