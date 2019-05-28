<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="foot_padding">
        <section class="main_title login" style="background: #fff">
            <h2>닉네임을 입력해 주세요.</h2>
                
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
            <label class="small_font mb10">공백없이 한글, 영문, 숫자만 입력 가능 2글자 이상</label>
            <button type="submit" class="">등 록</button>
            <?php echo form_close(); ?>
        </section>
    </div>



   

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
