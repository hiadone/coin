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
                        <button type="submit" class="btn btn-primary btn-sm">로그인</button>
                        <label for="autologin">
                            <input type="checkbox" name="autologin" id="autologin" value="1" /> 자동로그인
                        </label>
                    </li>
                </ol>
                <div class="alert alert-dismissible alert-info autologinalert" style="display:none;">
                    자동로그인 기능을 사용하시면, 브라우저를 닫더라도 로그인이 계속 유지될 수 있습니다. 자동로그이 기능을 사용할 경우 다음 접속부터는 로그인할 필요가 없습니다. 단, 공공장소에서 이용 시 개인정보가 유출될 수 있으니 꼭 로그아웃을 해주세요.
                </div>
            <?php echo form_close(); 
            */
            ?>
            <?php
            if ($this->cbconfig->item('use_sociallogin')) {
                $this->managelayout->add_js(base_url('assets/js/social_login.js'));
            ?>
            <article class="wrap01">
                <section class="main_title login">
                    <h2>통합 로그인</h2>
                    <div>
                        <h2 class='big_font'>SNS 간편로그인</h2>
                        <p class='small_font'>
                            - 비트이슈에서는 SNS로 로그인하여 <br>
                              간편하게 서비스를 이용하실 수 있습니다.<br><br>
                            - 원하시는 SNS를 선택하시고<br> 로그인 해주세요.<br><br>
                            <strong>
                            로그인과 함께 비트이슈의 이용약관 및<br> 
                            개인정보취급방침에 동의하신 것으로 간주합니다.
                            </strong>
                        </p>
                    </div>
                    <ul>
                        <?php if ($this->cbconfig->item('use_sociallogin_kakao')) {?>
                            <li style="background-color:#fbe300;">
                                <a href="javascript:;" onClick="social_connect_on('kakao');" title="카카오 로그인">
                                <figure>
                                    <img src="<?php echo base_url('/assets/images/kakao.png');?>" alt="kakao">
                                    <figcaption class="big_font" style="color:#3a1e1f">
                                        카카오톡 로그인
                                    </figcaption>
                                </figure>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->cbconfig->item('use_sociallogin_naver')) {?>
                            <li style="background-color:#1ec802;">
                                <a href="javascript:;" onClick="social_connect_on('naver');" title="네이버 로그인">
                                <figure>
                                    <img src="<?php echo base_url('/assets/images/naver.png');?>" alt="naver">
                                    <figcaption class="big_font">
                                        네이버 로그인
                                    </figcaption>
                                </figure>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->cbconfig->item('use_sociallogin_facebook')) {?>
                            <li style="background-color:#3c589e;">
                                <a href="javascript:;" onClick="social_connect_on('facebook');" title="페이스북 로그인">
                                <figure>
                                    <img src="<?php echo base_url('/assets/images/face.png');?>" alt="face">
                                    <figcaption class="big_font">
                                        페이스북 로그인
                                    </figcaption>
                                </figure>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->cbconfig->item('use_sociallogin_twitter')) {?>
                            <a href="javascript:;" onClick="social_connect_on('twitter');" title="트위터 로그인"><img src="<?php echo base_url('assets/images/social_twitter.png'); ?>" width="22" height="22" alt="트위터 로그인" title="트위터 로그인" /></a>
                        <?php } ?>

                        <?php if ($this->cbconfig->item('use_sociallogin_google')) {?>
                            <a href="javascript:;" onClick="social_connect_on('google');" title="구글 로그인"><img src="<?php echo base_url('assets/images/social_google.png'); ?>" width="22" height="22" alt="구글 로그인" title="구글 로그인" /></a>
                        <?php } ?>
                    </ul>
                </section>
            </article>            
                
            <?php } ?>
       

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
//]]>
</script>
