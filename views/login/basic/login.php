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
            <input type="hidden" id="elh_mem_id" value="<?php echo element('elh_mem_id',$view); ?>">
            <section class="ham_cont02 ham_login">
                <h2>SNS 로그인</h2>

                <div class='login_notice'>
                    <h3>SNS 로그인</h3>
                    <p class='small_font'>
                        가입하신 SNS를 선택하시고<br>
                        로그인 해주세요.<br>
                    </p>
                </div>
                
                <ul >
                    <?php if ($this->cbconfig->item('use_sociallogin_kakao')) {?>
                    <li style="background-color:#fbe300; color:#3a1e1f">
                        <a href="javascript:;" onClick="social_connect_on('kakao');" title="카카오 로그인">
                        <figure>
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/ham_talk.png" alt="ham_talk_img">
                            <figcaption class="big_font">카 카 오 톡</figcaption>
                        </figure>
                        <span>
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/ham_arrow.png" alt="ham_arrow_img">
                        </span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if ($this->cbconfig->item('use_sociallogin_naver')) {?>
                    <li style="background-color:#1ec802;">
                        <a href="javascript:;" onClick="social_connect_on('naver');" title="네이버 로그인" style="color:#fff;">
                        <figure>
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/ham_naver.png" alt="ham_naver_img">
                            <figcaption class="big_font">네 이 버</figcaption>
                        </figure>
                        <span>
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/ham_arrow.png" alt="ham_arrow_img">
                        </span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if ($this->cbconfig->item('use_sociallogin_facebook')) {?>
                    <li style="background-color:#3c589e;color:#fff;">
                        <a href="javascript:;" onClick="social_connect_on('facebook');" title="페이스북 로그인" style="color:#fff;">
                        <figure>
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/ham_face.png" alt="ham_face_img">
                            <figcaption class="big_font">페 이 스 북</figcaption>
                        </figure>
                        <span>
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/ham_arrow.png" alt="ham_arrow_img">
                        </span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </section>
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
