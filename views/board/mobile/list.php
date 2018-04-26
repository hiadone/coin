<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/jquery.bxslider.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/plugins/jquery.easing.1.3.js'); ?>"></script>
<script>
    var postact_flag=false;
    var global_cur_unit='krw';
    var coinActiveTab='tab01_btc';
    setInterval('view_coin(global_cur_unit)',5000);

    $(document).ready(function(){
        // tab01 영역 스크립트
            view_board('view_board','<?php echo element('brd_key', element('board', element('list', $view))) ?>');
            $(".tab01_cont").hide();
            $(".tab01_cont:first").show();

            $("ul.tab01_tabs li").click(function () {
                $("ul.tab01_tabs li").removeClass("active").css("color" , "#333");
                $(this).addClass("active").css({"color": "#1c446d"});
                $(this).addClass("active").css("color", "#1c446d");
                $(".tab01_cont").hide()
                coinActiveTab = $(this).attr("rel");
                $("#" + coinActiveTab).fadeIn()
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

        // // tab08 영역 스크립트
        //     $(".tab08_cont").hide();
        //     $(".tab08_cont:first").show();

        //     $("ul.tab08_tabs li").click(function () {
        //         $("ul.tab08_tabs li").removeClass("active").css("color" , "#333");
        //         $(this).addClass("active").css({"color": "#1c446d"});
        //         $(".tab08_cont").hide()
        //         coinActiveTab = $(this).attr("rel");
        //         $("#" + coinActiveTab).fadeIn();
        //     });

        // // tab09 영역 스크립트
        //     $(".tab09_cont").hide();
        //     $(".tab09_cont:first").show();

        //     $("ul.tab09_tabs li").click(function () {
        //         $("ul.tab09_tabs li").removeClass("active").css("color" , "#333");
        //         $(this).addClass("active").css({"color": "#1c446d"});
        //         $(".tab09_cont").hide()
        //         coinActiveTab = $(this).attr("rel");
        //         $("#" + coinActiveTab).fadeIn();
        //     });
    });
</script>

<article class="wrap01">
    <section class="loing_join">
        <ul class="small_font">
            <?php
            if($this->member->is_member()){
                echo '<li onClick=\'location.href="'.site_url('mypage').'";\'  title="마이페이지">
                <figure><img src="'.base_url('assets/images/spoon_'.$this->member->item('mem_level').'.png').'" alt="spoon"><figcaption>'.$this->member->item('mem_nickname').
                '</figcaption></figure></li>';
                echo '<li>|</li>';
                echo '<li>포인트 1000P</li>';
                echo '<li>|</li>';
                 echo '<li onClick=\'location.href="'.site_url('mypage').'";\'>회원정보</li>';
                 echo '<li>|</li>';
                 echo '<li onClick=\'location.href="'.site_url('login/logout?url=' . urlencode(current_full_url())).'";\'  title="로그아웃">로그아웃</li>';
            } else {

                echo '<li onClick=\'location.href="'.site_url('login?url=' . urlencode(current_full_url())).'";\'  title="로그인" style="width:32%;">로 그 인</li>';
                echo '<li>|</li>';
                echo '<li style="width:32%;" onClick=\'location.href="'.site_url('login/register').'";\'  title="회원가입" >회 원 가 입</li>';
                echo '<li>|</li>';
                echo '<li onClick=\'location.href="'.site_url('/board/event').'";\'  title="스토어" style="width:32%;">스 토 어</li>';
            }
            ?>
        </ul>
    </section>

    <!-- rolling_news 영역-->
        <section class="rolling_news">
            <ul class="big_font">
                <?php

                $board='';
                $config = array(
                    'brd_key' => 'live_news',
                    'limit' => 5,
                    'length' => 40,
                    'headline' => 1,
                    );
                $board=$this->board->data($config);

                if (element('latest', element('view', $board))) {
                    foreach (element('latest', element('view', $board)) as $key => $value) {?>
                    <li><a style="display:inline-block;" href="<?php echo element('url', $value); ?>" title="<?php echo html_escape(element('title', $value)); ?>" class="middle_font"><?php echo sprintf("%02d",($key+1)) ?>. <?php echo html_escape(element('title', $value)); ?></a></li> 
                    <?php 
                    }
                }
                ?>
            </ul> 
        </section>

    <!-- tab01 영역 -->
        <section class="tab01 middle_font">
            <ul class="tab01_tabs tabs ">
                <li class="active" rel="tab01_btc">BTC</li>
                <li rel="tab01_eth">ETH</li>
                <li rel="tab01_dash">DASH</li>
                <li rel="tab01_xrp">XRP</li>
                <li rel="tab01_ltc">LTC</li>
                <li rel="tab01_etc">ETC</li>
                <li rel="tab01_bch">BCH</li>
                <li rel="tab01_xmr">XMR</li>
                <li rel="tab01_zec">ZEC</li>
                <li rel="tab01_qtum">QTUM</li>
                <li rel="tab01_btg">BTG</li>
            </ul>

            <table>
                <tr>
                    <th>거래소별</th>
                    <th>
                        <select name="cur_unit" id="cur_unit" onchange="view_coin(this.value);">
                            <option value="krw">원화 (KRW)</option>
                            <option value ="usd">달러 (USD)</option>
                        </select>
                    </th>
                    <th>변동률</th>
                    <th>프리미엄</th>
                </tr>
            </table>

            <div class="tab01_wrap cont_wrap" id="coin_data">
                <?php 
                if (element('view_coin', $view)) { 
                    echo element('view_coin', $view);
                }
                ?>
            </div>
        </section>

        <button class="btn_up">
            ▲ 접 기
        </button>

    <!-- tab06 영역--> 
        <section class="tab06 wrap middle_font" style="border-bottom:0;">
            <ul class="tab06_tabs tabs">
                <?php 
                if (element('board_list', $view)) {
                    $bcount=count(element('board_list', $view));
                    $tab06=array();

                    foreach (element('board_list', $view) as $key => $board) {
                        $active='';
                        $param='';

                        if(element('brd_key', element('board', element('list', $view)))===element('brd_key',$board) && element('post_notice', element('board', element('list', $view)),0)===element('post_notice',$board,0)) {
                            
                            $active='active';
                        }


                        array_push($tab06,element('brd_key',$board));
                        


                        if(!empty(element('post_notice',$board))) $param = '?post_notice='.element('post_notice',$board);
                        echo '<li class="'.$active.'" style="width: '.(100/$bcount).'%;"><a href="'.board_url(element('brd_key',$board)).$param.'">'.element('board_name',$board).'</a></li>';
                    }
                }
                 ?>
            </ul>
            
            <div class="" id="view_board">

            </div>
        </section>
</article>

<script type="text/javascript">
    //<![CDATA[
    function view_board(id,brd_key) {
        if(brd_key=='w-1' || brd_key=='w-2' || brd_key=='w-3'){
            $.ajax({
            type: "GET", 
            async: true,
            data: "pageid=08yE&lang=utf-8&out=json", 
            url: "https://ssl-hiadone.ad4989.co.kr/cgi-bin/pelicanc.dll?impr", 
            cache: false, 
            dataType: "jsonp", 
            jsonp: "jquerycallback", 
            success: function(data) 
            {
<<<<<<< Updated upstream
              $("#" +id).html('<div class="tab09_cont cont" ><ul>'+data.tag+'</ul></div>'); 
=======
              $("#" +id).html('<div class="tab09_cont cont" >'+data.tag+'</div>'); 
>>>>>>> Stashed changes
            },
            error: function(xhr, status, error) { ; } 
            });
        } else {
            var list_url = cb_url + '/group/view_board/' + brd_key+'/0/<?php echo $this->input->get('post_notice')?>';
            $('#' + id).load(list_url,'',function(){
            });
        }
    }   

    function view_coin(cur_unit) {
        global_cur_unit = cur_unit;
        var list_url = cb_url + '/main/show_coin_data/' + global_cur_unit;
        $('#coin_data').load(list_url,function(){
            $("#" + coinActiveTab).hide();
            $("#" + coinActiveTab).fadeIn();
        });   
    }
    //]]>
</script>

<!-- <?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<?php echo element('headercontent', element('board', element('list', $view))); ?>

<div class="board">
    <h3><?php echo html_escape(element('board_name', element('board', element('list', $view)))); ?></h3>
    <div class="table-top">
        <?php if ( ! element('access_list', element('board', element('list', $view))) && element('use_rss_feed', element('board', element('list', $view)))) { ?>
            <a href="<?php echo rss_url(element('brd_key', element('board', element('list', $view)))); ?>" class="btn btn-default btn-sm" title="<?php echo html_escape(element('board_name', element('board', element('list', $view)))); ?> RSS 보기"><i class="fa fa-rss"></i></a>
        <?php } ?>

        <select class="input" onchange="location.href='<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape($this->input->get('categroy_id')); ?>&amp;findex=' + this.value;">
            <option value="">정렬하기</option>
            <option value="post_datetime desc" <?php echo $this->input->get('findex') === 'post_datetime desc' ? 'selected="selected"' : '';?>>날짜순</option>
            <option value="post_hit desc" <?php echo $this->input->get('findex') === 'post_hit desc' ? 'selected="selected"' : '';?>>조회수</option>
            <option value="post_comment_count desc" <?php echo $this->input->get('findex') === 'post_comment_count desc' ? 'selected="selected"' : '';?>>댓글수</option>
            <?php if (element('use_post_like', element('board', element('list', $view)))) { ?>
                <option value="post_like desc" <?php echo $this->input->get('findex') === 'post_like desc' ? 'selected="selected"' : '';?>>추천순</option>
            <?php } ?>
        </select>
        <?php if (element('use_category', element('board', element('list', $view))) && ! element('cat_display_style', element('board', element('list', $view)))) { ?>
            <select class="input" onchange="location.href='<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=' + this.value;">
                <option value="">카테고리선택</option>
                <?php
                $category = element('category', element('board', element('list', $view)));
                function ca_select($p = '', $category = '', $category_id = '') {
                    $return = '';
                    if ($p && is_array($p)) {
                        foreach ($p as $result) {
                            $exp = explode('.', element('bca_key', $result));
                            $len = (element(1, $exp)) ? strlen(element(1, $exp)) : '0';
                            $space = str_repeat('-', $len);
                            $return .= '<option value="' . html_escape(element('bca_key', $result)) . '"';
                            if (element('bca_key', $result) === $category_id) {
                                $return .= 'selected="selected"';
                            }
                            $return .= '>' . $space . html_escape(element('bca_value', $result)) . '</option>';
                            $parent = element('bca_key', $result);
                            $return .= ca_select(element($parent, $category), $category, $category_id);
                        }
                    }
                    return $return;
                }

                echo ca_select(element(0, $category), $category, $this->input->get('category_id'));
                ?>
            </select>
        <?php } ?>
        <div class="col-md-6">
            <div class=" searchbox">
                <form class="navbar-form navbar-right pull-right" action="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>" onSubmit="return postSearch(this);">
                    <input type="hidden" name="findex" value="<?php echo html_escape($this->input->get('findex')); ?>" />
                    <input type="hidden" name="category_id" value="<?php echo html_escape($this->input->get('category_id')); ?>" />
                    <div class="form-group">
                        <select class="input" name="sfield">
                            <option value="post_both" <?php echo ($this->input->get('sfield') === 'post_both') ? ' selected="selected" ' : ''; ?>>제목+내용</option>
                            <option value="post_title" <?php echo ($this->input->get('sfield') === 'post_title') ? ' selected="selected" ' : ''; ?>>제목</option>
                            <option value="post_content" <?php echo ($this->input->get('sfield') === 'post_content') ? ' selected="selected" ' : ''; ?>>내용</option>
                            <option value="post_nickname" <?php echo ($this->input->get('sfield') === 'post_nickname') ? ' selected="selected" ' : ''; ?>>회원명</option>
                            <option value="post_userid" <?php echo ($this->input->get('sfield') === 'post_userid') ? ' selected="selected" ' : ''; ?>>회원아이디</option>
                        </select>
                        <input type="text" class="input px100" placeholder="Search" name="skeyword" value="<?php echo html_escape($this->input->get('skeyword')); ?>" />
                        <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="searchbuttonbox">
                <button class="btn btn-primary btn-sm pull-right" type="button" onClick="toggleSearchbox();"><i class="fa fa-search"></i></button>
            </div>
            <?php if (element('point_info', element('list', $view))) { ?>
                <div class="point-info pull-right mr10">
                    <button type="button" class="btn-point-info" ><i class="fa fa-info-circle"></i></button>
                    <div class="point-info-content alert alert-warning"><strong>포인트안내</strong><br /><?php echo element('point_info', element('list', $view)); ?></div>
                </div>
            <?php } ?>
        </div>
        <script type="text/javascript">
        //<![CDATA[
        function postSearch(f) {
            var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
            if (skeyword.length < 2) {
                alert('2글자 이상으로 검색해 주세요');
                f.skeyword.focus();
                return false;
            }
            return true;
        }
        function toggleSearchbox() {
            $('.searchbox').show();
            $('.searchbuttonbox').hide();
        }
        <?php
            if ($this->input->get('skeyword')) {
                echo 'toggleSearchbox();';
            }
        ?>
        $(document).on('click', '.btn-point-info', function() {
            $('.point-info-content').toggle();
        });
        //]]>
        </script>
    </div>

    <?php
    if (element('use_category', element('board', element('list', $view))) && element('cat_display_style', element('board', element('list', $view))) === 'tab') {
        $category = element('category', element('board', element('list', $view)));
    ?>
        <ul class="nav nav-tabs clearfix">
            <li role="presentation" <?php if ( ! $this->input->get('category_id')) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=">전체</a></li>
            <?php
            if (element(0, $category)) {
                foreach (element(0, $category) as $ckey => $cval) {
            ?>
                <li role="presentation" <?php if ($this->input->get('category_id') === element('bca_key', $cval)) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=<?php echo element('bca_key', $cval); ?>"><?php echo html_escape(element('bca_value', $cval)); ?></a></li>
            <?php
                }
            }
            ?>
        </ul>
    <?php } ?>

    <?php
    $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
    echo form_open('', $attributes);
    ?>
        <table class="table">
            <thead>
                <tr>
                    <?php if (element('is_admin', $view)) { ?><th><input onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /></th><?php } ?>
                    <th>번호</th>
                    <th>제목</th>
                    <th>글쓴이</th>
                    <th>날짜</th>
                    <th>조회수</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (element('notice_list', element('list', $view))) {
                foreach (element('notice_list', element('list', $view)) as $result) {
            ?>
                <tr>
                    <?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
                    <td><span class="label label-primary">공지</span></td>
                    <td>
                        <?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
                        <a href="<?php echo element('post_url', $result); ?>" style="
                            <?php
                            if (element('title_color', $result)) {
                                echo 'color:' . element('title_color', $result) . ';';
                            }
                            if (element('title_font', $result)) {
                                echo 'font-family:' . element('title_font', $result) . ';';
                            }
                            if (element('title_bold', $result)) {
                                echo 'font-weight:bold;';
                            }
                            if (element('post_id', element('post', $view)) === element('post_id', $result)) {
                                echo 'font-weight:bold;';
                            }
                            ?>
                        " title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?></a>
                        <?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
                        <?php if (element('post_file', $result)) { ?><span class="fa fa-download"></span><?php } ?>
                        <?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
                        <?php    if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>
                        <?php if (element('post_comment_count', $result)) { ?><span class="label label-warning">+<?php echo element('post_comment_count', $result); ?></span><?php } ?>
                    <td><?php echo element('display_name', $result); ?></td>
                    <td><?php echo element('display_datetime', $result); ?></td>
                    <td><?php echo number_format(element('post_hit', $result)); ?></td>
                </tr>
            <?php
                }
            }
            if (element('list', element('data', element('list', $view)))) {
                foreach (element('list', element('data', element('list', $view))) as $result) {
            ?>
                <tr>
                    <?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
                    <td><?php echo element('num', $result); ?></td>
                    <td>
                        <?php if (element('category', $result)) { ?><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $result))); ?>"><span class="label label-default"><?php echo html_escape(element('bca_value', element('category', $result))); ?></span></a><?php } ?>
                        <?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
                        <a href="<?php echo element('post_url', $result); ?>" style="
                        <?php
                        if (element('title_color', $result)) {
                            echo 'color:' . element('title_color', $result) . ';';
                        }
                        if (element('title_font', $result)) {
                            echo 'font-family:' . element('title_font', $result) . ';';
                        }
                        if (element('title_bold', $result)) {
                            echo 'font-weight:bold;';
                        }
                        if (element('post_id', element('post', $view)) === element('post_id', $result)) {
                            echo 'font-weight:bold;';
                        }
                        ?>
                        " title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?></a>
                        <?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
                        <?php if (element('post_file', $result)) { ?><span class="fa fa-download"></span><?php } ?>
                        <?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
                        <?php if (element('is_hot', $result)) { ?><span class="label label-danger">Hot</span><?php } ?>
                        <?php if (element('is_new', $result)) { ?><span class="label label-warning">New</span><?php } ?>
                        <?php    if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>
                        <?php if (element('post_comment_count', $result)) { ?><span class="label label-warning">+<?php echo element('post_comment_count', $result); ?></span><?php } ?>
                    <td><?php echo element('display_name', $result); ?></td>
                    <td><?php echo element('display_datetime', $result); ?></td>
                    <td><?php echo number_format(element('post_hit', $result)); ?></td>
                </tr>
            <?php
                }
            }
            if ( ! element('notice_list', element('list', $view)) && ! element('list', element('data', element('list', $view)))) {
            ?>
                <tr>
                    <td colspan="6" class="nopost">게시물이 없습니다</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php echo form_close(); ?>

    <div class="table-bottom mt20">
        <div class="pull-left mr20">
            <a href="<?php echo element('list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">목록</a>
            <?php if (element('search_list_url', element('list', $view))) { ?>
                <a href="<?php echo element('search_list_url', element('list', $view)); ?>" class="btn btn-default btn-sm">검색목록</a>
            <?php } ?>
        </div>
        <?php if (element('is_admin', $view)) { ?>
            <div class="pull-left">
                <button type="button" class="btn btn-default btn-sm admin-manage-list"><i class="fa fa-cog big-fa"></i>관리</button>
                <div class="btn-admin-manage-layer admin-manage-layer-list">
                <?php if (element('is_admin', $view) === 'super') { ?>
                    <div class="item" onClick="document.location.href='<?php echo admin_url('board/boards/write/' . element('brd_id', element('board', element('list', $view)))); ?>';"><i class="fa fa-cog"></i> 게시판설정</div>
                    <div class="item" onClick="post_multi_copy('copy');"><i class="fa fa-files-o"></i> 복사하기</div>
                    <div class="item" onClick="post_multi_copy('move');"><i class="fa fa-arrow-right"></i> 이동하기</div>
                    <div class="item" onClick="post_multi_change_category();"><i class="fa fa-tags"></i> 카테고리변경</div>
                <?php } ?>
                    <div class="item" onClick="post_multi_action('multi_delete', '0', '선택하신 글들을 완전삭제하시겠습니까?');"><i class="fa fa-trash-o"></i> 선택삭제하기</div>
                    <div class="item" onClick="post_multi_action('post_multi_secret', '0', '선택하신 글들을 비밀글을 해제하시겠습니까?');"><i class="fa fa-unlock"></i> 비밀글해제</div>
                    <div class="item" onClick="post_multi_action('post_multi_secret', '1', '선택하신 글들을 비밀글로 설정하시겠습니까?');"><i class="fa fa-lock"></i> 비밀글로</div>
                    <div class="item" onClick="post_multi_action('post_multi_notice', '0', '선택하신 글들을 공지를 내리시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지내림</div>
                    <div class="item" onClick="post_multi_action('post_multi_notice', '1', '선택하신 글들을 공지로 등록 하시겠습니까?');"><i class="fa fa-bullhorn"></i> 공지올림</div>
                    <div class="item" onClick="post_multi_action('post_multi_blame_blind', '0', '선택하신 글들을 블라인드 해제 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드해제</div>
                    <div class="item" onClick="post_multi_action('post_multi_blame_blind', '1', '선택하신 글들을 블라인드 처리 하시겠습니까?');"><i class="fa fa-exclamation-circle"></i> 블라인드처리</div>
                    <div class="item" onClick="post_multi_action('post_multi_trash', '', '선택하신 글들을 휴지통으로 이동하시겠습니까?');"><i class="fa fa-trash"></i> 휴지통으로</div>
                </div>
            </div>
        <?php } ?>
        <?php if (element('write_url', element('list', $view))) { ?>
            <div class="pull-right">
                <a href="<?php echo element('write_url', element('list', $view)); ?>" class="btn btn-success btn-sm">글쓰기</a>
            </div>
        <?php } ?>
    </div>
    <nav><?php echo element('paging', element('list', $view)); ?></nav>
</div>

<?php echo element('footercontent', element('board', element('list', $view))); ?>

<?php
if (element('highlight_keyword', element('list', $view))) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>
 -->