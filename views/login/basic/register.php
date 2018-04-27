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

            if ($this->cbconfig->item('use_selfcert') && ($this->cbconfig->item('use_selfcert_phone') OR $this->cbconfig->item('use_selfcert_ipin'))) {
        $this->managelayout->add_js(base_url('assets/js/member_selfcert.js'));
    }
            ?>
            <input type="hidden" id="elh_mem_id" value="<?php echo element('elh_mem_id',$view); ?>">
            <section class="ham_cont02 ham_login">
                <!-- <h2>SNS 회원가입</h2> -->

                <div class='login_notice'>
                    <figure>
                        <img src="<?php echo base_url('/assets/images/login_logo/logo.png')?>">
                        <h3  style="font-size:20px; color:#403f3f; ">회원가입</h3>
                        <!-- <p>
                            비트이슈에서는 SNS아이디로 로그인하여 간편하게<br>
                            서비스를 이용하실 수 있습니다.                            
                        </p> -->
                    </figure>
                </div>
                <button type="button" onClick="location.href='<?php echo site_url('/event/event_register') ?>';" style="width: 70%; font-family: 'Jeju Gothic', sans-serif; margin-bottom: 10px;">이 벤 트 바 로 가 기</button>
               <strong class='nomal_font02'>
                    추천인 닉네임을 입력하면 가입고객 전원 500P 적립
                </strong>

                 

                <?php
                $attributes = array('class' => 'form-horizontal', 'name' => 'fwrite2', 'id' => 'fwrite2');
                echo form_open('', $attributes);
                ?>
                    <input type="hidden" name="socialtype" id="socialtype" value="">
                    <input type="hidden" name="selfcert_type" id="selfcert_type" value="" />
                <ul >
                    <?php if ($this->cbconfig->item('use_sociallogin_kakao')) {?>
                    <li style="margin-bottom: 10px;">
                        <a href="javascript:;" onClick="social_register('kakao');" title="카카오 로그인">
                        <figure>
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/pc_sns/kakao.png" alt="ham_talk_img">
                            <figcaption class="big_font">회 원 가 입</figcaption>
                        </figure>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if ($this->cbconfig->item('use_sociallogin_naver')) {?>
                    <li style="margin-bottom: 20px;">
                        <a href="javascript:;" onClick="social_register('naver');" title="네이버 로그인" style="color:#fff;">
                        <figure>
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/pc_sns/naver.png" alt="ham_naver_img">
                            <figcaption class="big_font">회 원 가 입</figcaption>
                        </figure>
                        </a>
                    </li>
                    <?php } ?>
                </ul>

                <p class="nomal_font02" style="margin-bottom:30px;">
                   <a href="<?php echo document_url('provision')?>" title="이용약관및개인정보취급방침">회원가입시 본인인증 절차가 진행되며 로그인과 함께 비트이슈의<br> 이용약관 및 개인정보 취급방침에 동의하신 것으로 간주합니다.</a>
                </p>

                <p class="nomal_font02">
                   <a href="<?php echo base_url('/login') ?>">로그인 바로가기</a>
                </p>





                    
<!--                     <p class='small_font'>
                        비트이슈에서는 SNS로 로그인하여<br>
                        간편하게 서비스를 이용하실 수 있습니다.
                    </p>
                    <br><br>

                    <p style="font-weight: bold;"> 회원 가입 시 본인 인증 절차가 진행됩니다.</p>
                    <br><br>
                    
                    <p>
                        원하시는 SNS를 선택해 주세요.<br><br>
                    </p>
                        
                        <strong class="nomal_font02">
                            회원 가입 시 추천인의 닉네임을<br> 
                            입력하면 가입고객 전원 500P 적립
                        </strong>

                    <br><br>

                   
                    
                    <br><br><br>

                     <span><a href="<?php echo document_url('provision')?>" title="이용약관및개인정보취급방침">로그인과 함께 비트이슈의 이용약관 및 개인정보<br> 취급방침에 동의하신 것으로 간주합니다.</a></span> -->
                </div>



                   <!--  <?php if ($this->cbconfig->item('use_sociallogin_facebook')) {?>
                    <li style="background-color:#3c589e;color:#fff;">
                        <a href="javascript:;" onClick="social_register('facebook');" title="페이스북 로그인" style="color:#fff;">
                        <figure>
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/ham_face.png" alt="ham_face_img">
                            <figcaption class="big_font">페 이 스 북 로 그 인</figcaption>
                        </figure>
                        <span>
                            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/ham_arrow.png" alt="ham_arrow_img">
                        </span>
                        </a>
                    </li>
                    <?php } ?> -->
                </ul>
            </section>
            <?php echo form_close(); ?>
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
