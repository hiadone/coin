<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<article class="wrap01">
    <section class="main_title logout">
        <h2>수 정 완 료</h2>
        <div>
            
            <p>
                <?php echo element('result_message', $view); ?>
            </p>
            
            <button onClick="location.href='<?php echo site_url();?>';">홈페이지로이동</button>
        </div>
        
    </section>
</article>

