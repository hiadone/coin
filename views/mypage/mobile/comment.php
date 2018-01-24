<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<article class="wrap01">
        <section class="main_title my_write">
            <h2>내가 작성한 댓글</h2>
            <span>최근 6개월간 작성한 나의 게시물 입니다.</span>

            <!-- 목록영역 -->
                <table class="td">
                    <thead>
                        <tr>
                            <th class="sort-alpha">날 짜 ▼</th>
                            <th class="sort-alpha">내 용</th>
                            <th class="sort-alpha">종 류</th>
                        </tr>
                    </thead>



    
        <tbody>
        <?php
        if (element('list', element('data', $view))) {
            foreach (element('list', element('data', $view)) as $result) {
                
        ?>
            <tr>
                <td><?php echo display_datetime(element('cmt_datetime', $result), 'full'); ?></td>
                <td><a href="<?php echo element('comment_url', $result); ?>" target="new"><?php echo cut_str(html_escape(strip_tags(element('cmt_content', $result))), 200); ?></a>
                    <?php if (element('cmt_like', $result)) { ?><span class="label label-info">+ <?php echo element('cmt_like', $result); ?></span><?php } ?>
                    <?php if (element('cmt_dislike', $result)) { ?><span class="label label-danger">- <?php echo element('cmt_dislike', $result); ?></span><?php } ?>
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


