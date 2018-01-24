<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<article class="wrap01">
        <section class="main_title my_write">
            <h2>내 게 시 물</h2>
            <span>최근 6개월간 작성한 나의 게시물 입니다.</span>

            <!-- 목록영역 -->
                <table class="td">
                    <thead>
                        <tr>
                            <th class="sort-alpha">날 짜 ▼</th>
                            <th class="sort-alpha">제 목</th>
                            <th class="sort-alpha">종 류</th>
                        </tr>
                    </thead>



    
        <tbody>
        <?php
        if (element('list', element('data', $view))) {
            foreach (element('list', element('data', $view)) as $result) {
                
        ?>
            <tr>
                <!-- <td><?php echo element('num', $result); ?></td> -->
                <!-- <td><?php if (element('thumb_url', $result)) { ?><img class="media-object" src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('post_title', $result)); ?>" title="<?php echo html_escape(element('post_title', $result)); ?>" style="width:50px;height:40px;" /><?php } ?></td> -->
                <td><?php echo display_datetime(element('post_datetime', $result), 'full'); ?></td>
                <td><a href="<?php echo element('post_url', $result); ?>" target="new" title="<?php echo html_escape(element('post_title', $result)); ?>"><?php echo html_escape(element('post_title', $result)); ?></a>
    <?php if (element('post_comment_count', $result)) { ?><span class="label label-success"><?php echo element('post_comment_count', $result); ?> comments</span><?php } ?>
    <?php if (element('post_like', $result)) { ?><span class="label label-info">+ <?php echo element('post_like', $result); ?></span><?php } ?>
    <?php if (element('post_dislike', $result)) { ?><span class="label label-danger">- <?php echo element('post_dislike', $result); ?></span><?php } ?>
                </td>
                <td><?php echo element('brd_name', $result) ?></td>
            </tr>
        <?php
            }
        }
        if ( ! element('list', element('data', $view))) {
        ?>
            <tr>
                <td colspan="3" class="nopost">회원님이 작성하신 글이 없습니다</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <nav><?php echo element('paging', $view); ?></nav>
</div>
<!-- ad 영역 -->
<section class="ad">
    <a href="n">
        <?php echo banner("index_banner") ?>
    </a>
</section>
