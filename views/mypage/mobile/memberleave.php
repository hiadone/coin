<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<article class="wrap01">
    <section class="main_title logout">
        <h2>회 원 탈 퇴</h2>
        <div>
            <img src="<?php base_url('/images/bye.png') ?>" alt="bye">
            <h3>회원탈퇴 신청이 완료되었습니다.</h3>
            <p>
                <span class="text-primary"><?php echo html_escape($this->member->item('mem_nickname')); ?></span>님, 그 동안 서비스를 <br>
                이용해 주셔서 감사합니다.<br>
                더욱 유용하고 다양한<br>
                서비스를 위해 노력하겠습니다.
            </p>
            
            <button onclick="location.href='<?php echo site_url('/')?>';">확 인</button>
        </div>
        
    </section>
</article>