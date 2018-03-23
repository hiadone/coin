<ol class='atten_list'>
    <?php
    if (element('list', element('data', $view))) {
        foreach (element('list', element('data', $view)) as $key => $result) {
    ?>
    <li>
        <figure>
            <img src="<?php echo element('layout_skin_url', $layout); ?>/images/spoon_<?php echo element('display_level', $result); ?>.png" alt="spoon_img">
            <figcaption>
                <p class='big_font'><?php echo html_escape(element('att_memo', $result)); ?></p>
                <?php if(element('att_ranking', $result) < 4) {?>
                <span><img src='<?php echo element('layout_skin_url', $layout); ?>/images/rank_0<?php echo element('att_ranking', $result); ?>.png' alt='rank_0<?php echo element('att_ranking', $result); ?>_img'></span>
                <?php } ?>
                <ul>
                    <li><?php echo element('display_name', $result); ?></li>
                    <li>|</li>
                    <li><?php echo element('display_datetime', $result); ?></li>
                    <li>|</li>
                    <?php if(element('att_point', $result) > 0) {?>
                    <li>포인트 : <?php echo number_format(element('att_point', $result)); ?></li>
                    <li>|</li>
                    <?php } ?>
                    <li>등 급 : <?php echo element('member_group_name', $result); ?></li>
                </ul>
        </figure>
    </li>
    <?php
        }
    } else {
    ?>
        <li>
            <div class="text-center">출석한 사람이 없습니다</div>
        </li>
    <?php
    }
    ?>
        
    
</ol>
</div>
<div><?php echo element('paging', $view); ?></div>

