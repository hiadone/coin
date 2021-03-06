<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
            <?php
            /*
            echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
            echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
            echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
            $attributes = array('class' => 'form-horizontal', 'name' => 'flogin', 'id' => 'flogin');
            echo form_open(current_full_url(), $attributes);
            ?>
                <input type="hidden" name="url" value="<?php echo html_escape($this->input->get_post('url')); ?>" />
                <ol class="loginform">
                    <li>
                        <span><?php echo element('userid_label_text', $view);?></span>
                        <input type="text" name="mem_userid" class="input" value="<?php echo set_value('mem_userid'); ?>" accesskey="L" />
                    </li>
                    <li>
                        <span>비밀번호</span>
                        <input type="password" class="input" name="mem_password" />
                    </li>
                    <li>
                        <span></span>
                        <button type="submit" class="btn btn-primary btn-sm">회원가입</button>
                        <label for="autologin">
                            <input type="checkbox" name="autologin" id="autologin" value="1" /> 자동회원가입
                        </label>
                    </li>
                </ol>
                <div class="alert alert-dismissible alert-info autologinalert" style="display:none;">
                    자동회원가입 기능을 사용하시면, 브라우저를 닫더라도 회원가입이 계속 유지될 수 있습니다. 자동로그이 기능을 사용할 경우 다음 접속부터는 회원가입할 필요가 없습니다. 단, 공공장소에서 이용 시 개인정보가 유출될 수 있으니 꼭 로그아웃을 해주세요.
                </div>
            <?php echo form_close(); 
            */
            ?>
            <?php
            if ($this->cbconfig->item('use_sociallogin')) {
                $this->managelayout->add_js(base_url('assets/js/social_login.js'));

            if ($this->cbconfig->item('use_selfcert') && ($this->cbconfig->item('use_selfcert_phone') OR $this->cbconfig->item('use_selfcert_ipin'))) {
                    $this->managelayout->add_js(base_url('assets/js/member_selfcert.js'));
                }

            ?>
            <section class="login">
                <div>
                    <h2>SNS 회원가입</h2>
                    <!-- div>
                        <h2 class='big_font'>SNS 회원가입</h2>
                        <p class='small_font'>
                            - 비트이슈에서는 SNS로 회원가입하여 <br>
                              간편하게 서비스를 이용하실 수 있습니다.
                        </p>
                        <br>

                        <p class='small_font' style='font-weight: bold;'>
                          회원 가입 시 본인 인증 절차가 진행됩니다.  
                        </p>
                        <br>

                        <p class='small_font'>
                            - 원하시는 SNS를 선택해 주세요.<br><br>
                        </p>

                        <strong>
                            회원 가입 시 추천인의 닉네임을<br> 
                            입력하면 가입고객 전원 500P 적립
                        </strong>

                        <button type="button" onClick="location.href='<?php echo site_url('/event/event_register') ?>';">이 벤 트 바 로 가 기</button>

                        <br><br>
                        
                        <span class='small_font'>
                            <a href="<?php echo document_url('provision')?>" title="이용약관및개인정보취급방침">
                            회원가입과 함께 비트이슈의 이용약관 및<br> 
                            개인정보취급방침에 동의하신 것으로 간주합니다.
                            </a>
                        </span>
                    </div> -->
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite2', 'id' => 'fwrite2');
                    echo form_open('', $attributes);
                    ?>
                        <input type="hidden" name="socialtype" id="socialtype" value="">
                        <input type="hidden" name="selfcert_type" id="selfcert_type" value="" />
                    <ul>
                        <?php if ($this->cbconfig->item('use_sociallogin_kakao')) {?>
                            <li class="kakao_login">
                                <a href="javascript:;" onClick="social_register('kakao');" title="카카오 회원가입">
                                <figure>
                                    <img src="<?php echo base_url('/assets/images/kakao.png');?>" alt="kakao">
                                    <figcaption class="big_font" >
                                        카카오톡 회원가입
                                    </figcaption>
                                </figure>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->cbconfig->item('use_sociallogin_naver')) {?>
                            <li class="naver_login">
                                <a href="javascript:;" onClick="social_register('naver');" title="네이버 회원가입">
                                <figure>
                                    <img src="<?php echo base_url('/assets/images/naver.png');?>" alt="naver">
                                    <figcaption class="big_font">
                                        네이버 회원가입
                                    </figcaption>
                                </figure>
                                </a>
                            </li>
                        <?php } ?>

                       <?php if ($this->cbconfig->item('use_sociallogin_facebook')) {?>
                            <li style="background-color:#3c589e;">
                                <a href="javascript:;" onClick="social_register('facebook');" title="페이스북 회원가입">
                                <figure>
                                    <img src="<?php echo base_url('/assets/images/face.png');?>" alt="face">
                                    <figcaption class="big_font">
                                        페이스북 회원가입
                                    </figcaption>
                                </figure>
                                </a>
                            </li>
                        <?php } ?>
 
                        <?php if ($this->cbconfig->item('use_sociallogin_twitter')) {?>
                            <a href="javascript:;" onClick="social_connect_on('twitter');" title="트위터 회원가입"><img src="<?php echo base_url('assets/images/social_twitter.png'); ?>" width="22" height="22" alt="트위터 회원가입" title="트위터 회원가입" /></a>
                        <?php } ?>

                        <?php if ($this->cbconfig->item('use_sociallogin_google')) {?>
                            <a href="javascript:;" onClick="social_connect_on('google');" title="구글 회원가입"><img src="<?php echo base_url('assets/images/social_google.png'); ?>" width="22" height="22" alt="구글 회원가입" title="구글 회원가입" /></a>
                        <?php } ?>
                    </ul>
                    <p class="ssmall_font">회원가입시 본인인증 절차가 진행되어 로그인과 함께<br>이용약관/개인정보 취급방침에 동의한 것으로 간주합니다.</p>
                    <p><a href="<?php echo base_url('/login') ?>" class="pt10 pb10 big_font">로그인 바로가기</a></p>
                    <aside class="event_link_m">
                        <p><a href="<?php echo site_url('/event/event_register') ?>" class="big_font">포인트 적립 이벤트 참여하기</a></p>
                    </aside>
                    <?php echo form_close(); ?>
                </div>            
                
            
                
            <span class="login_back"></span>
       </section>
       <?php } ?>
<div id="btn_mem_selfcert_phone"></div>
<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#flogin').validate({
        rules: {
            mem_userid : { required:true, minlength:3 },
            mem_password : { required:true, minlength:4 }
        }
    });
});
$(document).on('change', "input:checkbox[name='autologin']", function() {
    if (this.checked) {
        $('.autologinalert').show(300);
    } else {
        $('.autologinalert').hide(300);
    }
});



function social_register(social_type) {
    
    $("input[name=socialtype]").val(social_type);
    
    
    $("#btn_mem_selfcert_phone").click();
    return false;
}
//]]>
</script>
