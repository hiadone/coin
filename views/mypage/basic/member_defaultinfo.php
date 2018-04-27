<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<article class='content04 name_wrap' style="position: relative; margin: 0 auto;height:520px;">
        <section class='nick_name'>
            <img src="<?php echo base_url('/assets/images/login_logo/logo.png')?>">
            <p class="nomal_font02">Bit Issue 에서 사용할 닉네임을 설정해 주세요.</p>
            
            <?php
            echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
            echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info">', '</div>');
            echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info">', '</div>');
            ?>
            <?php
            $attributes = array('class' => 'form-horizontal', 'name' => 'fdefaultinfoform', 'id' => 'fdefaultinfoform');
            echo form_open_multipart(current_url(), $attributes);
            ?>
            <input type="hidden" id="mem_userid" name="mem_userid"  value="<?php echo html_escape($this->member->item('mem_userid')) ?>" />
            
            <label class="big_font">닉 네 임</label>
            <input type="text" id="mem_nickname" name="mem_nickname" value="<?php echo html_escape($this->member->item('mem_nickname'));?>" >
            <label class="name_notice">공백없이 한글, 영문, 숫자만 입력 가능 2글자 이상</label>
            <button type="submit" class="big_font">닉 네 임 등 록</button>
            <?php echo form_close(); ?>
    </section>
</article>



   

<?php
    $this->managelayout->add_js(base_url('assets/js/member_register.js'));
?>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fdefaultinfoform').validate({
        rules: {
            mem_nickname: {required :true, is_nickname_available:true}
        }
    });
});
//]]>
</script>
