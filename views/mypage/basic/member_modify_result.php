<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<article class='content04 name_wrap' style="position: relative; margin: 0 auto;height:520px;">
    <section class='welcome'>
        <img src="<?php echo base_url('/assets/images/login_logo/logo.png')?>">
        <p class="big_font">
            <?php echo element('result_message', $view); ?>
        </p>

        <button class="big_font" onClick="location.href='<?php echo site_url();?>';">
            홈 페 이 지 로 이 동
        </button>
    </section>

</article>

